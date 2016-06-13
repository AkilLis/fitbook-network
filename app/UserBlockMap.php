<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBlockMap extends Model
{
    //
    protected $primaryKey = 'id';
	protected $table = 'userblockmap';

	protected $fillable = ['userId','parentId','fCount','mCount','sortedOrder','blockId','rankId'];
}

