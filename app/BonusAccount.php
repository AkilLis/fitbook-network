<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BonusAccount extends BaseModel
{
    //
    protected $primaryKey = 'id';
	protected $table = 'bonusaccount';

	static public function endAmountsByAll()
	{
		return DB::table('bonusaccount')
					->join('useraccountmap', function($join)
              		{
		                $join->on('useraccountmap.accountId', '=', 'bonusaccount.id')
		                ->where('useraccountmap.type', '=', 2);
		            })
		            ->join('users', 'users.id','=','useraccountmap.userId')
		            ->where('users.userId', '<>', 'Ceo')
		            ->whereRaw('users.userId NOT LIKE "flexgym%"')
		            ->select(DB::raw('round(SUM(endAmount), 0) totalAmt'))
		            ->get();
	}
}
