@if( !$question[ "is_correct" ] )
<div class="correct_option">
	<span class="heading">Correct Answer: </span>
	<span class="value">
	@foreach( $question["options"] as $optn_key => $option )
		@if( $option[ "is_correct" ] )
			<span class="badge badge-correct p-2 m-1 d-inline-block"> {{$loop->iteration}}) {{$option["name"]}} </span>
		@endif
	@endforeach	
	</span>
</div>
@endif