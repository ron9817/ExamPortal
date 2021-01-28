<?php

namespace App\Http\Controllers\Student\Exam;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\ExamPortal\ExamHelper;

use App\ExamPortal\QuestionHelper;

use App\ExamPortal\UserHelper;

use App\ExamPortal\Transformers\ScoreTransformer\ExamTransformer;

use App\ExamPortal\Transformers\ScoreTransformer\QuestionTransformer;

use App\ExamPortal\Transformers\NextQuestionTransformer\OptionTransformer;

use App\ExamPortal\Transformers\ScoreTransformer\SelectedOptionTransformer;

use App\ExamPortal\Transformers\NextQuestionTransformer\ExamTransformer as _ExamTransformer;

use App\ExamPortal\Transformers\DashboardTransformer\ExamTransformer as _DExamTransformer;

use Carbon\Carbon;

use App\Http\Requests\RegisterExam;

use App\Models\Exam;
use App\Models\User;

use App\Mail\RegisterMail;
use App\Mail\ScoreMail;

class ExamController extends Controller
{

    // public function mail_test( RegisterExam $request, ExamHelper $helper, _DExamTransformer $transformer ){
        public function mail_test(RegisterExam $request, ExamHelper $helper, UserHelper $user_helper, _DExamTransformer $examTransformer){


        $user_id = 3;
        $exam_id = 20;
        $exam = $helper->register_user_for_exam( $user_id, $exam_id );
        $exam = $examTransformer->transform( $exam );
        $data[ "exam" ] = $exam;
        $data[ "user_name" ] = "ABC";
        $email = $user_helper->getEmail( $user_id );
        Mail::to( $email )->send( new RegisterMail( $data ) );
        return new RegisterMail( $data );



        // dd(1);
        
        // $user_id = $request->user_id;
        // $user_id = 3;
        // $exam_id = $request->exam_id;
        // $exam = $helper->register_user_for_exam( $user_id, $exam_id );
        // $exam = $transformer->transform( $exam );
        // // dd( $exam );
        // $exam["score"]=10;
        // $exam["total"]=20;
        // $exam["rank"]=20;
        // $data = [
        //     "exam" => $exam,
        //     "user_name" => $request->user_name
        // ];
        // Mail::to('ronkaranirocks@gmail.com')->send( new RegisterMail( $data ) );
        // return new RegisterMail( $data );
        // return view( 'Mail/Score/index' )->with( 'data', $data );

        // -------------mail ends-------------------

        // $exam = $helper->get($request->exam_id);
        // $exam = $transformer->transform( $exam );
        // $exam["score"]=10;
        // $exam["total"]=20;
        // $exam["rank"]=20;

        // $data[ "exam" ] = $exam;
        // $data[ "user_name" ] = $request->user_name;

        // $email = 'ronkaranirocks@gmail.com';
        // Mail::to( $email )->send( new ScoreMail( $data ) );

        $exam_ids = Exam::where( "end_time", '<=', Carbon::now() )
                    ->where( [ 'is_active' => 1 ] )
                    ->select( 'id' )
                    ->get()
                    ->pluck( 'id' )
                    ->all();

        $exams_to_update = $helper->getExamsFullDetails( $exam_ids );

        $exam_transformer = new ExamTransformer;
        $question_transformer = new QuestionTransformer;
        $option_transformer = new OptionTransformer;
        $selected_option_transformer = new SelectedOptionTransformer;

        $transformer = [
            "exam"=>$exam_transformer,
            "question"=>$question_transformer,
            "option"=>$option_transformer,
            "selected_option"=>$selected_option_transformer,
        ];

        $exams_to_update->each( function( $_exam, $key ){

            $exam->users->each( function( $user, $ukey )use($_exam){

                $exam = $helper->getFullExamDetails( $user->id, $_exam->id );

                $exam = $transformer['exam']->transform( $exam, $transformer );

                $data = [];
                $exam[ "rank" ] = $ukey+1;
                $data[ "exam" ] = $exam;
                $data[ "user_name" ] = $request->user_name;
                $this->sendScoreEmail( $user->EMAIL, $data);

            } );

        });

        return "Empty";
    }

    public function register( RegisterExam $request, ExamHelper $helper, UserHelper $user_helper, _DExamTransformer $examTransformer ){
        $user_id = $request->user_id;
        $exam_id = $request->exam_id;
        $exam = $helper->register_user_for_exam( $user_id, $exam_id );
        $exam = $examTransformer->transform( $exam );
        $data[ "exam" ] = $exam;
        $data[ "user_name" ] = $request->user_name;
        $email = $user_helper->getEmail( $user_id );
        Mail::to( $email )->send( new RegisterMail( $data ) );
        return $exam;
    }

    public function get( $id = null, Request $request, ExamHelper $helper, _ExamTransformer $examTransformer ){
        $exam = $helper->get( $id );
        $exam = $examTransformer->transform( $exam );
        return [ "exam" => $exam ];
    }

    public function confirm( Request $request, ExamHelper $helper, QuestionHelper $qhelper, _DExamTransformer $exam_transformer ){

        if( $request->action == "time_limit_exceed" ){
            $data = $qhelper->next_qs( $request, $helper );
            if( $data["redirect"] ){
                return redirect('/?active=3')->with('error', 'Time Limit Exceeded');
            }
        }

        $id = $request->exam_id; //todo check if user has registered for exam
        $exam = $helper->get( $id );
        $exam = $exam_transformer->transform( $exam );
        $started_at = null;
        
        if( isset($request->started_at) )
            $started_at = $request->started_at;
        
        $data = [
            "exam" => $exam,
            "title" => "Instruction",
            "started_at" => $started_at,
            "user_name" => $request->user_name,
            "user_image" => 'profile_pic.jpg',
            "back" => 2,
        ];

        $request->session()->flash( "exam_id", $data[ "exam" ][ "id" ] );
        
        return view( 'Student/Exam/instructions' )->with( "data", $data );
    }

    public function score( 
        $id,
        Request $request,
        ExamHelper $helper,
        ExamTransformer $exam_transformer,
        QuestionTransformer $question_transformer,
        OptionTransformer $option_transformer,
        SelectedOptionTransformer $selected_option_transformer
    ){

        $user_id = $request->user_id;

        $transformer = [
            "exam"=>$exam_transformer,
            "question"=>$question_transformer,
            "option"=>$option_transformer,
            "selected_option"=>$selected_option_transformer,
        ];

        $data = $helper->score( $id, $user_id, $transformer );

        $data[ "title" ] = "Score | ".$data["exam"]["name"];

        $data[ "user_name" ] = $request->user_name;
        $data[ "user_image" ] = 'profile_pic.jpg';
        $data[ "back" ] = 3;

        return view( 'Student/Score/index' )->with( "data", $data );

    }

    public function calculateScore(
        Request $request,
        ExamHelper $helper
    ){

        $user_id = $request->user_id;
        $exam_id = $request->exam_id;

        $data = $helper->calculateScore( $id, $user_id );

        if( $data != -1 )
            return $data;

        return "error";

        // $data[ "title" ] = "Score | ".$data["exam"]["name"];

        // $data[ "user_name" ] = $request->user_name;
        // $data[ "user_image" ] = 'profile_pic.jpg';
        // $data[ "back" ] = 3;

        // return view( 'Student/Score/index' )->with( "data", $data );

    }

}