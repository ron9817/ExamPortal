<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\ExamPortal\Admin\QuestionHelper;
use App\Models\Question;

class QuestionController extends Controller
{

    public function getQuestionsofTestById($id)
    {
        // dd($id);
		$id = Question::find($id);
        return view('admin.test.test_display_layout', ['id' => $id]);
    }

    // function save_question(Request $request) // To save data into database
    // {
    //     $request->validate([
    //         "question_title"=>"required",
    //         "question_description"=>"required",
    //         // 'test_start' => 'required|date|after:today',
    //         // 'test_end' => 'required|date|after:test_start',
    //         // Reference : https://laravel.com/docs/8.x/validation#rule-after
    //     ]);
    //     $question = new Question;
    //     $test_id = $request->test_id;
    //     $question->name = $request->question_title;
    //     $question->description = $request->question_description;
    //     $question->type = $request->question_type;
    //     $question->save();
    //     // $question->start_time = $req->test_start;
    //     // $question->end_time = $req->test_end;
    //     // $question->time_limit = $req->test_duration;
    //     // print_r($request->input());

    //     // Saving data into examquestionmapping table
    //     $arr = Question::latest('created_at')->first();
    //     $question_id = $arr['id'];
    //     $arr->questions()->attach([$test_id]);

    //     // return $this->save_exam_que_mapping($test_id); // testing
    //     // return redirect('admin/tests');
    //     return redirect()->back()->with('message', 'Question Added Successfully!'); // Working
    //     // Reference : https://www.codegrepper.com/code-examples/php/success+message+in+laravel
    // }

    function save_exam_que_mapping($test_id)
    {
        $arr = Question::latest('created_at')->first();
        // return $arr['id']; // New Question Id
        // return $test_id; // Test Id

    }

    public function get( QuestionHelper $helper )
    {
        $questions = $helper->get();
        return view('Admin.question')->with( "questions", $questions );
    }

    public function getById( $id, QuestionHelper $helper )
    {
        $question = $helper->getById( $id );
        return $question;
    }

    public function add( Request $request , QuestionHelper $helper )
    {
        $helper->add( $request );
        return redirect()->route('admin.question');

    }

    public function delete( $id, QuestionHelper $helper )
    {
        $helper->delete( $id );
        return redirect()->route('admin.question');        

    }

    public function update( $id, Request $request , QuestionHelper $helper )
    {
        $helper->update( $id, $request );
        return redirect()->route('admin.question');

    }
}