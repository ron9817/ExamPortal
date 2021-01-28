<?php

namespace App\ExamPortal\Admin;
use App\Models\Exam;
class ExamHelper
{
	public function get( ){
		$exams = Exam::all();
		return $exams;
	}

	public function getById( $id ){
		$exam = Exam::find( $id );
        return view('admin.test', ['ID' => $id]);
		// return $exam;
	}

	public function add( $request ){
		$exam = new Exam;
		$exam->name = $request->name;
		$exam->start_time = $request->start_time;
		$exam->end_time = $request->end_time;
		$exam->time_limit = $request->time_limit;
		$exam->is_negative_marking = $request->is_negative_marking ? $request->is_negative_marking : 0;
		$exam->negative_marks = $request->negative_marks;
		$exam->save();
		return $exam;
	}

	public function delete( $id ){
		$exam = Exam::destroy( $id );
	}

	public function update( $id, $request ){
		if( delete( $id ) )
			return add( $request );
		else
			return false;
	}
}