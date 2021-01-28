@extends('base_layout')

@section('title')

{{ isset($data['title']) ? $data['title'] : 'Student' }}

@endsection