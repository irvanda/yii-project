<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class CreateUserForm extends CFormModel
{
	public $username;
	public $password;
	public $password2;
	public $role;
	public $id;
	public $avatar;
	
	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('username, password, password2, role', 'required'),
			//password must match with password2
			array('password', 'compare', 'compareAttribute'=>'password2'),
			// constraint
			array('username', 'length', 'max'=>25),
			array('password', 'length', 'max'=>8),
			array('avatar', 'file', 'types'=>'jpg, gif, png'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'password2'=>'Retype Password',
			'avatar'=>'Upload your photo',
		);
	}

	/**
	 * Create data user
	 */
	public function createUser()
	{
		$user = new User;
		$userhasrole =  new UserHasRole;
		
		$user->username = $this->username;
		$user->password = $this->password;
		if($user->save())
		{
			$this->id = $user->id;
			$userhasrole->User_id = $user->id;
			$userhasrole->Role_id = $this->role;
			if($userhasrole->save())
				return true;
			else
				return false;
		}
		else
			return false;
	}

}
