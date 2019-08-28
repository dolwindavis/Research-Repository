<?php

namespace App;

use App\ResearchProject;
use App\ResearchCategory;
use Illuminate\Database\Eloquent\Model;

class ResearchAgency extends Model
{

    protected $fillable =['name','category_id'];

    public function category()
    {
       return $this->belongsTo(ResearchCategory::class,'category_id');
    }

    public function research()
    {
        return $this->hasMany(ResearchProject::class,'agency');
    }

}
