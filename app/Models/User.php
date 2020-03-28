<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    public  function works()
    {
        return $this->hasMany('App\Models\Work');
    }
}
