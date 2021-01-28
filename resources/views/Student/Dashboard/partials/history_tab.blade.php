<div class="data_container">
	<div class="accordion m-2" id="accordionExam">
	    <div class="accordion-header btn-primary-background bg-primary d-flex justify-content-between" id="headingExam1" data-toggle="collapse" data-target="#submitted" aria-expanded="true" aria-controls="collapseOne">
	    	<div class="text-white p-2 font-bold"> Submitted </div>
	    	<button type="button" class="btn btn-primary no-border"> <i class="fa fa-arrow-down"></i> </button>
	    </div>

	    <div id="submitted" class="collapse show" aria-labelledby="headingExam1" data-parent="#accordionExam">
	    	@include( 'Student.Dashboard.partials.submitted' )
	    </div>

	    <div class="accordion-header btn-primary-background bg-primary d-flex justify-content-between mt-2" id="headingExam2" data-toggle="collapse" data-target="#not_submitted" aria-expanded="true" aria-controls="collapseTwo">
	    	<div class="text-white p-2 font-bold"> Unattempted </div>
	    	<button type="button" class="btn btn-primary no-border"> <i class="fa fa-arrow-down"></i> </button>
	    </div>

	    <div id="not_submitted" class="collapse" aria-labelledby="headingExam2" data-parent="#accordionExam">
	    	@include( 'Student.Dashboard.partials.not_submitted' )
	    </div>
	</div>
</div>