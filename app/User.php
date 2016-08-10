<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Eloquent implements AuthenticatableContract, CanResetPasswordContract
{
    use EntrustUserTrait;
    use Authenticatable, CanResetPassword;
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['userId','fName','lName','email','address','phone','registryNo','accountId', 'password','isNetwork','tranToken'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function parents()
    {
        return $this->belongsToMany('App\User', 'userblockmap', 'userId', 'parentId');
    }

    public function isActivator()
    {
    
    }
    
    public static function deactiveBlocks($id, $rankId = null)
    {
        $user = User::findOrFail($id);
        return $user->belongsToMany('App\Block', 'userblockmap', 'userId', 'blockId')
                    ->where('isActive', '=', 'N');
    }

    public static function activeBlocks($id, $rankId = null)
    {
        $user = User::findOrFail($id);
        return $user->belongsToMany('App\Block', 'userblockmap', 'userId', 'blockId')
                        ->where('isActive', '=' , 'Y');
    }

    public function hasRank($rankId)
    {
        $rank = DB::table('userblockmap')
                    ->whereIn('userblockmap.rankId', [1, 2]);
        return count($rank) > 1 ? true : false;
    }

    public function isBoth() {

        $ranks = \DB::table('userblockmap')
                ->where('userblockmap.userId','=', \Auth::user()->id)
                ->groupBy('rankId')
                ->select('userblockmap.rankId')
                ->get();
        return count($ranks) > 1 ? true : false;
    }

    //ALL Manager user count
    static public function managers()
    {
        return static::where('isManager','=','Y')->get();
    }

    //USER TRANSACTIONS
    public function transactions()
    {
        return $this->hasMany('App\Transactions', 'outUserId');
    }

    public function inTransactions()
    {
        return $this->hasMany('App\Transactions', 'inUserId');
    }

    public function getAllByGroupId($groupId)
    {
        return statis::where('');
    }

    static public function userExist($userId)
    {
        return static::where('userId', '=', $userId)->first();
    }
    /*public function transactions($type)
    {
        if($type == "All")
            return $this->hasMany('App\Transactions', 'outUserId')->orWhere('inUserId', '=', $this->id)->orderBy('created_at','DESC');
        
        return $this->hasMany('App\Transactions', 'outUserId')->orWhere('inUserId', '=', $this->id)->orderBy('created_at','DESC');
    }
*/}