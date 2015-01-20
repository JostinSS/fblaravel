@extends('layouts.default')

@section('content')

	{{ Form::open(['route' => 'users.store']) }}

		<div>
			{{ Form::label('nickname', 'Nickname: ') }}
			{{ Form::input('text', 'nickname') }}			
			{{ $errors->first('nickname') }}
		<div>

		<div>
			{{ Form::label('username', 'Username: ') }}
			{{ Form::input('text', 'username') }}			
			{{ $errors->first('username') }}

		<div>
		
		<div>
			{{ Form::label('password', 'Password: ') }}
			{{ Form::password('password') }}			
			{{ $errors->first('password') }}
		</div>		

		<div>
			{{ Form::submit('Create user') }}
		</div>

	{{ Form::close() }}
	
@stop
