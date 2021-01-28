<div class="m-2">
    {{--@if( isset($option) )--}}
    	<input class="optn_input" type="checkbox" name="options_selected[]" value='{{ isset( $data_count ) ? $data_count : $loop->index }}' {{ $option['is_correct'] ? 'checked' : '' }}>

    	<input class="rounded border {{ $option['is_correct'] ? 'bg-success' : 'border-danger' }} shadow-sm p-2 w-auto optn_text" type="text" name="options[]" placeholder="Enter Option" value="{{$option['name']}}">
    {{--@else
    	<input class="optn_input" type="checkbox" name="options_selected[]" value='{{ isset( $data_count ) ? $data_count : $loop->index }}'>
    	<input class="rounded border border-danger shadow-sm p-2 w-auto optn_text" type="text" name="options[]" placeholder="Enter Option">
    @endif--}}
    
    <button class="btn btn-link delete_option_button" type="submit" name="delete" value='{{ isset( $data_count ) ? $data_count : $loop->index }}' >
    	<span>
    		<i class="fa fa-times text-danger" aria-hidden="true"> </i>
    	</span>
    </button>

</div>


@push( 'page_js' )
<script>
	$(document).ready( _=>{
		$( document ).on( "click", ".delete_option_button", function(){
		console.log("happy");
		} );
	});
</script>
@endpush