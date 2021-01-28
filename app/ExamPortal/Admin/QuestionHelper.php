<?php

namespace App\ExamPortal\Admin;
use App\Models\Question;
class QuestionHelper
{
	public function get( ){
		$questions = Question::all();
		return $questions;
	}

	public function getById( $id ){
		$question = Question::find( $id );
		return $question;
	}

	public function add( $request ){
		$question = new Question;
		$question->name = $request->name;
		$question->type = $request->type;
		$question->marks = $request->marks;
		$question->is_multiple_choice = $request->is_multiple_choice ? $request->is_multiple_choice : 0;
		$question->save();
		return $question;
	}

	public function delete( $id ){
		$question = Question::destroy( $id );
	}

	public function update( $id, $request ){
		if( delete( $id ) )
			return add( $request );
		else
			return false;
	}
}