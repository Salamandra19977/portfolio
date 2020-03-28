<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    public function views()
    {
        return $this->hasMany('App\Models\View');
    }

    public function assessments()
    {
        return $this->hasMany('App\Models\Assessment');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function statuse()
    {
        return $this->belongsTo('App\Models\Status');
    }

    public function images()
    {
        return $this->hasMany('App\Models\Image');
    }
}
