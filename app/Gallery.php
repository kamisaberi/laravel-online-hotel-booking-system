<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    //


    public function images()
    {
        return $this->belongsToMany('App\Image', 'gallery_image', 'gallery', 'image');
//        return $this->belongsToMany('App\Image');
    }

}
