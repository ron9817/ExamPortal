@extends('Mail.mail_base_layout')

@section('mail_content')


<div class="my-5 rounded mail_content_container bg-secondary logo-back py-2" style="background-image: url({{ asset('image/logo_em.jpg') }});">

	<div class="text-primary text-center my-3 msg">
		Your submission has been evaluated for <span class="highlight"> {{ $data['exam']['name'] }} </span>.
	</div>

	<div class="d-flex justify-content-center my-3">
		<div class="rounded bg-primary content_ p-3">

			<h3 class="text-center text-white font-weight-bold"> <span class="text-secondary">You have scored <i class="fa fa-envelope-open-o"></i></span> {{ $data['exam']['score'] }} / {{ $data['exam']['marks'] }} </h3>
			<h3 class="text-center text-white font-weight-bold"> <span class="text-secondary"> <i class="fa fa-trophy"></i> Your Rank is </span> {{ $data['exam']['rank'] }} </h3>

		</div>
	</div>

	<div class="text-primary text-center my-3 msg">
		Your score card is available at <span class="highlight"> <a href="{{ env( 'APP_URL' ) }}">  {{ env( 'APP_NAME' ) }}  </a> </span>
	</div>

</div>

@endsection