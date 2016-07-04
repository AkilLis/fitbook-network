<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends BaseModel
{
    //
    protected $primaryKey = 'id';
	protected $table = 'transactions';

	protected $fillable = array('inUserId', 'outUserId', 'invType', 'invDate', 'invDescription', 'inAccountId', 'outAccountId', 'inAmt', 'outAmt', 'endAmt');

	public function outUser()
	{
		return $this->belongsTo('App\User', 'outUserId');
	}

	public function inUser()
	{
		return $this->belongsTo('App\User', 'inUserId');
	}

	
	/*
	-Salary
	-Bonus
	-Upper
	-Captain
	-Transfer
	-CashLoad
	-Usage
	*/
}
