<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JournalType extends Model
{
    protected $fillable= ['name'];

    public function journal()
    {
        return $this->hasMany(Journal::class,'category');
    }
}
