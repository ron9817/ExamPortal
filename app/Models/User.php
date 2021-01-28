<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'NAME', 'EMAIL', 'PASSWORD',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'PASSWORD', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $table = 'users';

    protected $primaryKey = 'ID';

    public function selectedOptions(){
        return $this->belongsToMany("App\Models\Option","UserOptionMapping","user_id","optn_id")->withPivot('is_marked_for_review');
    }

    public function exams(){
        return $this->belongsToMany("App\Models\Exam","UserExamMapping","user_id","exam_id")->withPivot('marks','started_at','is_submitted','submitted_at');
    }
    
    public function getAuthPassword(){
    	return $this->PASSWORD;
    }

}

