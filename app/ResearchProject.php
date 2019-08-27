<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResearchProject extends Model
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
}
