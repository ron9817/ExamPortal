<?php

namespace App\ExamPortal\Transformers\ScoreTransformer;

use App\ExamPortal\Transformers\Transformer;

class QuestionTransformer extends Transformer{

	public function transform( $items, $transformer ){

		$item["id"] = $items->id;
		$item["name"] = $items->name;
		$item["description"] = $items->description;
		$item["qs_order"] = $items->qs_order;
		$item["marks"] = $items->marks;
		$item["options"] = $this->transformer["option"]->transformCollection( $items->options, $this->transformer );
		$item["is_correct"] = array_sum( array_map( [ $this, "checkAnswer" ], $item["options"] ) ) == count( $item["options"] );
		
		return $item;

	}

	public function checkAnswer( $option ){
		if( $option['is_correct'] == 1 and $option['is_selected'] ==1 ){
			return true;
		}

		if( $option['is_correct'] == 0 and is_null($option['is_selected']) ){
			return true;
		}

		return false;

	}
}