<div class="instruction_container d-flex align-items-center">
	<div class="d-block w-100">
		<div class="container">
			<div class="instruction bg-secondary p-5 border-primary">
				<div class="title text-primary my-2 text-center">Successfully Submitted Exam.</div>
				<div class="title text-primary my-2">Exam Details</div>
				<div class="content">
					<div class="contain">
						<div class="key text-primary d-inline-block">Exam Name:</div>
						<div class="value text-primary d-inline-block">{{$data['exam']['name']}}</div>
					</div>
					<div class="contain">
						<div class="key text-primary d-inline-block">Description:</div>
						<div class="value text-primary d-inline-block">{{$data['exam']['description']}}</div>
					</div>
					<div class="contain">
						<div class="key text-primary d-inline-block">End Time:</div> <span class="text-primary value bg-secondary d-inline-block text-primary time_exam" title="dd / mm / yyyy hh : mm : ss"> {{ $data['exam']['end_time']['day'] }} / {{ $data['exam']['end_time']['month'] }} / {{ $data['exam']['end_time']['year'] }}  <span class="d-inline-block mx-1"></span>  {{ $data['exam']['end_time']['hour'] }} : {{ $data['exam']['end_time']['minute'] }} : {{ $data['exam']['end_time']['second'] }} </span>
					</div>
					{{-- <div class="contain">
						<div class="key text-primary d-inline-block">Total Marks:</div>
						<div class="value text-primary d-inline-block"></div>
					</div>
					<div class="contain">
						<div class="key text-primary d-inline-block">Time Limit:</div>
						<div class="value text-primary d-inline-block">{{$data['exam']['time_limit']['hour']}}</div>
					</div> --}}
				</div>
				<div class="small-msg text-primary"> Your score will be mailed to you in a while. You can close the window </div>
				<div class="small-msg text-primary"> <a href=" {{env('APP_URL')}}/ "> Exam Home </a> </div>
			</div>
		</div>
	</div>
</div>