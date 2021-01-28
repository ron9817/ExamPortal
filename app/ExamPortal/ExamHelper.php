<?php

namespace App\ExamPortal;

use Illuminate\Support\Facades\Mail;

use App\Models\Exam;
use App\Models\User;

use Carbon\Carbon;

use App\Mail\ScoreMail;

use App\ExamPortal\Transformers\ScoreTransformer\ExamTransformer;

use App\ExamPortal\Transformers\ScoreTransformer\QuestionTransformer;

use App\ExamPortal\Transformers\NextQuestionTransformer\OptionTransformer;

use App\ExamPortal\Transformers\ScoreTransformer\SelectedOptionTransformer;

class ExamHelper
{

	/*
		3 methods:- 
		all exams that are active and published but user has not registered
		all exam that are active and published and user has registerd
		all exam that are not active but published and user has registered
	*/
	public function get_all_exam_user_not_registered( $user_id, $filter ){
		// $user_id = 4;
		$exams = Exam::whereDoesntHave('users', function( $q )use( $user_id, $filter ){
			$q->where('user_id','=',$user_id);
		})
		->where([
			'is_published' => 1,
			// 'is_active' => 1
		])
		->where( $filter )
		->get();
		return $exams;
	}

	public function get_all_user_exam( $user_id, $filter ){
		// $user_id = 1;
		$exams = User::with([
			'exams' => function( $q )use( $user_id, $filter ){
				$q->where( 'user_id' , '=' , $user_id )
				// ->where( 'is_published' , '=' , 1 )
				->where( $filter );
			}
		])
		->where(
			[
				"ID"=>$user_id
			]
		)
		->first();
		$user_exam = $exams->exams
						->where( "pivot.is_submitted" , 0 )
						->groupBy( 'is_published' );
		$submitted_exam = $exams->exams
						->where( "pivot.is_submitted" , 1 );
		$registered_exams = [
			"user_exam" => $user_exam,
			"submitted_exam" => $submitted_exam
		];
		
		return $registered_exams;
	}

	public function register_user_for_exam( $user_id, $exam_id ){
		$exam = Exam::find( $exam_id );
		$user = User::find( $user_id );
		$exam->users()->attach( $user );
		return $exam;
	}

	public function get( $id ){
		if( isset($id) ){
			$exam = Exam::find( $id );	
		}
		else{
			$exam = Exam::all();
		}
		return $exam;
	}

	public function submitExam( $exam_id, $user_id, $is_time_limit_exceed = 0 ){
		$score = $this->calculateScore( $exam_id, $user_id );
		if( $score != -1 )
			return Exam::find($exam_id)->users()->updateExistingPivot($user_id, [
				"is_submitted" => 1,
				"submitted_at" => Carbon::now()->toDateTimeString(),
				"marks" => $score,
				"is_time_limit_exceed" => $is_time_limit_exceed
			]);
		else 
			return -1;
	}

	public function submitExam_( $exam, $user_id, $is_time_limit_exceed = 1 ){
		$score = $this->calculateScore_( $exam, $user_id );
		if( $score != -1 )
			return $exam->users()->updateExistingPivot($user_id, [
				"is_submitted" => 1,
				"submitted_at" => Carbon::now()->toDateTimeString(),
				"marks" => $score,
				"is_time_limit_exceed" => $is_time_limit_exceed
			]);
		else 
			return -1;
	}

	public function startExam( $user_id, $exam_id ){
		//check no need of examid
		$exam = Exam::where( ['id'=>$exam_id] )
					->with(
						[
							'users' => function( $q )use($user_id){
								$q->where('user_id','=',$user_id);
							}
						]
					)
					->first();

		// $exam->users = $exam->users->toArray(); removed since now this function is callled only if exam is not started

		// if( !isset($exam->users[0]["pivot"]["started_at"]) ){//to do: check this condition in middleware only n if alread already started then directly show question
			$started_at = Carbon::now()->toDateTimeString();
			$res = $exam->users()
						->updateExistingPivot( $user_id, [ "started_at"=>$started_at ]);

			$fail = 0;
			// $pass = 1;

			if( $res == 1 )
				return $started_at;

			return $fail;
		/*
		}
		else
			return 1;
			*/
	}

	public function getExamFullDetails( $user_id, $exam_id ){
		$exam = Exam::where( [
					'id' => $exam_id
				] )
				->whereHas( 'users', function( $q )use($user_id){

					$q->where('user_id','=',$user_id);

				})
				->whereHas( 'questions' )

				->whereHas( 'questions.options' )

				->with( [
					'users'=>function( $q )use($user_id){
						$q->where('user_id','=',$user_id);
					},
					'questions'=>function( $q ){
						$q->orderBy( 'qs_order' );
					},
					'questions.options',
					'questions.options.selectedOptions'=>function( $q )use($user_id){
						$q->where('user_id','=',$user_id);
					}
				] )
				->first();
		return $exam;
	}

	public function getExamsFullDetails( $exam_ids ){
		$exams = Exam::whereIn( 'id', $exam_ids )
				->whereHas( 'users')

				->whereHas( 'questions' )

				->whereHas( 'questions.options' )

				->with( [
					'users' => function( $q ){
						$q->whereNotNull( 'started_at' )
						->orderBy( 'marks', 'DESC' );
					}
				] )
				->get();

		return $exams;
	}


	public function score( $exam_id, $user_id, $transformer ){
		
		$exam = $this->getExamFullDetails( $user_id, $exam_id );

		if( isset($exam) ){

			$data = [
				"exam" => $exam
			];

	        $data[ "exam" ] = $transformer['exam']->transform( $data["exam"], $transformer );
		}
		else{

			$data = [
				"error"=> 1,
				"msg"=> "No such exam found"
			];

		}

		return $data;
	}




	public function calculateScore( $exam_id, $user_id ){

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

		$exam = $this->getExamFullDetails( $user_id, $exam_id );

		if( isset($exam) ){

	        $exam = $transformer['exam']->transform( $exam, $transformer );

	        $score = array_sum( array_map( [ $transformer['exam'], "checkQuestion" ], $exam["questions"] ) );

	        return $score;
		}
		else{

			return -1;

		}
		
	}

	public function calculateScore_( $exam, $user_id ){

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

		if( isset($exam) ){

	        $exam = $transformer['exam']->transform( $exam, $transformer );

	        $score = array_sum( array_map( [ $transformer['exam'], "checkQuestion" ], $exam["questions"] ) );

	        return $score;
		}
		else{

			return -1;

		}
		
	}
	public function checkExamsEnded(){

		$exam_ids = Exam::where( "end_time", '<=', Carbon::now() )
                    ->where( [ 'is_active' => 1 ] )
                    ->select( 'id' )
                    ->get()
                    ->pluck( 'id' )
                    ->all();

		$update = Exam::whereIn( "id", $exam_ids )
					->update( [ 'is_active' => 0, 'is_published' => 2 ] );

        $exams = Exam::whereIn( "id", $exam_ids )
			        ->with( [ "users" => function( $q ){

			            $q->whereNotNull( 'started_at' )
			            ->where( [ 'is_submitted' => 0 ] );

			        } ] )
			        ->get()
			        ->each( function( $item, $key ){

			            $item->users->each( function( $uitem, $ukey )use( $item ){

			                $this->submitExam_( $item, $uitem->ID );

			            } );
			        } );

		$exams_to_update = $this->getExamsFullDetails( $exam_ids );

        $_this = $this;

        $exams_to_update->each( function( $_exam, $key )use( $_this ){

            $_exam->users->each( function( $user, $ukey )use( $_exam, $_this ){

            	$rank = $ukey+1;
                $this->saveRank( $rank, $user->ID, $_exam->id );

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

                $exam = $this->getExamFullDetails( $user->ID, $_exam->id );
                $exam = $transformer['exam']->transform( $exam, $transformer );

                $data = [];
                $exam[ "rank" ] = $rank;
                $data[ "exam" ] = $exam;
                $data[ "user_name" ] = $user->NAME;
                $this->sendScoreEmail( $user->EMAIL, $data);

            } );

        });
	}

	public function checkExamsStarted(){

		$update = Exam::where( "start_time", '<=', Carbon::now() )
		->where( [ 'is_published' => 1, 'is_active' => 0 ] )
		->update( [ 'is_active' => 1 ] );
		
	}

	public function sendScoreEmail( $email, $data ){
		Mail::to( $email )->send( new ScoreMail( $data ) );
	}

	public function saveRank( $rank, $user_id, $exam_id ){

		return Exam::find($exam_id)->users()->updateExistingPivot($user_id, [
				"rank" => $rank
			]);

	}

}