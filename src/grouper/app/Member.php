<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    public function getFullNameAttribute()
    {
        return preg_replace('/\s+/', ' ',$this->first_name.' '.$this->middle_name.' '.$this->last_name);
    }

    public function getStatus()
    {
        return ($this->status) ? 'Active' : 'Inactive';
    }
}
