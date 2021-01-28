<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'QuestionDetails';

    public function options(){
        return $this->hasMany("App\Models\Option","qs_id","id");
    }
}
