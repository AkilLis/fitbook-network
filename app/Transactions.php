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

	static public function salaryInfo()
	{
		$salaries = static::where('invDescription','=','Flexgym-Цалин')
			  ->where('outAmt', '<>', '0')
			  ->orderBy('invDate','DESC')
			  ->paginate(20);

		foreach ($salaries as $salary) {
        	$salary->inUser;
        	$salary->outUser;
        	$salary->outAmt = number_format($salary->outAmt, 2);
        }

        return $salaries;
	}

	static public function activityInfo()
	{
		$activitys = static::where('invDescription', '=', 'Хэрэглэгч идэвхжүүлэх')
            ->orderBy('invDate','DESC')
            ->paginate(20);

        foreach ($activitys as $activity) {
        	$activity->inUser;
        	$activity->outUser;
        	$activity->outAmt = number_format($activity->outAmt, 2);
        }

        return $activitys;
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
