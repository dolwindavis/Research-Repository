<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResearchRole extends Model
{
    protected $fillable = ['name'];
    public function agency()
    {
       return $this->hasOne(ResearchAgency::class,'user_role');
    }
}
