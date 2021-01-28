<?php

namespace App\Http\Controllers\Student\Dashboard;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\ExamPortal\Student\Dashboard\DashboardHelper;

use App\ExamPortal\ExamHelper;

use Illuminate\Support\Facades\Auth;

use App\ExamPortal\Transformers\DashboardTransformer\ExamTransformer;


class DashboardController extends Controller
{

    public function index( ExamHelper $helper, Request $request, ExamTransformer $examTransformer )
    {
        //validate filter start before end 
        $c = isset( $request->c ) ? $request->c : false;
        if( $c == 1 )
            return redirect()->route( "dashboard" )->with('error', 'Filter Cleared');
        $filter = [];
        $f = isset( $request->f ) ? $request->f : false;
        if( $f == 1 ){

            if( isset( $request->q ) )
                array_push( $filter , ["name","like", "%".$request->q."%"] );
            if( isset( $request->s1 ) )
                array_push( $filter , ["start_time",">=",$request->s1] );
            if( isset( $request->s2 ) )
                array_push( $filter , ["start_time","<=",$request->s2] );
            if( isset( $request->e1 ) )
                array_push( $filter , ["end_time",">=",$request->e1] );
            if( isset( $request->e2 ) )
                array_push( $filter , ["end_time","<=",$request->e2] );
            if( isset( $request->tl1 ) )
                array_push( $filter , ["time_limit",">=",$request->tl1] );
            if( isset( $request->tl2 ) )
                array_push( $filter , ["time_limit","<=",$request->tl2] );

        }
        $active = in_array( $request->active, [1,2,3] ) ? $request->active : 1;
        $user_id = $request->user_id;

        $exams_all_registered = $helper->get_all_user_exam( $user_id, $filter );

        if( isset( $exams_all_registered[ 'user_exam' ]["2"] ) ){

            $exams_all_registered[ 'user_exam' ]["2"] = 
                $examTransformer->transformCollection( $exams_all_registered[ 'user_exam' ]["2"] );

        }
        if( isset( $exams_all_registered[ 'user_exam' ]["1"] ) ){

            $exams_all_registered[ 'user_exam' ]["1"] = 
                $examTransformer->transformCollection( $exams_all_registered[ 'user_exam' ]["1"] );

        }

        $exams_all_registered[ 'submitted_exam' ] = 
                $examTransformer->transformCollection( $exams_all_registered[ 'submitted_exam' ] );

        $exams_not_registered = $helper->get_all_exam_user_not_registered( $user_id, $filter );
        
        $exams_not_registered = $examTransformer->transformCollection( $exams_not_registered );

        $filter = [];
        if( $f == 1 ){
            $filter["q"] = isset( $request->q ) ? $request->q : "";
            $filter["s1"] = isset( $request->s1 ) ? $request->s1 : "";
            $filter["s2"] = isset( $request->s2 ) ? $request->s2 : "";
            $filter["e1"] = isset( $request->e1 ) ? $request->e1 : "";
            $filter["e2"] = isset( $request->e2 ) ? $request->e2 : "";
            $filter["tl1"] = isset( $request->tl1 ) ? $request->tl1 : "";
            $filter["tl2"] = isset( $request->tl2 ) ? $request->tl2 : "";
            $filter["f"] = $request->f;
        }else{
            $filter["q"] = "";
            $filter["s1"] = "";
            $filter["s2"] = "";
            $filter["e1"] = "";
            $filter["e2"] = "";
            $filter["tl1"] = "";
            $filter["tl2"] = "";
        }
        $data = [
            "exams_all_registered" => $exams_all_registered,
            "exams_not_registered" => $exams_not_registered,
            "active" => $active,
            "title" => "Dashboard",
            "user_name" => $request->user_name,
            "user_image" => 'profile_pic.jpg',
            "filter" => $filter
        ];
        // return $exams;
        return view('Student.Dashboard.index')->with( "data", $data );
    }

    public function register( Request $request, ExamHelper $helper, ExamTransformer $examTransformer ){
        $user_id = $request->user_id;
        $exam_id = $request->exam_id;
        $exam = $helper->register_user_for_exam( $user_id, $exam_id );
        $exam = $examTransformer->transform( $exam );
        return $exam;
    }
}