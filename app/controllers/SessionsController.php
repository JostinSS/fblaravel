<?php
session_start();

//use \Hybridauth;

class SessionsController extends BaseController
{

	public function create()
	{
		if (Auth::check())
		{
			return Auth::user();
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
			return View::make('users.index');
		}
		return View::make('users.create');
	}

	public function facebookLogin()
	{
		$config = [
			"base_url" => "http://justinlrl.com/login",

			"providers" => [
				"Facebook" => [
					"enabled" => true,
					"keys" => ["id" => "711756662273925",
							   "secret" => "b6d24c4baf873ca2f4406ea24a3d9214"
						      ],
					"scope" => "email",
							  ]
						   ]
		];

		$facebook = new Hybrid_Auth($config);	

		try 
		{
			$facebook->authenticate("Facebook");
			$user = $facebook->getUserProfile();
		}
		catch (Exception $ex) 
		{
			print $ex->getMessage();
		}
		
		return View::make('sessions.create')->with('user', $user);
			
	}
}
