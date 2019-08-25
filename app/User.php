<?php

namespace App;

use App\Department;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','fac_id','department_id','slug','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function journals()
    {
        return $this->hasMany('App\Journal');
    }

    public function books()
    {
        return $this->hasMany('App\Book');
    }

    public function researchprojects()
    {
        return $this->hasMany('App\ResearchProject','fac_id');
    }

    public function departmentDetails(){

        return $this->belongsTo(Department::class,'department_id');

    }
}
