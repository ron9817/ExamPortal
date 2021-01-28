<?php

namespace App\ExamPortal\Transformers\DashboardTransformer;

use App\ExamPortal\Transformers\Transformer;

use Carbon\Carbon;

use App\Helpers\Traits\DateTime;

class ExamTransformer extends Transformer{

	use DateTime;

	public function transform( $items ){
		$item["id"] = $items->id;
		$item["name"] = $items->name;
		$item["description"] = $items->description;
		$item["is_active"] = $items->is_active;
		$item["start_time"] = $this->getDateTime( $items->start_time );
		$item["end_time"] = $this->getDateTime( $items->end_time );
		$item["time_limit"] = $this->getTime( $items->time_limit );
		$item["pending_duration"] = $this->getPendingDuration( $items->start_time );
		return $item;
	}
}