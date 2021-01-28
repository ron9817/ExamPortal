@extends('Admin.admin_base_layout')

@section('content')

    @include('Admin.layouts.nav')
    @include('Admin.admin-navbar')
    @include('Admin.dashboard-head')
    @include('Admin.dashboard')    

@endsection
