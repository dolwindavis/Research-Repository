<?php

namespace App;

use App\ResearchAgency;
use Illuminate\Database\Eloquent\Model;

class ResearchCategory extends Model
{
    protected $fillable = ['name']; 

    public function agency()
    {
       return $this->hasOne(ResearchAgency::class,'category_id');
    }

    public function research()
    {
       return $this->hasOne(ResearchAgency::class,'research_category');
    }
}
