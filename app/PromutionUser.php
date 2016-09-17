<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PromutionUser extends Model
{
    //
    protected $table = 'promution_user';
    protected $fillable = ['fName','lName','registryNo', 'childCount'];

    public function child()
    {
        return $this->hasMany('App\PromutionUser', 'parent_id');
    }

    public function childs()
    {
    	return DB::table('promution_user')->where('parent_id', '=', $this->id);
    }

    public function childsGet()
    {
        return DB::table('promution_user')->where('parent_id', '=', $this->id)->get();
    }

    static public function decrease($id)
    {
        $user = static::find($id);

        if($user) {
            $user->childCount = $user->childCount - 1;
            $user->save();
        }
    }

    public function withChilds()
    {

    }

    static public function byRegNo($regNo)
    {
    	return static::where('registryNo', '=', $regNo)->first();
    }
}
