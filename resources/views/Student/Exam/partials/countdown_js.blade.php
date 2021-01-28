<div class="d-none" id="time_left_data" data-hour="{{ $data['exam']['time_limit']['hour'] }}" data-minute="{{ $data['exam']['time_limit']['minute'] }}" data-second="{{ $data['exam']['time_limit']['second'] }}">
	
</div>
@push( 'page_js' )
<script>
	$(document).ready(_=>{
		@if( isset( $data['exam'] ) and isset( $data['started_at'] ) )

			const time_left_selector = "#time_left_data";
			const time_limit = [
				$( time_left_selector ).data("hour"),
				$( time_left_selector ).data("minute"),
				$( time_left_selector ).data("second"),
			];
			const started_at = new Date("{{ $data['started_at'] }}");
			let time_left = calculate_time_left( time_limit, started_at );
			var interval = setInterval( 
				function(){
					if( time_left == 0 ){
						exam_ended( interval );
						// $( _time_left + ' ' + _secs_left ).text( '00' );
						return;
					}
					time_left = _countdown( time_left );
				}
				, 1000
			);

		@endif
	});
</script>
@endpush