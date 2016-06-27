<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Block extends BaseModel
{
    //
    protected $primaryKey = 'id';
	protected $table = 'block';

	public function members()
	{
		return $this->belongsToMany('App\User', 'userblockmap', 'blockId', 'userId')->withPivot('fCount', 'mCount', 'created_at','viewOrder');
	}
}
