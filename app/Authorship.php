<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Authorship extends Model
{
    protected $fillable = ['name'];


    public function journal()
    {
        return $this->hasMany(Journal::class,'authourship');
    }

    public function book()
    {
        return $this->hasMany(Book::class,'authourship');
    }

}
