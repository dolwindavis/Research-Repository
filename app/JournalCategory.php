<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JournalCategory extends Model
{
    protected $fillable=['name'];

    public function journal()
    {
        return $this->hasMany(Journal::class,'journal_category');
    }
}
