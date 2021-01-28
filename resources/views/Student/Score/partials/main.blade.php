<div class="qs_type text-center p-1">
	Multiple Choice
</div>
<div class="row">
	<div class="col-11">
		<div class="question text-center px-2">
			{{ $question["name"] }}
		</div>
	</div>
	<div class="col-1 answer_check d-flex align-items-center">
		@if( $question["is_correct"] )
			<i class="fa fa-check"></i>
		@else
			<i class="fa fa-times"></i>
		@endif
	</div>
</div>
<div class="marks">
	<span class="heading">Marks</span>
	<span class="value">{{ $question['marks'] }}</span>
</div>
<div class="options container my-2">
	@foreach( $question["options"] as $optn_key => $option )
		@if( $loop->odd )
			<div class="row">
		@endif
				<div class="col-md col-12 p-4">
					<input type="checkbox" name="option[]" id="optn_{{ $option['id'] }}" class="optn d-none" value=" {{ $option['id'] }} " {{ $option['is_selected'] ? 'checked="true"' : ''}} readonly>
					<label for="optn_{{ $option['id'] }}" class="w-100 mb-0">
						<div class="option p-3">
							<span class="d-inline-block py-3 px-4 option-number"> {{$loop->iteration}} </span>
							<span class="d-inline-block mx-3 option-text"> {{ $option["name"] }} </span>
						</div>
					</label>
				</div>
				@if( $loop->last and $loop->odd )
					<div class="col-md col-12 p-4">
					</div>
				</div>
				@endif
		@if( $loop-> even )
			</div>
		@endif
	@endforeach
	
</div>