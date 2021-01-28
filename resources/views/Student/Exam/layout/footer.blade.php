<div class="d-flex justify-content-between flex-sm-row flex-column flex-wrap align-content-center my-5">
	<div class="btn-primary-background my-2">
		<button type="submit" name="action" value="previous" class="btn btn-primary interactive"> <i class="fa fa-arrow-left"></i> </button>
		<span class="px-2 d-inline-block text-primary">Previous Question</span>
	</div>

	<div class="btn-primary-background my-2">
		<label for="qs_is_review" class="mb-0 w-100"> <div 
			type="button"
			name="action"
			value="review"
			class="w-100 btn interactive {{ in_array(1, array_column($data['current_question']['options'], 'is_review')) ? 'btn-primary already_mark_for_review' : 'btn-secondary mark_for_review' }}"
			data-qs="{{$data['current_question']['qs_order']}}"
		> <span class="px-3 d-inline-block {{ in_array(1, array_column($data['current_question']['options'], 'is_review')) ? 'text-white' : 'text-primary' }}"> {{ in_array(1, array_column($data['current_question']['options'], 'is_review')) ? 'Unmark for review' : 'Mark for review' }} </span> </div> </label>
		<input class="d-none" type="checkbox" name="is_review" id="qs_is_review" value="1" {{ in_array(1, array_column($data['current_question']['options'], 'is_review')) ? 'checked' : ' ' }} >
	</div>

	<div class="btn-primary-background my-2 {{ count($data['exam']['questions']) == $data['current_question']['qs_order'] ? 'submit' : '' }}">
		<span class="px-2 d-inline-block text-primary">{{ count($data['exam']['questions']) == $data['current_question']['qs_order'] ? 'Submit' : 'Next Question' }}</span>
		<button type="submit" name="action" value="{{ count($data['exam']['questions']) == $data['current_question']['qs_order'] ? 'submit' : 'next' }}" class="btn btn-primary interactive"> <i class="fa fa-arrow-right"></i> </button>
	</div>
</div>

@push( 'page_js' )
<script type="text/javascript">
	const _review_button = "mark_for_review";
	const _cancel_review_button = "already_mark_for_review";
	const _form = ".question_form";
	const _base_button_id = "qs_order_";
	$(document).ready( _=>{
		$( document ).on( "click", "."+_review_button, function(){
			handle_review( 1, "Question marked for review", $(this));
		} );

		$( document ).on( "click", "."+_cancel_review_button, function(){
			handle_review( 0, "Question unchecked for review", $(this));
		} );
	} );
	const handle_review = ( _is_marked, _msg, _element )=>{
		let _data = new FormData( $(_form)[0] );
		_data.append( 'is_marked', _is_marked );

		axios.post(
			base_url+"question/review",
			_data
		)
		.then(
			data => {
				let msg = "";
				if( data.data == 1 ){
					msg = _msg;
				}
				else{
					msg = "Error in marking question for review";
				}
				alert_swal( msg ).then(
					result => {
						console.log( "Success" );
						$(_element).toggleClass( _review_button ).toggleClass( _cancel_review_button ).toggleClass( "btn-secondary" ).toggleClass( "btn-primary" );
						if( _is_marked==0 ){
							$(_element).children("span").toggleClass("text-white").toggleClass("text-primary").text("Mark for review");
						}else{
							$(_element).children("span").toggleClass("text-white").toggleClass("text-primary").text("Unmark for review");
						}
						const qs = $(_element).data("qs");
						$("#"+_base_button_id+qs).toggleClass("review").toggleClass("attempt");
						//later change it as per background response


					}
				);
			}
		)
		.catch(
			error => {
				const key  = Object.keys( error.response.data.errors )[0]
				alert_swal( error.response.data.errors[ key ][0] ).then( _=>{
					location.reload();
				} );
			}
		);
	}
</script>
@endpush

@include( 'Student.Exam.partials.countdown_js' )

