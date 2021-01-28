<?php

namespace App\Http\Controllers\Student\Question;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\ExamPortal\QuestionHelper;

use App\ExamPortal\ExamHelper;

use App\ExamPortal\Transformers\NextQuestionTransformer\ExamTransformer;

use App\ExamPortal\Transformers\NextQuestionTransformer\QuestionTransformer;

use App\ExamPortal\Transformers\NextQuestionTransformer\OptionTransformer;

use App\ExamPortal\Transformers\ScoreTransformer\SelectedOptionTransformer;

use Carbon\Carbon;

use App\Http\Requests\ReviewQuestion;

class QuestionController extends Controller
{

    public function next_qs( 
        $qs_order = null,
        Request $request,
        QuestionHelper $helper,
        ExamHelper $exam_helper,
        ExamTransformer $exam_transformer,
        QuestionTransformer $question_transformer,
        OptionTransformer $option_transformer,
        SelectedOptionTransformer $selected_option_transformer ){
        
        // $cacheControl = $request->header( "cache-control" );
        // if( isset( $cacheControl ) and $cacheControl == "max-age=0" ){
        //     $request->request->add( [ "option" => null, "action" => "reload" ]);
        //     //to do exam id error also
        // }

        // if( $request->action == 'submit' and ! isset( $request->score ) ){

            
        //     return redirect()->action(
        //         [ExamController::class, 'calculateScore']
        //     )->with($request->session()->all());
        // }

        $data = $helper->next_qs( $request, $exam_helper );

        if( $request->action == "time_limit_exceed" and $data[ "redirect"] )
            return redirect('/?active=3')->with('error', 'Time Limit Exceeded');

        if( isset( $data["error"] ) and $data["error"] == 1 ){
            return $data;
        }

        if( isset($data["msg"]) and !( isset($data["error"]) ) ){

            $data[ "exam" ] = $exam_transformer->transform( $data["exam"] );
            $data[ "user_name" ] = $request->user_name;
            $data[ "title" ] = "Submitted";
            $data[ "user_image" ] = 'profile_pic.jpg';
            $request->session()->forget(['exam_id', 'qs_id', 'qs_order']);
            return view( 'Student/Exam/submit' )->with( "data", $data );

        }

        $transformer = [
        	"question" => $question_transformer,
        	"option" => $option_transformer,
        	"selected_option" => $selected_option_transformer
        ];
        
        $data[ "exam" ] = $exam_transformer->transform( $data["exam"], $transformer );
        $data[ "current_question" ] = $question_transformer->transform( $data[ "current_question" ], $transformer );
        $data[ "title" ] = $data["exam"]["name"];
        $data[ "user_name" ] = $request->user_name;
        $data[ "user_image" ] = 'profile_pic.jpg';
        $data[ "qs_order" ] = $data[ "current_question" ][ "qs_order" ];
        
        $request->session()->flash( 'exam_id', $data['exam']['id'] );
        $request->session()->flash( 'qs_order', $data['current_question']['qs_order'] );
        $request->session()->flash( 'qs_id', $data['current_question']['id'] );

        return view( 'Student/Exam/index' )->with( "data", $data );
    }

    public function review( ReviewQuestion $request, QuestionHelper $helper ){
    	$data = $helper->review( $request );
        $request->session()->flash( 'exam_id', $request->exam_id );
        $request->session()->flash( 'qs_order', $request->qs_order );
        $request->session()->flash( 'qs_id', $request->qs_id );
    	return $data;

    }

}