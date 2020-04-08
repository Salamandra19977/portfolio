<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public static function add(array $data)
    {
        $image = new self();
        $image->name = $data['name'];
        $image->size = $data['size'];
        $image->extension = $data['extension'];
        $image->patch = $data['patch'];
        $image->work_id = $data['work_id'];

        $image->save();

        return $image;
    }

    public function work(){

        return $this->belongsTo('App\Models\Work');
    }

}

