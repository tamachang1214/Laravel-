@extends('layouts.app')

@section('title', '社員登録')

@section('content')
    @include('employee.form', ['target' => 'store'])
@endsection