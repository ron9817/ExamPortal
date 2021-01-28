<div class="title h5">
    Options<span class="text-danger">*</span>
</div>
<div id="question_options-{{ isset( $question->id ) ? $question->id : 'new' }}" class="options w-100">
	@if( isset( $question->options ) )
		@foreach( $question->options as $o_key=>$option )
			@include( 'Admin.Test.partials.option')
		@endforeach
	@else
	    @foreach( $options as $o_key => $option )
	    	@include( 'Admin.Test.partials.option')
	    @endforeach
    @endif
</div>
@error('options')
<div class="text-danger">{{$message}}</div>
@enderror
@error('options_selected')
<div class="text-danger">{{$message}}</div>
@enderror
<div class="my-1">
	<button type="button" name="id" data-id="{{ isset( $data_count ) ? $data_count : 1 }}" data-qs="#question_options-{{ isset( $question->id ) ? $question->id : 'new' }}" class="btn btn-outline-dark add_option_button">Add Option</button>
</div>