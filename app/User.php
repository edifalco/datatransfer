<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'is_active', 'photo_id', 'provider_id', 'password_changed_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    protected $dates = [
        'password_changed_at'
    ];
    
    public function role()
    {
        return $this->belongsTo('App\Role');
    }
    
    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }
    
    public function provider()
    {
        return $this->belongsTo('App\Provider');
    }
    
    public function isAdmin()
    {
        if($this->role->name == 'Admin' && $this->is_active == 1) {
            return true;
        }
        return false;
    }
    
    public function getGravatarAttribute(){
        $hash = md5(strtolower(trim($this->attributes['email']))) . "?d=mm";
        return "http://www.gravatar.com/avatar/$hash";
    }
}