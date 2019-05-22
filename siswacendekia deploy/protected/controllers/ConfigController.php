<?php
class ConfigController extends Controller
{
	public function actionInitialize(){
		$auth = Yii::app()->authManager;
		$auth->clearAll();
		// Create our operations
		/*$auth->createOperation('createUser', 'Create a user');
		$auth->createOperation('editUser', 'Edit a user');
		$auth->createOperation('updateUserStatus', 'Update a user\'s status');
		$auth->createOperation('deleteUser', 'Delete a user');
		$auth->createOperation('purgeUser', 'Purge a user');
		
		// Create the moderator roles
		$role = $auth->createRole('userModerator', 'User with user moderation permissions');
		$role->addChild('updateUserStatus');

		// Create the admin roles
		$role = $auth->createRole('userAdmin', 'User with user administration permissions');
		$role->addChild('userModerator');
		$role->addChild('createUser');
		$role->addChild('editUser');*/
		$role = $auth->createRole('admin', 'User with user administration permissions');
		$role = $auth->createRole('siswa', 'siswa');
		$role = $auth->createRole('pengajar', 'pengajar');
	}
}
?>