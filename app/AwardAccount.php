<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AwardAccount extends BaseModel
{
    //
    protected $primaryKey = 'id';
	protected $table = 'awardaccount';

	static public function endAmountsByAll()
	{
		return DB::table('awardaccount')
					->join('useraccountmap', function($join)
              		{
		                $join->on('useraccountmap.accountId', '=', 'awardaccount.id')
		                ->where('useraccountmap.type', '=', 1);
		            })
		            ->join('users', 'users.id','=','useraccountmap.userId')
		            ->where('users.userId', '<>', 'Ceo')
		            ->whereRaw('users.userId NOT LIKE "flexgym%"')
		            ->select(DB::raw('round(SUM(endAmount), 0) totalAmt'))
		            ->get();
	}
}
