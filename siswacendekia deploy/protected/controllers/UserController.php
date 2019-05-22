<?php

class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','viewProfil'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','createuser'),
				'users'=>array('admin'),
				'roles'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * -->previous function, name altered so the previous name can be used
	 */
	public function actionCreateuser()
	{
		$model=new User;
		$userhasrole=  new UserHasRole;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']) && isset($_POST['UserHasRole']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
			{
				$userhasrole->attributes=$_POST['UserHasRole'];
				$userhasrole->User_id=$model->id;
				
				if($userhasrole->save())
					$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model, 'userhasrole'=>$userhasrole,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * the new function, name is named as the previous one
	 */
	public function actionCreate()
	{
		$model = new CreateUserForm();
		$image = new Image();
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='create-user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['CreateUserForm']))
		{
			$model->attributes=$_POST['CreateUserForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->createUser())
			{
				$model->avatar=CUploadedFile::getInstance($model,'avatar');
				if(!($model->avatar==null)){
					if($model->avatar->saveAs(Yii::app()->basePath .'/../images/'.$model->avatar))
					{
						$image->User_ID = $model->id;
						$image->image = $model->avatar;
						if($image->save())
							$this->redirect(array('view','id'=>$model->id));
					}
				}
			}
		}       
			
		// display the login form
		$this->render('createuser',array('model'=>$model));
	}
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$updateUser = new CreateUserForm;
		$updateUser->attributes = $model->attributes;
		$user_photo = Image::model()->find('User_ID=?',array($id));
		
		if($user_photo==null)
		{
			$user_photo= new Image;
			$user_photo->User_ID = $id;
		}
		
		$updateUser->avatar = $user_photo->image;
		$role = UserHasRole::model()->find('User_id=?',array($id));
		$updateUser->role = $role->Role_id;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['ajax']) && $_POST['ajax']==='create-user-form')
		{
			echo CActiveForm::validate($updateUser);
			Yii::app()->end();
		}
		
		if(isset($_POST['CreateUserForm']))
		{
			$updateUser->attributes=$_POST['CreateUserForm'];
			$model->attributes = $updateUser->attributes;
			$role->Role_id = $updateUser->role;
			
			$updateUser->avatar = CUploadedFile::getInstance($updateUser,'avatar');
			if($model->save() && $role->save())
				if(!($updateUser->avatar==null)){
					if($updateUser->avatar->saveAs(Yii::app()->basePath .'/../images/'.$updateUser->avatar))
					{
						$user_photo->image = $updateUser->avatar;
						$user_photo->save();
						$this->redirect(array('view','id'=>$model->id));
					}
				}
		}

		$this->render('update',array(
			'model'=>$updateUser,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionViewProfil($id)
	{
		$this->render('view_profil',array(
			'model'=>$this->loadModel($id),
		));
	}
}
