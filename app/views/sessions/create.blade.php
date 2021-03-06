@extends('layouts.default')

@section('content')


{{ Form::open(['route'=> 'sessions.store']) }}

	@if (!empty($user))
	{
		$user->displayName;
	}
	@endif
	<div>
		{{ Form::label('username', 'Username: ') }}
		{{ Form::text('username') }}
	</div>

	<div>
		{{ Form::label('password', 'Password: ') }}
		{{ Form::password('password') }}
	</div>
	
	<div>
		{{ link_to('login/auth', "Login with facebook") }}
	</div>

	<div>
		{{ Form::submit('Log In') }}
	</div>

{{ Form::close() }}

@stop
