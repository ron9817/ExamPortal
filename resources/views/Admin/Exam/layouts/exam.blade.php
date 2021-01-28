<div class="container">
	<div class="d-flex justify-content-end">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new_exam_modal">Create New Exam</button>
	</div>

	@include('Admin.Exam.partials.new_exam_modal')

	@foreach( $exams as $exam_key => $exam)
	<div class="row bg-light my-2 py-2">
		<div class="col">
			{{ $exam['name'] }}
		</div>
		<div class="col d-flex justify-content-center">
			@if( $exam['is_active'] )
			<div class="p-1 bg-success d-inline-block text-white">Active</div>
			@else
			<div class="p-1 bg-danger d-inline-block text-white">Inactive</div>
			@endif
		</div>
		<div class="col">
			<div class="d-flex justify-content-between">
				<button type="button" class="update btn btn-primary">Update</button>
				<button type="button" class="delete btn btn-danger">Delete</button>
				<button type="button" class="map btn btn-secondary">Map</button>
			</div>
		</div>
	</div>
	@endforeach

</div>