<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Journal extends Model implements Searchable
{ 


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function upload()
    {
        return $this->hasOne('App\Upload');
    }

    public function getSearchResult(): SearchResult
    {
        $url="Publications";
        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->user,
            $url
         );
    }
}
