<?php

namespace App\ExamPortal\Transformers;

abstract class Transformer{

	public $transformer = [];

	public function transformCollection( $items, $transformer = [] ){
		$this->transformer = $transformer;
		return $items->map( [ $this,'transform' ] )->toArray();
	}

}