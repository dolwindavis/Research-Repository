<?php

namespace App;

use App\JournalType;
use App\JournalCategory;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;

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

    public function journalcategory()
    {
        return $this->belongsTo(JournalCategory::class,'journal_category');
    }

    public function journaltype()
    {
        return $this->belongsTo(JournalType::class,'category');
    }

    public function authorships()
    {
        return $this->belongsTo(Authorship::class,'authorship');
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
