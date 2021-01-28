<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
class Questions extends Controller
{
    function save(Request $req)
    {
        $question = new Question;
        $question->name = $req->test_title;
        $question->description = $req->test_description;
        $question->start_time = $req->test_start;
        $question->end_time = $req->test_end;
        $question->time_limit = $req->test_duration;
        $question->save();
        print_r($req->input());
    }
}

// Testing File