@extends('base_layout')

@section('content')

@include( 'Mail.partials.css' )

@include( 'Mail.layout.mail_header')

<div class="container">

	<div class="my-3">
		@include( 'Mail.partials.greetings' )	
	</div>
	@yield( 'mail_content' )
	<div class="my-1">
		@include( 'Mail.partials.footer' )	
	</div>
</div>

@endsection
