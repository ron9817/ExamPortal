<div class="container-fluid my-2">
	<div class="filter_container my-1">
		@include( 'Student.Dashboard.partials.filter' )
	</div>
	<nav>
	  <div class="nav nav-pills nav-justified" id="nav-tab" role="tablist">
	    <a class="nav-item nav-link {{ $data['active'] == 1 ? 'active' : '' }}" id="nav-all-tab" data-toggle="tab" href="#nav-all" role="tab" aria-controls="nav-all" aria-selected="{{ $data['active'] == 1 ? 'true' : 'false' }}"> Upcoming Exams </a>
	    <a class="nav-item nav-link {{ $data['active'] == 2 ? 'active' : '' }}" id="nav-upcoming-tab" data-toggle="tab" href="#nav-upcoming" role="tab" aria-controls="nav-upcoming" aria-selected="{{ $data['active'] == 2 ? 'true' : 'false' }}"> Registered Exams </a>
	    <a class="nav-item nav-link {{ $data['active'] == 3 ? 'active' : '' }}" id="nav-your-tab" data-toggle="tab" href="#nav-your" role="tab" aria-controls="nav-your" aria-selected="{{ $data['active'] == 3 ? 'true' : 'false' }}"> History </a>
	  </div>
	</nav>
	<div class="tab-content" id="nav-tabContent">
	  <div class="tab-pane fade {{ $data['active'] == 1 ? 'show active' : '' }}" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
	  	@include( 'Student.Dashboard.partials.upcoming_tab' )
	  </div>
	  <div class="tab-pane fade {{ $data['active'] == 2 ? 'show active' : '' }}" id="nav-upcoming" role="tabpanel" aria-labelledby="nav-upcoming-tab">
	  	@include( 'Student.Dashboard.partials.registered_tab' )
	  </div>
	  <div class="tab-pane fade {{ $data['active'] == 3 ? 'show active' : '' }}" id="nav-your" role="tabpanel" aria-labelledby="nav-your-tab">
	  	@include( 'Student.Dashboard.partials.history_tab' )
	  </div>
	</div>
</div>