<form action="{{env('APP_URL')}}/question/{{$data[ 'qs_order' ]}}" method="post" class="question_form">
	<div class="row no-gutters my-sm-5 my-0">
		<div class="col-sm-2 col-12">
			@include( 'Student.Exam.partials.track_questions' )
		</div>
		<div class="col-sm-10 col-12">
			<div class="container">
				@csrf
				@include( 'Student.Exam.partials.main' )
				@include( 'Student.Exam.layout.footer')
			</div>	
		</div>
	</div>
</form>