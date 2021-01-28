<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
	function index(Request $request){
		if( Auth::check() ){

			return redirect('/');

		}
		return view( 'login' );
	}

	function logout(){
		Auth::logout();
		return redirect( '/' );
	}
	function logout_(){
		return '<form method="post" action="/logout"> <button type="submit">Logout</button> </form>';
	}
	function login( Request $request) {
		if( Auth::check() ){

			return redirect('/');

		}else{
			
			$userdata = [

				'NAME' => $request->username,

				'password' => $request->password

			];

			if (Auth::attempt($userdata)) {

		    	$request->session()->regenerate();

		    	if(Auth::user()->is_admin == 0 )
					return redirect('/');
				else
					return redirect('/admin');

		    } else {

		    	return redirect('/login')
		    	->withErrors('Incorrect login details');

		    }

		}
	}
}