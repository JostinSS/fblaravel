<?php

class UsersController extends BaseController
{
	protected $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

	public function index()
	{
		$users = $this->user->all();

		return View::make('users/index')->with('users', $users);
	}

	public function store()
	{
		$input = Input::all();

		if (! $this->user->fill($input)->isValid())
		{
			return Redirect::back()->withInput()->withErrors($this->user->errors);
		}

		$this->user->save();

		return Redirect::route('users.index');
    }

	public function create()
	{
		return View::make('users/create');
	}
}
