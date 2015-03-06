@extends('layout.main')

@section('content')
	@if(Auth::check())
		<p>Hello, {{ Auth::user()->username }} </p>
		<!-- redirect to home-map -->

	@else
		<a href="{{ URL::route('account-sign-in') }}">login</a>
		<a href="">Tell me more</a>
		<a href="{{ URL::route('account-create') }}">Sign me up!</a>

	@endif



@stop