<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	public $timestamps = false;

	protected $fillable = ['nickname', 'username', 'password'];
	
	public $rules = ['username' => 'required',
		   	         'nickname' => 'required',
			         'password' => 'required'
			        ];
	public $errors;
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function articles()
	{
		return $this->hasMany('Article');
	}


	public function isValid()
	{
		$validation = Validator::make($this->attributes, $this->rules);

		if ($validation->passes()) 
			{
				return true;
			}

		$this->errors = $validation->messages();

		return false;
	}
}
