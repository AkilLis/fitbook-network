<?php

namespace App\Http\Controllers;

use App\AwardAccount;
use App\BonusAccount;
use App\Http\Requests;
use App\Transactions;
use App\User;
use DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Mail;
use Response;
use Session;
use View;

class CeoController extends Controller
{
    const PROFIT_TYPE = 'Cash';   

	public function create(Request $request)
	{
		
	}

    private function usersGroupByGroup()
    {
        $group = DB::table('block')
            ->join('userblockmap','block.id','=','userblockmap.blockId')
            ->join('users','userblockmap.userId','=', 'users.id')
            ->whereRaw('users.userId NOT LIKE "flexgym%"')
            ->where('block.isActive','=', 'Y')
            ->select(DB::raw('block.groupId, COUNT(1) count'))
            ->groupBy('block.groupId')
            ->get();

        if(count($group) == 1)
            array_push($group, array('groupId' => '2', 'count' => 0));         

        if(count($group) == 2)
            array_push($group, array('groupId' => '3', 'count' => 0));         

        $managers = array('groupId' => '4', 'count' => count(User::managers()));

        array_push($group, $managers);
        return $group;
    }


    private function userRegistrationByYear()
    {
        return DB::table('users')
            ->select(DB::raw('YEAR(created_at) year, COUNT(1) total'))    
            ->where('isNetwork','=','Y')
            ->where('userId', '<>', 'Ceo')
            ->whereRaw('userId NOT LIKE "flexgym%"')
            ->groupBy('year')
            ->get();
    }

    private function userRegistrationByMonth()
    {
        return DB::table('users')
            ->select(DB::raw('YEAR(created_at) year, MONTH(created_at) month, COUNT(1) total'))    
            ->where('isNetwork','=','Y')
            ->where('userId', '<>', 'Ceo')
            ->whereRaw('userId NOT LIKE "flexgym%"')
            ->whereRaw('YEAR(created_at) = '.date('Y'))
            ->groupBy('year','month')
            ->get();
    }

    private function userRegistrationByDay()
    {
       $users = DB::table('users')
            ->select(DB::raw('DAY(created_at) day, COUNT(1) total')) 
            /*->select(DB::raw('MONTH(created_at) month, DAY(created_at) day, COUNT(1) total'))    */
            ->where('isNetwork','=','Y')
            ->where('userId', '<>', 'Ceo')
            ->whereRaw('userId NOT LIKE "flexgym%"')
            ->whereRaw('YEAR(created_at) = '.intval(date('Y')))
            ->whereRaw('MONTH(created_at) = '.intval(date('m')))
            ->groupBy(DB::raw('DAY(created_at)'))
            ->get();

        /*$users = array_filter($users, function($cur){
            return $cur->month == intval(date('m'));
        });*/

        return $users;
    }

    public function userRegistrationDetail(Request $request)
    {
        $type = $request->type;
        $value = $request->value;

        /*return Response::json([
                'type' => $type,
                'value' => $value,
        ]);*/

        $query = DB::table('users')
            ->select('fName','created_at')
            ->where('isNetwork','=','Y')
            ->where('userId', '<>', 'Ceo')
            ->whereRaw('userId NOT LIKE "flexgym%"')
            ->whereRaw('YEAR(created_at) = ?', [$type == "Year" ? intval($request->value) : intval(date('Y'))]);
            /*->whereRaw('YEAR(created_at) = 2016');*/
            
        if($type != "Year")
            $query->whereRaw('MONTH(created_at) = ?', [$type == "Month" ? intval($request->value) : intval(date('m'))]);

        if($type == "Day")
            $query->whereRaw('DAY(created_at) = ?', [intval($request->value)]);

        $query->orderBy('created_at','DESC');
        /*dd($query);*/
        return $query->get();
    }

    public function userRegistration(Request $request)
    {
        if($request->dateType == 'Year') $userRegistration = self::userRegistrationByYear();
        if($request->dateType == 'Month') $userRegistration = self::userRegistrationByMonth();
        if($request->dateType == 'Day') $userRegistration = self::userRegistrationByDay();

        return Response::json([
                'users_list' => $userRegistration,
        ]);
    }

    private function getProfitByFilter($filter)
    {
        $query = DB::table('transactions')
                    ->where('invType', '=', 'Cash');

        switch ($filter) {
            case 'Year':
                $query->select(DB::raw('YEAR(created_at) year, round(SUM(outAmt), 0) totalAmt'))
                      ->groupBy('year');
                break;
            case 'Month':
                $query->select(DB::raw('MONTH(created_at) month, round(SUM(outAmt), 0) totalAmt'))
                      ->whereRaw('YEAR(created_at) = ?', [intval(date('Y'))])
                      ->groupBy('month');
                break;  
            case 'Day':
                $query->select(DB::raw('DAY(created_at) day, round(SUM(outAmt), 0) totalAmt'))
                      ->whereRaw('YEAR(created_at) = ? AND MONTH(created_at)', [intval(date('Y')), intval(date('m'))])
                      ->groupBy('day');
                break;
            default:
                break;
        }

        return $query->get();
    }

    private function getEndSalaryByFilter($filter)
    {
        $query = DB::table('transactions')
                    ->where('invType', '=', 'Bonus')
                    ->where('inUserId', '=', 0);

        switch ($filter) {
            case 'Year':
                $query->select(DB::raw('YEAR(created_at) year, round(SUM(inAmt), 0) totalAmt'))
                      ->groupBy('year');
                break;
            case 'Month':
                $query->select(DB::raw('MONTH(created_at) month, round(SUM(inAmt), 0) totalAmt'))
                      ->whereRaw('YEAR(created_at) = ?', [intval(date('Y'))])
                      ->groupBy('month');
                break;  
            case 'Day':
                $query->select(DB::raw('DAY(created_at) day, round(SUM(inAmt), 0) totalAmt'))
                      ->whereRaw('YEAR(created_at) = ? AND MONTH(created_at)', [intval(date('Y')), intval(date('m'))])
                      ->groupBy('day');
                break;
            default:
                break;
        }

        return $query->get();
    }

    private function getGivenSalaryByFilter($filter)
    {
        $userActivitySalary = DB::table('transactions')
            ->where('invDescription', '=', 'Хэрэглэгч идэвхжүүлэх')
            ->where('invType','<>', 'Cash');

        $userSalary = DB::table('transactions')
            ->where('invDescription','=','Flexgym-Цалин')
            ->where('outAmt', '<>', '0');

        switch ($filter) {
            case 'Year':
                $userActivitySalary->select(DB::raw('YEAR(created_at) year, round(SUM(outAmt), 0) totalAmt'))
                      ->groupBy('year');

                $userSalary->select(DB::raw('YEAR(created_at) year, round(SUM(outAmt), 0) totalAmt'))
                      ->groupBy('year');

                break;
            case 'Month':
                $userActivitySalary->select(DB::raw('MONTH(created_at) month, round(SUM(outAmt), 0) totalAmt'))
                      ->whereRaw('YEAR(created_at) = ?', [intval(date('Y'))])
                      ->groupBy('month');

                $userSalary->select(DB::raw('MONTH(created_at) month, round(SUM(outAmt), 0) totalAmt'))
                      ->whereRaw('YEAR(created_at) = ?', [intval(date('Y'))])
                      ->groupBy('month');
                break;  
            case 'Day':
                $userActivitySalary->select(DB::raw('DAY(created_at) day, round(SUM(outAmt), 0) totalAmt'))
                      ->whereRaw('YEAR(created_at) = ? AND MONTH(created_at)', [intval(date('Y')), intval(date('m'))])
                      ->groupBy('day');

                $userSalary->select(DB::raw('DAY(created_at) day, round(SUM(outAmt), 0) totalAmt'))
                      ->whereRaw('YEAR(created_at) = ? AND MONTH(created_at)', [intval(date('Y')), intval(date('m'))])
                      ->groupBy('day');
                break;
            default:
                break;
        }
        
        return Response::json([
            'activity' => $userActivitySalary->get(),
            'salary' => $userSalary->get(),
        ]);        
    }

    private function getProfitByAll()
    {
        $profit = DB::table('transactions')
                ->select(DB::raw('round(SUM(outAmt), 0) totalAmt'))    
                ->where('invType', '=', 'Cash')
                ->get();
        return $profit ? $profit[0]->totalAmt : 0;
    }

    private function getEndSalaryByAll()
    {
        return BonusAccount::endAmountsByAll()[0]->totalAmt + AwardAccount::endAmountsByAll()[0]->totalAmt;
    }

    private function getSalaryByAll()
    {
        //money used by user activity
        $userActivitySalary = DB::table('transactions')
            ->select(DB::raw('YEAR(invDate) year, MONTH(invDate) month, round(SUM(outAmt), 0) totalAmt'))    
            ->where('invDescription', '=', 'Хэрэглэгч идэвхжүүлэх')
            ->where('invType','<>', 'Cash')
            /*->groupBy('year')
            ->groupBy('month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')*/
            ->get();
        //money used by as a salary
        $userSalary = DB::table('transactions')
            ->select(DB::raw('YEAR(invDate) year, MONTH(invDate) month, round(SUM(outAmt), 0) totalAmt'))    
            ->where('invDescription','=','Flexgym-Цалин')
            ->where('outAmt', '<>', '0')
           /* ->groupBy('year')
            ->groupBy('month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')*/
            ->get();

        /*return Response::json([
                                'resultCode' => 3,
                                'totalAmt' => 3000,
                              ]); */
        //return $userActivitySalary ? $userActivitySalary : array(2016, 8, 0);
        //dd($userActivitySalary);
        return ($userSalary ? $userSalary[0]->totalAmt : 0) + ($userActivitySalary ? $userActivitySalary[0]->totalAmt : 0);
        /*return $userSalary;*/
    }

    public function profit(Request $request)
    {
        return Response::json([
                'profit' => self::getProfitByAll(),
                'salary' => self::getSalaryByAll(),
                'endSalary' => self::getEndSalaryByAll(),
        ]);
    }

    public function profitDetailed(Request $request)
    {
        $resp = self::getGivenSalaryByFilter($request->profitType);
        return Response::json([
                'profit' => self::getProfitByFilter($request->profitType),
                'activity' => $resp->getData()->activity,
                'salary' => $resp->getData()->salary,
                'endSalary' => self::getEndSalaryByFilter($request->profitType)
        ]);
    }

    public function userGroupAll()
    {
        return Response::json(['users_group' => self::usersGroupByGroup(),]);
    }

    public function userGroup($groupId)
    {
        //Manager
        if(self::isManager($groupId))
        {
            return User::managers();
        }

        return self::GetAllUserByGroupId($groupId);
    }

    private function GetAllUserByGroupId($groupId)
    {
        return DB::table('block')
            ->join('userblockmap','block.id','=','userblockmap.blockId')
            ->join('users','userblockmap.userId','=', 'users.id')
            ->whereRaw('users.userId NOT LIKE "flexgym%"')
            ->where('block.isActive','=', 'Y')
            ->where('block.groupId','=', $groupId)
            ->select('users.userId','users.fName', 'block.userCount')
            ->orderBy('block.userCount', 'DESC')
            ->get();
    }

    private function isManager($groupId)
    {
        return $groupId == 4 ? true : false;
    }

    public function activity()
    {
        return Transactions::activityInfo();
    }

    public function salary()
    {
        return Transactions::salaryInfo();
    }

    public function removeZeroEndAmount($var)
    {
        return true;
        return $var->endAmount != 0;
    }

    public function endSalary()
    {
        $endSalary = DB::table('useraccountmap')
                    ->leftJoin('bonusaccount', function($join)
                    {
                        $join->on('useraccountmap.accountId', '=', 'bonusaccount.id')
                        ->where('useraccountmap.type', '=', 2);
                    })
                    ->leftJoin('awardaccount', function($join)
                    {
                        $join->on('useraccountmap.accountId', '=', 'awardaccount.id')
                        ->where('useraccountmap.type', '=', 1);
                    })
                    ->join('users', 'users.id','=','useraccountmap.userId')
                    ->where('users.userId', '<>', 'Ceo')
                    ->whereRaw('users.userId NOT LIKE "flexgym%"')
                    ->groupBy('users.id')
                    ->select(DB::raw('users.fName, round(SUM(bonusaccount.endAmount) + SUM(awardaccount.endAmount),0) total'))    
                    ->get();

        $endSalary = array_filter($endSalary, function($cur){
            return $cur->total != 0;
        });

        usort($endSalary ,function($a, $b){
            return $a->total < $b->total;
        });

        return $endSalary;
    }

    
}
