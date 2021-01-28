@extends('base_layout')

@section('title')

Admin {{ isset($title) ? " | ".$title: '' }}

@endsection

@push('page_css')

	<link href="{{asset('/css/admin-dashboard.css')}}" rel="stylesheet">
	<link href="{{asset('/css/admin-dashboard-body.css')}}" rel="stylesheet">

	<!-- For Admin Side Navbar -->
    <link href="{{asset('/css/sidebar.css')}}" rel="stylesheet"> 
	<!-- For Admin Body base-layout -->
	<link href="{{asset('/css/admin-body-base-layout.css')}}" rel="stylesheet">
	<!-- For Admin Dashboard -->
	<link href="{{asset('/css/admin-dashboard.css')}}" rel="stylesheet">
	
@endpush

@push('page_js')
	<script type="text/javascript" src="{{asset('/js/admin-dashboard-body.js')}}"></script>
@endpush