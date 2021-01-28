@extends('Mail.mail_base_layout')

@section('mail_content')

<div class="my-5 rounded mail_content_container bg-secondary logo-back py-2" style="background-image: url({{ asset('image/logo_em.jpg') }});">

	<div class="text-primary text-center my-3 msg">
		You have registered for <span class="highlight"> {{ $data['exam']['name'] }} </span> exam 
	</div>

	<div class="d-flex justify-content-center my-3">
		<div class="rounded bg-primary content_ p-3">

			<div class="text-center text-white d-inline">Exam details are as follows</div>
			
			<div class="contain my-2">
				<div class="name">
					{{-- <div class="key text-white d-inline-block"> <i class="fa fa-bookmark"></i></div> --}}
					<div class="value text-white d-inline-block">{{$data['exam']['name']}}</div>
				</div>
				@if( $data['exam']['description'] != "" )
				<div class="value text-white d-inline-block description mx-3">{{$data['exam']['description']}}</div>
				@endif
			</div>

			<div class="contain my-2">
				<div class="key text-white d-inline-block">Time Limit:</div>
				<div class="value text-white d-inline-block">
					<span class="d-inline-block time px-2 m-1">{{ $data['exam']['time_limit']['hour'] }}</span>:<span class="d-inline-block time px-2 m-1">{{ $data['exam']['time_limit']['minute'] }}</span>:<span class="d-inline-block time px-2 m-1"> {{ $data['exam']['time_limit']['second'] }}</span>
				</div>
			</div>
			<div class="contain my-2">
				<div class="key text-white d-inline-block">Starts <i class="fa fa-calendar"></i></div>
				<div class="value text-white d-inline-block"><span class="d-inline-block time px-2 m-1">{{ $data['exam']['start_time']['day'] }}</span>/<span class="d-inline-block time px-2 m-1">{{ $data['exam']['start_time']['month'] }}</span>/<span class="d-inline-block time px-2 m-1"> {{ $data['exam']['start_time']['year'] }} </span> <span class="d-inline-block time px-2 m-1">{{ $data['exam']['start_time']['hour'] }}</span>:<span class="d-inline-block time px-2 m-1">{{ $data['exam']['start_time']['minute'] }}</span>:<span class="d-inline-block time px-2 m-1"> {{ $data['exam']['start_time']['second'] }}</span></div>
			</div>
			<div class="contain my-2">
				<div class="key text-white d-inline-block">Ends <i class="fa fa-calendar"></i></div>
				<div class="value text-white d-inline-block"><span class="d-inline-block time px-2 m-1">{{ $data['exam']['end_time']['day'] }}</span>/<span class="d-inline-block time px-2 m-1">{{ $data['exam']['end_time']['month'] }}</span>/<span class="d-inline-block time px-2 m-1"> {{ $data['exam']['end_time']['year'] }} </span> <span class="d-inline-block time px-2 m-1">{{ $data['exam']['end_time']['hour'] }}</span>:<span class="d-inline-block time px-2 m-1">{{ $data['exam']['end_time']['minute'] }}</span>:<span class="d-inline-block time px-2 m-1"> {{ $data['exam']['end_time']['second'] }}</span></div>
			</div>

		</div>
	</div>

	<div class="text-primary text-center my-3 msg">
		Your exam will be available at <span class="highlight"> <a href="{{ env( 'APP_URL' ) }}"> {{ env( 'APP_NAME' ) }} </a> </span>
	</div>

</div>

@endsection
