<?php

namespace App\Http\Middleware;

use Closure;

use Carbon\Carbon;

use Carbon\CarbonInterval;

use App\Models\Exam;

class ValidateExamStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {        
        $exam_id = $request->exam_id;
        $user_id = $request->user_id;
        $exam = Exam::whereHas( 'users', function( $q )use($user_id){

                    $q->where('user_id','=',$user_id);

                })
                ->with([
                    "users" => function( $q )use( $user_id ){
                        $q->select( 'started_at', 'is_submitted' )
                        ->where( [
                            "user_id" => $user_id
                        ] );
                    }
                ])
                ->find( $exam_id );

        if( isset($exam) ){
            $exam->user = $exam->users->get( '0' );
            $now = Carbon::now();
            $nowDateTimeString = $now->toDateTimeString();
            $start_time = Carbon::createFromFormat('Y-m-d H:i:s', $exam->start_time);
            $end_time = Carbon::createFromFormat('Y-m-d H:i:s', $exam->end_time);

            if( $now->greaterThanOrEqualTo( $start_time ) ){

                if( $now->lessThan( $end_time ) ){

                    if( isset( $exam->user->started_at ) ){

                        $secondsSinceStart = $now->diffInSeconds(Carbon::createFromFormat('Y-m-d H:i:s', $exam->user->started_at));
                        $time_limit = array_map( function( $v ){ return (int)$v; },explode(':', $exam->time_limit) );
                        $hour = 60*60;
                        $min = 60;
                        $sec = 1;
                        $time_limit_seconds = ( $time_limit[0]*$hour ) + ( $time_limit[1]*$min ) + ( $time_limit[2]*$sec );
                        if( $time_limit_seconds > $secondsSinceStart ){
                            $request->request->add(['started_at'=>$exam->user->started_at]);
                            //currently do nothing.. in future u can change if action is start then change action n qs order to last attempted question  

                        }else{
                            // return "Exceeded time limit";
                            $request->request->add([ 'action' => 'time_limit_exceed' ]);
                            // return redirect('/?active=3')->with('error', 'Time Limit Exceeded');
                        }
                        
                    }

                }else{
                    // return " Exam ended ";
                    return redirect('/?active=3')->with('error', 'Exam Ended');;
                }

            }else{
                // return " Exam not yet started ";
                return redirect('/?active=2')->with('error', 'Exam not started');;
            }

        }else{
            // return "Error No such exam";
            return redirect('/')->with('error', 'No such exam found');;
        }

        return $next($request);
    }
}
