@extends('layouts.app')


@section('content')
    @include('employee.form', ['target' => 'update'])
@endsection
