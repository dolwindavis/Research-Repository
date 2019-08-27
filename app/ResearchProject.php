<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class ResearchProject extends Model implements Searchable
{
    protected $fillable = ['title','research_category','project_code','department_id','user_role','duration','amount','agency','fac_id','slug','status'];

    public function user()
    {
        return $this->belongsTo('App\User','fac_id');
    }

    public function upload()
    {
        return $this->hasOne('App\Upload','work_id');
    }

    public function getSearchResult(): SearchResult
    {   
        $url="Research Project";
        return new \Spatie\Searchable\SearchResult(
           $this,
           $this->user,
           $url
        );
    }
}
