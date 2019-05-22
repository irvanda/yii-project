<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{

	private $_id;
	private $_role;
	private $_status;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$username=strtolower($this->username);
		$user=User::model()->find('LOWER(username)=?',array($username));
		if($user===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if(!$user->validatePassword($this->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
			$auth = Yii::app()->authManager;
			
			$this->_id=$user->id;
			
			//get role
			$user_role = UserHasRole::model()->find('User_id=?',array($this->_id));
			$role = Role::model()->find('id=?',array($user_role->Role_id));
			$this->_role=$role->role;
			
			//get status
			if(!($this->_role=='admin'))
			{
				if($this->_role=='siswa')
					$accessing_user = Customer::model()->find('User_id=?',array($this->_id));
				else
					$accessing_user =Pengajar::model()->find('User_id=?',array($this->_id));
				
				$this->_status = $accessing_user->status;
			}
			
			Yii::app()->user->setState('role', $this->_role);
			
			$auth->clearAuthAssignments();
			if($this->_role=='admin'){
				$auth->assign('admin',$this->_id);
			}else if($this->_role=='siswa'){
				$auth->assign('siswa',$this->_id);
			}else{
				$auth->assign('pengajar',$this->_id);
			}
			
			Yii::app()->user->setState('status', $this->_status);
			$this->username=$user->username;
			$this->errorCode=self::ERROR_NONE;
		}
		return $this->errorCode==self::ERROR_NONE;
	}
	
	public function getId()
	{
		return $this->_id;
	}
	
	public function getRole()
	{
		return $this->_role;
	}
}