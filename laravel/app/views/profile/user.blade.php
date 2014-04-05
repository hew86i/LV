@extends('layout.main')

@section('content')

<hr>
	<h3>User profile for: <strong>{{$user->username}}</strong></h3><hr/>
	<p>{{ $user->email }}</p>
@stop