<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResearchActivity extends Model
{
    protected $fillable=['name' ,'activity_category','activity_type','date' ,'host'];
}
