<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{

    public function rooms()
    {
        $this->hasMany('App\Room');
    }

    //
}
