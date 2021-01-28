<?php

namespace App\ExamPortal\Transformers\ScoreTransformer;

use App\ExamPortal\Transformers\Transformer;

use Carbon\Carbon;

use App\Helpers\Traits\DateTime;


class ExamTransformer extends Transformer{

	use DateTime;

	public function transform( $items, $transformer = null ){

		$item["id"] = $items->id;
		$item["name"] = $items->name;
		$item["description"] = $items->description;
		$item["start_time"] = $this->getDateTime( $items->start_time );
		$item["end_time"] = $this->getDateTime( $items->end_time );
		$item["time_limit"] = $this->getTime( $items->time_limit );
		$item["rank"] = isset( $items->users->get(0)->pivot->rank ) ? $items->users->get(0)->pivot->rank : '-';
		$item["marks"] = $items->questions->sum("marks");
		if( isset( $items->questions ) ){
			if( isset($transformer) )
				$item["questions"] = $transformer["question"]->transformCollection( $items->questions, $transformer );
			elseif( isset( $this->transformer ) )
				$item["questions"] = $this->transformer["question"]->transformCollection( $items->questions, $this->transformer );
			// if( isset( $items->users->get(0)->pivot->marks ) )
				// $item["score"] = $items->users->get(0)->pivot->marks;
			// else{
				// $item["score"] = array_sum( array_map( [$this, "checkQuestion" ], $item["questions"] ) );
			// }
		}
		
		$item["score"] = $items->users->get(0)->pivot->marks;

		return $item;

	}

	public function checkQuestion( $question ){
		if( $question["is_correct"] ){
			return $question["marks"];
		}
		return 0;
	}
}