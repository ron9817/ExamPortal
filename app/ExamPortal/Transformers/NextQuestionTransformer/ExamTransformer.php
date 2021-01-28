<?php

namespace App\ExamPortal\Transformers\NextQuestionTransformer;

use App\ExamPortal\Transformers\Transformer;

use Carbon\Carbon;

use App\Helpers\Traits\DateTime;

class ExamTransformer extends Transformer{

	use DateTime;

	public function transform( $items, $transformer = [] ){

		$item["id"] = $items->id;
		$item["name"] = $items->name;
		$item["description"] = $items->description;
		$item["start_time"] = $this->getDateTime( $items->start_time );
		$item["end_time"] = $this->getDateTime( $items->end_time );
		$item["time_limit"] = $this->getTime( $items->time_limit );
		$item["marks"] = $items->questions->sum("marks");
		if( isset( $items->questions ) ){
			if( !empty($transformer) ){
				$item["questions"] = $transformer["question"]->transformCollection( $items->questions, $transformer );
			}
			elseif( !empty( $this->transformer ) ){
				$item["questions"] = $this->transformer["question"]->transformCollection( $items->questions, $this->transformer );
			}
		}else{
			$item["questions"] = [];
		}
		return $item;
	}
}