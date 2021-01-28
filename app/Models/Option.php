<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $table = 'OptionDetails';

    public $timestamps = false;
    // Reference : https://stackoverflow.com/questions/19937565/disable-laravels-eloquent-timestamps

    public function selectedOptions(){
        return $this->belongsToMany("App\Models\User","UserOptionMapping","optn_id","user_id")->withPivot('is_marked_for_review');
    }
}
