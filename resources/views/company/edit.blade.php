@extends('layouts.app')

@section('content')
    @include('company.form', ['target' => 'update'])
@endsection
