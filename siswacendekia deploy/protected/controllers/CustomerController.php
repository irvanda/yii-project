<?php

class CustomerController extends Controller
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
				'actions'=>array('index','view', 'register'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
				'roles'=>array('siswa', 'admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
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
		$siswa = $this->loadModel($id);
		$orangtua = Orangtua::model()->findByPk($siswa->orangtua_id);
		$pelajaranid = PelajaranHasCustomer::model()->findAll('Customer_User_id=?', array($id));
		$programid = ProgramHasCustomer::model()->findAll('Customer_User_id=?', array($id));
		$program = Program::model()->findByPk($programid);
		
		$pelajaran = '';
		 foreach($pelajaranid as $mapelid)
		 {
			$temp = Pelajaran::model()->findByPk($mapelid->Pelajaran_id);
			$pelajaran=$pelajaran.'; '.$temp->nama_pelajaran;
		 }
 
		$this->render('view',array(
			'model'=>$siswa, 'orangtua'=>$orangtua, 'pelajaran'=>$pelajaran, 'program'=>$program,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new CustRegForm;
		
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='customer-registration-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['CustRegForm']))
		{
			$model->attributes=$_POST['CustRegForm'];
			$model->status=$_POST['CustRegForm']['status'];
			$model->avatar=$_POST['CustRegForm']['avatar'];
			
			$model->avatar=CUploadedFile::getInstance($model,'avatar');
			
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->createCustomer())
				if($model->avatar->saveAs(Yii::app()->basePath .'/../images/'.$model->avatar))
				{
					$image->User_ID = $model->User_id;
					$image->image = $model->avatar;
					$image->save();
					$this->redirect(array('view','id'=>$model->User_id));
				}
		}
		// display the login form
		$this->render('create_customer',array('model'=>$model));
	}

	public function actionUpdate($id)
	{
		//load customer data
		$model=$this->loadModel($id);
		$updateCust = new UpdateCustForm;
		$updateCust->attributes = $model->attributes;
		$updateCust->status = $model->status;
		$updateCust->User_id=$id;
		
		//load orangtua data
		$orangtua = Orangtua::model()->find('id=?', array($model->orangtua_id));
		$updateCust->attributes = $orangtua->attributes;
			
		//pelajaran data
		$pelajarans = PelajaranHasCustomer::model()->findAll('Customer_User_id=?',array($id));
		$temp = array();
		$i=0;
		foreach($pelajarans as $data){
			$temp[$i]=$data->Pelajaran_id;
			$i++;
		}
		$updateCust->Pelajaran_id = $temp;

		//program data
		$program = ProgramHasCustomer::model()->find('Customer_User_id=?',array($id));
		if($program==null)
		{
			$program = new ProgramHasCustomer;
			$program->Customer_User_id = $id;
		}
		else{
			$updateCust->Program_id = $program->Program_id;
		}
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='customer-update-form')
		{
			echo CActiveForm::validate($updateCustomer);
			Yii::app()->end();
		}
		
		if(isset($_POST['UpdateCustForm']))
		{
			$updateCust->attributes = $_POST['UpdateCustForm'];
			if($updateCust->validate()){
				$model->attributes=$_POST['UpdateCustForm'];
				//$model->status=$_POST['CustRegForm']['status'];
				$orangtua->attributes=$_POST['UpdateCustForm'];

				if($model->save() && $orangtua->save()){
					$program->Program_id = $updateCust->Program_id;
					$program->save();
					
					$pelajaran = array();
					$i = 0;
					if(!($updateCust->Pelajaran_id==null)){
						foreach($pelajarans as $data){
							$data->delete();
						}
						foreach($updateCust->Pelajaran_id as $pelajaranid)
						{
							$pelajaran[i] = new PelajaranHasCustomer;
							$pelajaran[i]->Pelajaran_id = $pelajaranid;
							$pelajaran[i]->Customer_User_id = $id;
							$pelajaran[i]->save();
							$i++;
						}
					}
					
					$this->redirect(array('view','id'=>$model->User_id));
				}
			}
		}

		$this->render('update',array(
			'model'=>$updateCust,
		));
	}
	
	public function actionUpdateAccount($id)
	{
		$model = User::model()->findByPk($id);
		$updateUser = new CreateUserForm;
		$updateUser->attributes = $model->attributes;
		$updateUser->id=$model->id;
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
				if($updateUser->avatar->saveAs(Yii::app()->basePath .'/../images/'.$updateUser->avatar))
				{
					$user_photo->image = $updateUser->avatar;
					$user_photo->save();
					$this->redirect(array('view','id'=>$model->id));
				}
		}

		$this->render('update_account',array(
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
		$dataProvider=new CActiveDataProvider('Customer', array(
			'criteria'=>array(
				'order'=>'User_id DESC',
			),
		));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Customer('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Customer']))
			$model->attributes=$_GET['Customer'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionRegister()
	{	
		$model=new CustRegForm;
		$image = new Image();
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='customer-registration-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['CustRegForm']))
		{
			$model->attributes=$_POST['CustRegForm'];
			$model->avatar=$_POST['CustRegForm']['avatar'];
			
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->createCustomer())
			{
				$model->avatar=CUploadedFile::getInstance($model,'avatar');
				//echo Yii::app()->basePath .'/../images/'.$model->avatar;
				if(!($model->avatar==null)){
					
					if($model->avatar->saveAs(Yii::app()->basePath .'/../images/'.$model->avatar))
					{
						//echo "masuk";
						$image->User_ID = $model->User_id;
						$image->image = $model->avatar;
						if($image->save())
							;
					}
				}
				$this->redirect(array('view','id'=>$model->User_id));
			}
		}
		// display the login form
		$this->render('registration',array('model'=>$model));
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Customer::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='customer-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
