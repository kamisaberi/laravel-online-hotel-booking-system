<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{

    public function hotel()
    {
        return $this->belongsTo('App\Hotel');
    }

    public function image()
    {
        return $this->belongsTo('App\Image','image');

//        $this->hasOne('App\Image', 'id' , 'image' );
    }

    public function prices()
    {
        return $this->hasMany('App\RoomPrice', 'room');
    }


    //
}
