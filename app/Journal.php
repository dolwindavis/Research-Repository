<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function upload()
    {
        return $this->hasOne('App\Upload');
    }
}
