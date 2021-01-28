<div class="row no-gutters bg-primary text-white py-3">
	<div class="col-md-2 col-3 d-flex align-items-center">
		
		<div class="w-100 d-flex justify-content-center ">
			<div>
				<div class="icon w-100">
					<i class="fa fa-clock m-auto d-block" style="width: 28px"></i>
				</div>
				<div class="value text-primary d-inline-block my-1" id="set_time_left">
					<span id="hours_left" class="d-inline-block time px-2 m-1 bg-secondary text-primary">  </span>:<span id="mins_left" class="d-inline-block time px-2 m-1 bg-secondary text-primary">  </span>:<span id="secs_left" class="d-inline-block time px-2 m-1 bg-secondary text-primary">  </span>
				</div>
			</div>
		</div>
		
	</div>
	<div class="col-md-8 col-7 exam">
		<div class="title"> {{$data["exam"]["name"]}} </div>
		<div class="desc"> {{$data["exam"]["description"]}} </div>
	</div>
	<div class="col-md-2 col-2 d-flex align-items-center">
		<div class="w-100">
			<div class="d-flex justify-content-center w-100">
				<div class="profile_pic icon m-auto">
					@if( isset( $data["user_image"] ) )
						<img class="rounded-circle" src="{{asset('/image/'.$data['user_image'])}}" alt="Circle image">
					@else
						<i class="fa fa-user text-center text-primary"></i>
					@endif
				</div>
			</div>
			<div class="name text-center"> {{ $data[ "user_name" ] }}</div>
		</div>
	</div>
</div>