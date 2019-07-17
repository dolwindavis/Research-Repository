<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
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
