@extends('employee.layout')

@section('content')
    @include('employee.form', ['target' => 'update'])
@endsection
