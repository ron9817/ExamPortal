<?php

namespace App\ExamPortal;
use App\Models\Exam;
use App\Models\User;
use App\Models\Question;
use App\Models\Option;
use Carbon\Carbon;

use App\ExamPortal\ExamHelper;

class QuestionHelper
{

	//checks if still active test

	//check started at

	public function saveAnswers( $user_id, $exam_id, $qs_id, $options, $is_marked=0 ){

		if( isset( $options ) ){

			$selectedOptions = 
				User::whereHas( 'selectedOptions', function( $q )use( $exam_id, $qs_id ){

					$q->where([
						"UserOptionMapping.exam_id" => $exam_id,
						"UserOptionMapping.qs_id" => $qs_id
					]);

				})
				->with( ['selectedOptions' => function( $q )use( $exam_id, $qs_id ){

					$q->where([
						"UserOptionMapping.exam_id" => $exam_id,
						"UserOptionMapping.qs_id" => $qs_id
					]);

				}])
				->find( $user_id );
				
			if( isset( $selectedOptions ) )
				$selectedOptions = $selectedOptions->selectedOptions;

			if( isset( $selectedOptions ) ){

				$is_deleted = User::find( $user_id )
							  ->selectedOptions()
							  ->detach( $selectedOptions );
			}

			$options_saved = User::find( $user_id )
					->selectedOptions()
					->attach( $options, [
						"exam_id" => $exam_id,
						"qs_id" => $qs_id,
						"is_marked_for_review" => $is_marked
					] );
		}

		return true;
	}

	public function next_qs( $request, $examHelper ){

		$exam_id = (int)$request->exam_id;

		$user_id = (int)$request->user_id;

		$qs_id = (int)$request->qs_id;

		$is_review = (int) isset( $request->is_review ) ? $request->is_review : 0;

		$track_qs = "track_qs";

		if( $request->action == "start" and !isset( $request->started_at ) ){
			
			$res = $examHelper->startExam( $user_id, $exam_id );
			if( $res == 0 ){
				$data = [
					"error" => 1,
					"msg" => "Error in starting exam"
				];
				return $data;
				//to do see on how to handle error for start as it is different page
				//one solution redirect to exam confirm page
			}
			$started_at = $res;

		}
		else
		{

			//if(isset($request->option)) //to do this if to be removed after adding validation n in validation if option is not set then set it to [] depending on type of exam or question required/ compulsory no.. [] wont work as already attached answer will be removed
				
			$res = $this->saveAnswers( $user_id, $exam_id, $qs_id, $request->option, $is_review );

			if( !$res ){

				$data = [
					"error" => 1,
					"msg" => "Error in saving answers"
				];

			}
			elseif( $request->action == "submit" ){
				
				$res = $examHelper->submitExam( $exam_id, $user_id );

				//to do check what res is when successfully exam submitted;

				if( $res != -1 ){
					$exam = $examHelper->get($exam_id);
					$data = [
						"exam" => $exam,
						"msg" => "Exam submitted successfully"
					];

					return $data; //since if exam successfully submitted then no need of question

				}else{
					$data = [
						"error" => 1,
						"msg" => "Error in exam submission"
					];
				}

			}
			elseif( $request->action == "time_limit_exceed" ){

				$res = $examHelper->submitExam( $exam_id, $user_id, 1 );
				if( $res != -1 ){
					return [
						"redirect" => true
					];
				}else{
					$data = [
						"error" => 1,
						"msg" => "Time limit exceeded. There was error in submitting your response"
					];
					//todo change to appropriate msg
				}
			}

		}

		$exam = $examHelper->getExamFullDetails( $user_id, $exam_id );

		if( isset($exam) ){

			if( $request->action == "reload" ){

				$qs_order = isset( $request->qs_order ) ? $request->qs_order : 1;

			}
			elseif( isset( $data ) and isset( $data["error"] ) and $data["error"] == 1 ){

				$qs_order = $request->qs_order;

			}
			elseif( substr( $request->action, 0, strlen($track_qs)) == $track_qs ){

				$qs_order = explode( "-" , $request->action )[1];

			}
			else{

				$inc = $request->action == "previous" ? -1 : 1;
				$qs_order = isset( $request->qs_order ) ? ((int)$request->qs_order) + $inc : 1;
			}

			$qs_order = $qs_order < 1 ? 1 : $qs_order;
			$qs_order = $exam->questions->count() < $qs_order ? $exam->questions->count() : $qs_order;

			if( isset( $data ) ){

				$data[ "exam" ] = $exam;
				$data[ "current_question" ] = $exam->questions->firstWhere('qs_order', '=', $qs_order);

			}else{

				$data = [
					"exam" => $exam,
					"current_question" => $exam->questions->firstWhere('qs_order', '=', $qs_order),
					"started_at" => isset( $request->started_at ) ? $request->started_at : (isset( $started_at ) ? $started_at : '' )
				];

			}
		}else{
			$data = [
				"error" => 1,
				"msg" => "No exam found"
			];
		}
		return $data;
	}

	public function review( $request ){
		//validate at least one option present
		$user_id = $request->user_id;
		$qs_id = $request->qs_id;
		$exam_id = $request->exam_id;
		$is_marked = $request->is_marked;
		$res = $this->saveAnswers( $user_id, $exam_id, $qs_id, $request->option, $is_marked );
		return $res;
	}

}