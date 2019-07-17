<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    public function journal()
    {
        return $this->belongsTo('App\journal','work_id');
    }
}
