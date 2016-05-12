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
        
/*    public function isBeginner() {
        \Log::info('Maps = ', $this->blockMaps()[0]);
        foreach ($this->blockMaps() as $block) {
                if ($block->rankId == 1) {

                    return true;
                }
        }
    }

    public function isAdvanced() {
        foreach ($this->blockMaps() as $block) {
                if ($block->rankId == 2) {
                    return true;
                }
        }
    }

    */
}