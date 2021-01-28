@extends('Student.index')

@section('content')

@include( 'Student.layout.nav' )

@include( 'Student.layout.nav_button' )

<div class="p-relative">
	@include( 'Student.Exam.layout.instructions')
</div>

@endsection