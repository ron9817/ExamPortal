<div class="data_button_container">
	<a class="btn-primary-background bg-primary data_button d-inline-block" href="javascript:void(0);">
		<span class="px-3 d-inline-block filter-text w-auto"> Filter </span>
		<button type="button" class="btn btn-secondary py-1" data-toggle="collapse" data-target="#filter-collapse" aria-expanded="false" aria-controls="filter-collapse"> <i class="fa fa-angle-down"></i> </button>
	</a>
</div>
<div class="p-relative">
	<div class="p-left-absolute collapse bg-primary-dark rounded z-index-up p-1 filter filter_collapse" id="filter-collapse">
		<form action="{{env('APP_URL')}}" method="GET">
			<div class="data_button_container my-1">
				<div class="p-1 bg-secondary data_button d-inline-block w-100">
					<span class="btn pointer-cursor btn-secondary py-0 text-primary filter-text"> Name </span>
					<span class="d-inline-block full-width"> <input type="text" name="q" value="{{$data['filter']['q']}}" class="filter-text-input form-control "> </span>
				</div>
			</div>
			<div class="data_button_container my-1">
				<div class="p-1 bg-secondary data_button d-inline-block w-100">
					<span class="btn pointer-cursor btn-secondary py-0 text-primary filter-text"> Time Limit Between </span>
					<span class="d-inline-block half-width"> <input type="datetime-local" name="tl1" value="{{$data['filter']['tl1']}}" class="filter-text-input form-control text-primary"> </span>
					<span class="d-inline-block filter-text text-primary text-center filter-to-text"> to </span>
					<span class="d-inline-block half-width"> <input type="datetime-local" name="tl2" value="{{$data['filter']['tl2']}}" class="filter-text-input form-control text-primary"> </span>
				</div>
			</div>
			<div class="data_button_container my-1">
				<div class="p-1 bg-secondary data_button d-inline-block w-100">
					<span class="btn pointer-cursor btn-secondary py-0 text-primary filter-text"> Start Date Between </span>
					<span class="d-inline-block half-width"> <input type="datetime-local" name="s1" value="{{$data['filter']['s1']}}" class="filter-text-input form-control text-primary"> </span>
					<span class="d-inline-block filter-text text-primary text-center filter-to-text"> to </span>
					<span class="d-inline-block  half-width"> <input type="datetime-local" name="s2" value="{{$data['filter']['s2']}}" class="filter-text-input form-control text-primary"> </span>
				</div>
			</div>
			<div class="data_button_container my-1">
				<div class="p-1 bg-secondary data_button d-inline-block w-100">
					<span class="btn pointer-cursor btn-secondary py-0 px-3 text-primary filter-text"> End Date Between </span>
					<span class="d-inline-block half-width"> <input type="datetime-local" name="e1" value="{{$data['filter']['e1']}}" class="filter-text-input form-control text-primary"> </span>
					<span class="d-inline-block filter-text text-primary text-center filter-to-text"> to </span>
					<span class="d-inline-block half-width"> <input type="datetime-local" name="e2" value="{{$data['filter']['e2']}}" class="filter-text-input form-control text-primary"> </span>
				</div>
			</div>
			<div class="d-flex justify-content-between">
				<div class="data_button_container my-1 filter_button">
					<div class="p-1 bg-secondary data_button d-inline-block">
						<span class="btn pointer-cursor py-0 px-2 text-primary"> Filter </span>
						<button type="submit" class="btn btn-primary py-0 interactive text-white filter_no_collapse" name="f" value="1"> <i class="fa fa-arrow-right"></i> </button>
					</div>
				</div>
				<div class="data_button_container my-1 filter_button">
					<div class="p-1 bg-secondary data_button d-inline-block">
						<span class="btn pointer-cursor py-0 px-2 text-primary"> Clear Filter </span>
						<button type="submit" class="btn btn-primary py-0 interactive text-white filter_no_collapse" name="c" value="1"> <i class="fa fa-times"></i> </button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

@push( 'page_js' )

<script>
	$( document ).ready( _ => {
		$( document ).on( "click", function( event ){
			$('#filter-collapse').collapse('hide');
		} );
		$( document ).on( "click", ".filter_collapse", function( event ){
			if( !$(event.target).hasClass("filter_no_collapse") )
				return false;
		});
		$( document ).on( "click", ".filter-text-input", function( event ){
			if( !$(event.target).hasClass("filter_no_collapse") )
				return false;
		});
	});
</script>

@endpush