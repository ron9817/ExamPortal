<div class="data_container">

	@if( isset( $data['exams_all_registered']["user_exam"]["1"] ) && count( $data['exams_all_registered']["user_exam"]["1"] ) > 0 )
		@foreach( $data['exams_all_registered']["user_exam"]["1"] as $exam_key => $exam )

		<form action="{{env('APP_URL')}}/exam/confirm" method="post">
			@csrf
			<div class="data_element m-2 p-3 bg-secondary row">
				<div class="col-lg-6 col-12">
					<div class="data_details">
						<div class="data_name">
							{{ $exam['name'] }} 
						</div>
						<div class="data_description">
							{{ $exam['description'] }}
						</div>
					</div>	
				</div>

				<div class="col-sm-6 col-lg-3 col-12">
					<div class="data_time">
						<div class="my-1">
							<div class="data_start_time badge badge-primary">
								<span class="label d-inline-block px-1"> Start Time: </span>
								<span class="value bg-secondary d-inline-block text-primary p-2 time_exam" title="dd / mm / yyyy hh : mm : ss"> {{ $exam['start_time']['day'] }} / {{ $exam['start_time']['month'] }} / {{ $exam['start_time']['year'] }} <span class="d-inline-block mx-1"></span> {{ $exam['start_time']['hour'] }} : {{ $exam['start_time']['minute'] }} : {{ $exam['start_time']['second'] }} </span>
							</div>
						</div>
						<div class="my-1">
							<div class="data_end_time badge badge-primary">
								<span class="label d-inline-block px-1"> End Time: </span>
								<span class="value bg-secondary d-inline-block text-primary p-2 time_exam" title="dd / mm / yyyy hh : mm : ss"> {{ $exam['end_time']['day'] }} / {{ $exam['end_time']['month'] }} / {{ $exam['end_time']['year'] }} <span class="d-inline-block mx-1"></span> {{ $exam['end_time']['hour'] }} : {{ $exam['end_time']['minute'] }} : {{ $exam['end_time']['second'] }} </span>
							</div>
						</div>
						<div class="my-1">
							<div class="data_time_left badge badge-primary">
								<span class="label d-inline-block px-1"> Time Limit: </span>
								<span class="value bg-secondary d-inline-block text-primary p-2 time_exam" title="hh : mm : ss"> {{ $exam['time_limit']['hour'] }} : {{ $exam['time_limit']['minute'] }} : {{ $exam['time_limit']['second'] }} </span>
							</div>
						</div>
					</div>			
				</div>

				<div class="col-sm-6 col-lg-3 col-12 d-flex justify-content-end">
					<div class="data_button_container">
						<a class="btn-primary-background bg-primary data_button d-inline-block" href="javascript:void(0);">
							<span class="px-3 d-inline-block"> {{ $exam['is_active'] == 1 ? 'Live' : 'Starts in '.$exam['pending_duration'] }} </span>
							<button type="submit" name="exam_id" value="{{$exam['id']}}" class="btn btn-secondary interactive"> <i class="fa fa-arrow-right"></i> </button>
						</a>
					</div>
				</div>
				
			</div>
		</form>

		@endforeach

	@else

	<div class="text-primary p-3 text-center bg-secondary">No exams</div>

	@endif
	
</div>