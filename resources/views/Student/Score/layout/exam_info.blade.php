<div class="row no-gutters bg-primary text-white py-3">
	<div class="col-md-2 col-2 d-flex align-items-center">
		<div class="w-100 score">
			<div class="text-white heading text-center">Rank</div>
			<div class="text-center text-white font-weight-bold value"> {{$data['exam']['rank']}} </div>
		</div>
	</div>
	<div class="col-md-8 col-7 exam">
		<div class="title"> {{ $data['exam']['name'] }} </div>
		<div class="desc"> {{ $data['exam']['description'] }} </div>
	</div>
	<div class="col-md-2 col-2 d-flex align-items-center">
		<div class="w-100 score">
			<div class="text-white heading text-center">Score</div>
			<div class="text-center text-white font-weight-bold value" > {{ $data['exam']['score'] }} / {{ $data['exam']['marks'] }} </div>
		</div>
	</div>
</div>