<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'details',
        'status',
        'profile_image',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    
    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }


//return $this->role->permissions()->where( 'slug', $permission)->first() ? true : false;



//    public function hasPermission($permission):bool{
//        foreach ($this->roles as $key => $role){
//            return $role->permissions()->where( 'slug', $permission)->first() ? true : false;
//        }
//    }

    public function hasRolePermisssion($role){
        // return $this->role()->where('slug', $role)->first() ? true : false ;
        return $this->roles()->where('slug', $role)->first() ? true : false ;
    }

}
