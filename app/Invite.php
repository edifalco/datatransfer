<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    protected $fillable = [
        'name', 'email', 'provider_id', 'role_id', 'is_active', 'token', 'user_id', 'password'
    ];
    
    public function provider()
    {
        return $this->belongsTo('App\Provider');
    }
    
    public function role()
    {
        return $this->belongsTo('App\Role');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
