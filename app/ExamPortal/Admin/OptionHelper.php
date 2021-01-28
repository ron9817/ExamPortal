<?php

namespace App\ExamPortal\Admin;
use App\Models\Option;
class OptionHelper
{
	public function get( ){
		$options = Option::all();
		return $options;
	}

	public function getById( $id ){
		$option = Option::find( $id );
		return $option;
	}

	public function add( $request ){
		$option = new Option;
		$option->name = $request->name;
		$option->save();
		return $option;
	}

	public function delete( $id ){
		$option = Option::destroy( $id );
	}

	public function update( $id, $request ){
		if( delete( $id ) )
			return add( $request );
		else
			return false;
	}
}