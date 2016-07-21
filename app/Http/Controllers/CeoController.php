<?php

namespace App\Http\Controllers;

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

        $managers = array('groupId' => '4', 'count' => User::managers());

        array_push($group, $managers);
        return $group;
    }

    private function userRegistration()
    {
        return DB::table('users')
            ->select(DB::raw('YEAR(updated_at) year, MONTH(updated_at) month, COUNT(1) total'))    
            ->where('isNetwork','=','Y')
            ->where('userId', '<>', 'Ceo')
            ->whereRaw('userId NOT LIKE "flexgym%"')
            ->groupBy('year')
            ->get();

        /*select YEAR(updated_at), MONTH(updated_at), count(1) from users
        where isNetwork = 'Y' AND userId NOT LIKE 'flexgym%' AND userId <> 'Ceo'
        AND YEAR(updated_at) = 2016
        group by YEAR(updated_at);*/
    }

    private function getProfitByAll()
    {
        $profit = DB::table('transactions')
                ->select(DB::raw('YEAR(invDate) year, MONTH(invDate) month, round(SUM(outAmt), 0) totalAmt'))    
                ->where('invType', '=', 'Cash')
                /*->groupBy('year')
                ->groupBy('month')
                ->orderBy('year', 'desc')
                ->orderBy('month', 'desc')*/
                ->get();
        return $profit ? $profit[0]->totalAmt : 0;
    }

    private function getSalaryByAll()
    {
        //money used by user activity
        $userActivitySalary = DB::table('transactions')
            ->select(DB::raw('YEAR(invDate) year, MONTH(invDate) month, round(SUM(outAmt), 0) totalAmt'))    
            ->where('inUserId', '=', 0)
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
        ]);
    }

    public function user()
    {
        return Response::json([
                'users_list' => self::userRegistration(),
                'users_group' => self::usersGroupByGroup(),
        ]);
    }

    public function activity()
    {
        return Transactions::activityInfo();
    }

    public function salary()
    {
        return Transactions::salaryInfo();
    }
}
