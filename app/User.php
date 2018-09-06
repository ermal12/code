<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','is_active','photo_id','',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function photo (){
        return $this->belongsTo('App\Photo');
    }



    public function posts(){
        return $this->hasMany('App\Post');
    }



  // public function category(){
  //       return $this->hasMany('App\Category');
  //   }





    public function isAdmin(){
        if($this->role->name == "admin"){
            return true;
        }
        return false;
    }


    public function getGravatarAttribute(){

        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "http://www.gravatar.com/avatar/$hash";
    }





}
