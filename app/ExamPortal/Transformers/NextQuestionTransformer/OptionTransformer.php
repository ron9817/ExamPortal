<?php

namespace App\ExamPortal\Transformers\NextQuestionTransformer;

use App\ExamPortal\Transformers\Transformer;

class OptionTransformer extends Transformer{

	public function transform( $items ){

		$item["id"] = $items->id;
		$item["name"] = $items->name;
		$item["is_correct"] = $items->is_correct;
		$item["is_review"] = $items->selectedOptions->first() ? $items->selectedOptions->first()->pivot->is_marked_for_review : 0;
		// $item["is_selected"] = $items->selectedOptions->count()>0 ? $items->selectedOptions->first()->pivot->optn_id : null;
		$item["is_selected"] = $items->selectedOptions->count()>0 ? 1 : null;
		$item["selected_options"] = $this->transformer["selected_option"]->transformCollection( $items->selectedOptions );
		return $item;

	}
}