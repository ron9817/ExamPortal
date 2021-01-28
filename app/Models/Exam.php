<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $table = 'ExamDetails';

    public function questions(){
        return $this->hasMany("App\Models\Question","exam_id","id");
    }

    public function users(){
        return $this->belongsToMany("App\Models\User","UserExamMapping","exam_id","user_id")->withPivot('marks','started_at','is_submitted','submitted_at','rank');
    }
    
}
