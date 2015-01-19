@extends('layouts.default')

@section('content')

	@foreach ($users as $user)

		<li> {{link_to("/users/{$user->username}", $user->username)}}</li>
	
	@endforeach
@stop
