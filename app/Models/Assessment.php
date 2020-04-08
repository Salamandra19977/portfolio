<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $fillable = [
        'assessment'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function work()
    {
        return $this->belongsTo('App\Models\User');
    }

    public static function add(array $data)
    {
        $assessment = new self();
        $assessment->assessment = $data['assessment'];
        $assessment->work_id = $data['work_id'];
        $assessment->user_id = $data['user_id'];

        $assessment->save();

        return $assessment;
    }
}
