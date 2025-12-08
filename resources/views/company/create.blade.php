@extends('layouts.app')

@section('title', '会社登録')

@section('content')
    @include('company.form', ['target' => 'store'])
@endsection
