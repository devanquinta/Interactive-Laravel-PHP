<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }
    public function isAdmin()
    {
        return $this->role->role == 'ROLE_ROOT';
    }
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    public function login()
    {
        $user = Auth::id();
        return $user;

    }
    // public function roles() {
    //         return $this->belongsToMany(Role::class, 'role');
    //     }
    // }

}
