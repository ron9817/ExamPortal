<?php

namespace App\Http\Middleware;

use Closure;

use Carbon\Carbon;

use Carbon\CarbonInterval;

use App\Models\Exam;

class ValidateExamEnd
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
        
        $exam_id = $request->id;
        $user_id = $request->user_id;
        $exam = Exam::whereHas( 'users', function( $q )use($user_id){

                    $q->where('user_id','=',$user_id);

                })
                ->find( $exam_id );

        if( isset($exam) ){
            $now = Carbon::now();
            $nowDateTimeString = $now->toDateTimeString();
            $end_time = Carbon::createFromFormat('Y-m-d H:i:s', $exam->end_time);

            if( $now->greaterThanOrEqualTo( $end_time ) ){

                //submit-- not required as if user has not submitted untill tym is over we will consider his last response
                //your score is not evaluated

            }else{
                // return " Exam ended ";
                return redirect('/?active=3')->with('error', 'Exam still in progress. Your score will be available once exam ends');;
            }

        }else{
            // return "Error No such exam";
            return redirect('/')->with('error', 'No such exam found');;
        }

        
        return $next($request);
    }
}
