<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{

    protected $fillable = [
        'name', 'description','user_id','status_id'
    ];

    public function views()
    {
        return $this->hasMany('App\Models\View');
    }

    public function assessments()
    {
        return $this->hasMany('App\Models\Assessment');
    }

    public function statuse()
    {
        return $this->belongsTo('App\Models\Status');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment')->whereNull('parent_id');
    }

    public function images()
    {
        return $this->hasMany('App\Models\Image');
    }

}
