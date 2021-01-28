@if (session('error'))
	<script>
		alert_swal( '{{ session('error') }}' );
	</script>
@endif

@if ($errors->any())
	<script>
		alert_swal( '{{ $errors }}' );
	</script>
@endif

@if ( isset( $data["error"] ) and $data["error"] == 1 )
	<script>
		alert_swal( '{{ $data["msg"] ? $data["msg"] : "Error Occured" }}' );
	</script>
@endif