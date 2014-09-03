@extends('layout.main')

@section('content')

<p>User profile for {{ e($user->username) }}.</p>

@stop