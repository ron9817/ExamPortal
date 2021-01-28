<div class="container">
	@foreach( $data["exam"]["questions"] as $qs_key => $question )
		<div class="my-2 py-2 score_qs_container">
			@include( 'Student.Score.partials.main' )
			@include( 'Student.Score.layout.footer')
		</div>
	@endforeach
</div>