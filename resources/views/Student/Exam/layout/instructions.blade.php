<div class="instruction_container d-flex align-items-center">
	<div class="d-block w-100">
		<form action="{{env('APP_URL')}}/question" method="POST">
			@csrf
			<div class="container">
				<div class="instruction bg-secondary p-5 border-primary">
					<div class="title text-primary my-2">Exam Details</div>
					@if(isset( $data[ 'started_at' ] ))
					<div class="d-flex justify-content-between">
					@endif
						<div class="content">
							<div class="contain">
								<div class="key text-primary d-inline-block">Exam Name:</div>
								<div class="value text-primary d-inline-block">{{$data['exam']['name']}}</div>
							</div>
							<div class="contain">
								<div class="key text-primary d-inline-block">Description:</div>
								<div class="value text-primary d-inline-block">{{$data['exam']['description']}}</div>
							</div>
							{{--<div class="contain">
								<div class="key text-primary d-inline-block">Marks:</div>
								<div class="value text-primary d-inline-block"></div>
							</div>--}}
							<div class="contain">
								<div class="key text-primary d-inline-block">Time Limit:</div>
								<div class="value text-primary d-inline-block">{{$data['exam']['time_limit']['hour']}} : {{$data['exam']['time_limit']['minute']}} : {{$data['exam']['time_limit']['second']}}</div>
							</div>
						</div>
					@if(isset( $data[ 'started_at' ] ))
						<div class="content">
							<div class="contain">
								<div class="key text-primary d-inline-block">Started At:</div>
								<div class="value text-primary d-inline-block">{{ $data[ 'started_at' ] }}</div>
							</div>
							<div class="contain">
								<div class="key text-primary d-inline-block">Time Left:</div>
								<div class="value text-primary d-inline-block" id="set_time_left">
									<span id="hours_left" class="d-inline-block time px-2 m-1"></span>:<span id="mins_left" class="d-inline-block time px-2 m-1"></span>:<span id="secs_left" class="d-inline-block time px-2 m-1"></span>
								</div>
							</div>
						</div>
					</div>
					@endif
					<div class="title text-primary my-2">Instructions</div>
					<div class="content">
						<ol>
							<li class="text-primary">Instruction 1</li>
							<li class="text-primary">Instruction 2</li>
							<li class="text-primary">Instruction 3</li>
							<li class="text-primary">Instruction 4</li>
							<li class="text-primary">Instruction 5</li>
						</ol>
					</div>
					<div class="d-flex justify-content-end">
						<a class="btn-primary-background bg-primary data_button d-inline-block">
							<span class="px-3 d-inline-block"> {{ isset($data[ 'started_at' ]) ? 'Resume' : 'Start' }} </span>
							<button type="submit" name="action" value="start" class="btn btn-secondary interactive"> <i class="fa fa-arrow-right"></i> </button>
						</a>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

@include( 'Student.Exam.partials.countdown_js' )

{{-- @push( 'page_js' )
<script>
	$(document).ready(_=>{
		@if( isset( $data['exam'] ) and isset( $data['started_at'] ) )
			
			const time_limit = "{{ $data['exam']->time_limit }}";
			const started_at = new Date("{{ $data['started_at'] }}");
			let time_left = calculate_time_left( time_limit, started_at );
			var interval = setInterval( 
				function(){
					if( time_left == 0 ){
						exam_ended( interval );
						// $( _time_left + ' ' + _secs_left ).text( '00' );
						return;
					}
					time_left = _countdown( time_left );
				}
				, 1000
			);

		@endif
	});
</script>
@endpush --}}