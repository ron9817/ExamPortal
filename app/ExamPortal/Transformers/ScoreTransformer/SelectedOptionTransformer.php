<?php

namespace App\ExamPortal\Transformers\ScoreTransformer;

use App\ExamPortal\Transformers\Transformer;

class SelectedOptionTransformer extends Transformer{

	public function transform( $items ){

		$item["is_marked_for_review"] = $items->is_marked_for_review;
		$item["optn"] = $items->optn_id;
		return $item;

	}
}