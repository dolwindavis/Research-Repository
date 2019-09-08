<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;


class Book extends Model implements Searchable
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function upload()
    {
        return $this->hasOne('App\Upload');
    }

    public function authorships()
    {
        return $this->belongsTo(Authorship::class,'authorship');
    }

    public function getSearchResult(): SearchResult
    {
        $url="Books";
        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->user,
            $url
         );
    }
}
