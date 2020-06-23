<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{

    public function hotel()
    {
        $this->belongsTo('App\Hotel');
    }

    public function image()
    {
        $this->hasOne('App\Image');
    }
    public function prices(){

        return $this->hasMany('App\RoomPrice', 'room');

    }



    //
}
