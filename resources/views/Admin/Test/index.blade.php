@extends('Admin.admin_base_layout')

@section('content')

	@include( 'Admin.partials.error' )

    @include('Admin.layouts.nav')

    @include('Admin.admin-navbar')
    

    <div id="admin-window" style="font-family: 'Poppins', sans-serif;">

    	@include('Admin.Test.layouts.header')
    	

	    @include('Admin.Test.layouts.questions')

	</div> 
@endsection

@push( 'page_js' )
	{{--<script type="text/javascript" src="{{asset('/js/test_stu_que.js')}}"></script>--}}
	<script>
		$(document).ready( _=>{
			$( document ).on( 'click', '.optn_input', function(){
				$( this ).siblings( ".optn_text" ).toggleClass( "border-danger" ).toggleClass( "bg-success" );
			} )
		});
	</script>
@endpush

@push( 'page_css' )
<style>
	.c-body input{

		background-image: linear-gradient(145deg, #7F7FD5, #86A8E7)!important;

	}
	.schedule{
		background-size: cover;
		background-repeat: no-repeat;
	}
	.op-dull{
		opacity:0.7;
	}
	.bg-primary{
		background: #3977de!important;
	}
	.nav .nav-item .nav-link.active{
		background: #3977de;
		border-radius: 1rem 1rem 0 0;
		color: #ffffff;
		font-weight: 800;
	}	
</style>


@endpush