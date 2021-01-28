<?php

namespace App\ExamPortal;

use App\Models\User;

use Carbon\Carbon;

class UserHelper
{

	public function getEmail( $user_id ){
		return User::find( $user_id )->EMAIL;
	}

}