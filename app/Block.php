<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Block extends BaseModel
{
    //
    protected $primaryKey = 'id';
	protected $table = 'block';
	public $members;

	public function members_test()
	{
		return $this->belongsToMany('App\User', 'userblockmap', 'blockId', 'userId')->withPivot('fCount', 'created_at','viewOrder');
	}

	public function setMembers()
	{
		$this->members = \DB::table('users')->join('userblockmap', 'userblockmap.userId','=','users.id')
			 ->where('userblockmap.blockId','=', $this->pivot->blockId)
			 ->select('users.id', 'users.userId', 'users.fName', 'users.lName', 'userblockmap.fCount', 'userblockmap.created_at', 'userblockmap.viewOrder')
			 ->get();
	}
}
