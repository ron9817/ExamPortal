<?php

namespace App\ExamPortal\Transformers\NextQuestionTransformer;

use App\ExamPortal\Transformers\Transformer;

class QuestionTransformer extends Transformer{

	public function transform( $items, $transformer ){

		$item["id"] = $items->id;
		$item["name"] = $items->name;
		$item["description"] = $items->description;
		$item["qs_order"] = $items->qs_order;
		$item["marks"] = $items->marks;
		$item["options"] = $this->transformer["option"]->transformCollection( $items->options, $this->transformer );
		return $item;

	}
}