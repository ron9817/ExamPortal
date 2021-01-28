<div class="m-3 p-3 question_summary">
	@foreach( $data['exam']['questions'] as $q_key=>$question )
	<button class="btn btn-link m-2 p-0" name="action" value="track_qs-{{$question['qs_order']}}" type="submit">
		<span class="p-2 {{ $question['qs_order'] == $data['current_question']['qs_order'] ? 'current' : ( in_array(1, array_column($question['options'], 'is_review')) ? 'review' : ( in_array(1, array_column($question['options'], 'is_selected')) ? 'attempt' : 'n_attempt' ) ) }} badge pointer qs_track_button " id="qs_order_{{$question['qs_order']}}">
			@if($question['qs_order'] < 10){{'0'}}@endif{{$question['qs_order']}}
		</span>
	</button>
	@endforeach
	<div class="legend">
		<div class="legend_group">
			<span class="d-inline-block rounded-circle color-dot current"></span> <span class="text-current"> Current Question </span>
		</div>
		<div class="legend_group">
			<span class="d-inline-block rounded-circle color-dot review"></span> <span class="text-review"> Marked for review </span>
		</div>
		<div class="legend_group">
			<span class="d-inline-block rounded-circle color-dot attempt"></span> <span class="text-attempt"> Attempted </span>
		</div>
		<div class="legend_group">
			<span class="d-inline-block rounded-circle color-dot n_attempt"></span> <span class="text-n_attempt"> Remaining </span>
		</div>
	</div>
</div>