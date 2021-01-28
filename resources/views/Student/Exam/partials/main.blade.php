<div class="qs_type text-center p-1">
	Multiple Choice
</div>
<div class="question text-center px-2">
	<span class="qs_number"> Qs {{ $data["current_question"]["qs_order"] }}: </span> {{ $data["current_question"]["name"] }}
</div>
<div class="marks">
	<span class="heading">Marks</span>
	<span class="value">{{ $data["current_question"]['marks'] }}</span>
</div>
<div class="options container my-5">
	@foreach( $data["current_question"]["options"] as $optn_key => $option )
		@if( $loop->odd )
			<div class="row">
		@endif
				<div class="col-md col-12 p-4">
					<input type="checkbox" name="option[]" id="optn_{{ $option['id'] }}" class="optn d-none" value=" {{ $option['id'] }} " {{ $option['is_selected'] ? 'checked="true"' : ''}}>
					<label for="optn_{{ $option['id'] }}" class="w-100 mb-0 pointer">
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