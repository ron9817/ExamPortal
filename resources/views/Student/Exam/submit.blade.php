@extends('Student.index')

@section('content')

@include( 'Student.layout.nav' )

<div class="p-relative">
	@include( 'Student.Exam.layout.submit')
</div>

@endsection