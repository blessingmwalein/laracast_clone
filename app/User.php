<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Entities\Learning;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Redis;

class User extends \TCG\Voyager\Models\User
{
    use HasApiTokens, Notifiable, Learning;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'confirm_token_'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

    public function isConfirmed()
    {
        return $this->confirm_token_ == null;
    }

    public function confirm()
    {
        $this->confirm_token_ = null;
        $this->save();
    }

    public function isAdmin()
    {
        return in_array($this->email, config('bahdcast.administrators'));
    }

  
}
