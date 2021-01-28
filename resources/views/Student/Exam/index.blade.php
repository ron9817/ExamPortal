@extends('Student.index')

@section('content')

@include( 'Student.Exam.layout.exam_info' )
@include( 'Student.Exam.layout.question_answer' )

@endsection