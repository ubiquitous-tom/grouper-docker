<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }
}
