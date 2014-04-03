@extends('layout.main')

@section('content')
	@if(Auth::check())
		<h3>Hello, {{ Auth::user()->username }}.</h3>
	@else
		<h3>You are not sighned in.</h3>
	@endif
@stop