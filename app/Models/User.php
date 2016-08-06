<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class User extends Eloquent implements \Illuminate\Contracts\Auth\Authenticatable,
                                       \Illuminate\Contracts\Auth\CanResetPassword
{
    use Authenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'login', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getEmailForPasswordReset()
    {
        return $this->email;
    }    

    public function posts() {
        return $this->hasMany(Post::class);
    }    
}
