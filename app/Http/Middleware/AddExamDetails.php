<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class AddExamDetails
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
        $exam_id = isset( $request->exam_id ) ? $request->exam_id : $request->session()->get('exam_id');

        if( $request->action == 'review' or !isset( $request->action ) ){

            $qs_order = (int)$request->session()->get('qs_order');

        }else{

            $qs_order_s = (int)$request->session()->get('qs_order');
            $qs_order_r = (int)$request->qs_order;

            if( $qs_order_r != $qs_order_s ){
                if( $request->action == "next" )
                    $qs_order_r += 1;
                else if( $request->action == "previous" )
                    $qs_order_r -= 1;
                $request->request->add( [ "option" => null, "action" => "reload" ]);
                $qs_order = $qs_order_r;
            }else{
                $qs_order = $qs_order_s;
            }
        }

        $qs_id = $request->session()->get('qs_id');
        if( isset( $exam_id ) )
            $request->request->add(['exam_id'=>$exam_id]);
        if( isset( $qs_order ))
            $request->request->add(['qs_order'=>$qs_order]);
        if( isset($qs_id))
            $request->request->add(['qs_id'=>$qs_id]);

        return $next($request);
    }
}
