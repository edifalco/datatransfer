<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    protected $fillable = ['organisation', 'country', 'website', 'lead_person', 'is_active', 'order', 'logo', 'pdf', 'image'];
    
    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }
}
