<div class="bg-secondary p-2 _nav">
	<div class="row no-gutters">
		<div class="col-3">
			<div class="logo-container w-100 align-self-center">
				<img class="logo m-auto d-block" src="{{ asset('image/logo.png') }}">
			</div>	
		</div>
		<div class="col d-flex flex-wrap align-content-center">
			<h1 class="project-title text-center w-100"> {{ env('APP_NAME') }}</h1>
		</div>
		<div class="col-3 d-flex flex-wrap align-content-center">
			<div class="d-block w-100">
				<div class="d-flex justify-content-center">
					<div class="profile_pic icon m-auto">
						@if( isset( $data["user_image"] ) )
							<img class="rounded-circle" src="{{asset('/image/'.$data['user_image'])}}" alt="Circle image">
						@else
							<i class="fa fa-user text-center text-primary"></i>
						@endif
					</div>
				</div>
				<div class="name text-center text-primary">{{ $data["user_name"] }}</div>
			</div>
		</div>
	</div>
</div>