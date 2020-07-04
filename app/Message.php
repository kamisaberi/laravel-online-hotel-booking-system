<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    public function sender()
    {
        if ($this->reply_to == 0)
            return $this->hasOne('App\Customer', 'sender');
        else
            return $this->hasOne('App\User', 'sender');
    }
    //
}
