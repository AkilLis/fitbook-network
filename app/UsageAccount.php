<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UsageAccount extends BaseModel
{
    //
    protected $primaryKey = 'id';
	protected $table = 'usageaccount';

	static public function checkEndAmt($userId)
	{
		return DB::table('usageaccount')
			->join('useraccountmap', function($join) {
	                $join->on('useraccountmap.accountId', '=', 'usageaccount.id')
	                ->where('useraccountmap.type', '=', 5);
	        })->where('useraccountmap.userId', '=', $userId)->first();
	}
}

