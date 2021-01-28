@extends('Student.index')

@section('content')

@include( 'Student.layout.nav' )

@include( 'Student.layout.nav_button' )

@include( 'Student.Score.layout.exam_info' )

@include( 'Student.Score.layout.question_answer' )

@endsection