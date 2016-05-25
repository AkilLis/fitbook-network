<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends BaseModel
{
    //
    protected $primaryKey = 'id';
	protected $table = 'transactions';

	protected $fillable = array('inUserId', 'outUserId', 'invType', 'invDate', 'invDescription', 'inAccountId', 'outAccountId', 'inAmt', 'outAmt', 'endAmt');

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
