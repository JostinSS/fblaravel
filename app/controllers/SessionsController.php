<?php

class SessionsController extends BaseController
{
	public function create()
	{
		if (Auth::check())
		{
			return Redirect::back('users.index');
		}

		return View::make('sessions.create');
	}

	public function destroy()
	{
		Auth::logout();
	}

	public function store()
	{
		if (Auth::attempt(Input::only('username', 'password', 'password_confirmation')))
		{
			return Redirect::back();
		}

		return Redirect::back('sessions.create');
	}
}
