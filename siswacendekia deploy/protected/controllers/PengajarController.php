<?php

class PengajarController extends Controller
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
				'actions'=>array('index','view','register'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
				'roles'=>array('pengajar', 'admin'),
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
		$pengajar=$this->loadModel($id);
		$pelajaranid = PengajarHasPelajaran::model()->findAll('Pengajar_User_id=?', array($id));

		$pelajaran = '';
		foreach($pelajaranid as $mapelid)
		{
			$temp = Pelajaran::model()->findByPk($mapelid->Pelajaran_id);
			$pelajaran=$pelajaran.'; '.$temp->nama_pelajaran;
		}
		 
		$this->render('view',array(
			'model'=>$pengajar, 'pelajaran'=>$pelajaran,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new PengajarRegForm;
		
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='pengajar-registration-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['PengajarRegForm']))
		{
			$model->attributes=$_POST['PengajarRegForm'];
			$model->status=$_POST['PengajarRegForm']['status'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->createPengajar())
				$this->redirect(array('view','id'=>$model->User_id));
		}
		// display the login form
		$this->render('create_pengajar',array('model'=>$model));
	}

	public function actionRegister()
	{	
		$model=new PengajarRegForm;
		$image = new Image();
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='pengajar-registration-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['PengajarRegForm']))
		{
			$model->attributes=$_POST['PengajarRegForm'];

			$model->alamat_kost = $_POST['PengajarRegForm']['alamat_kost'];
			$model->tanggal_lahir= $_POST['PengajarRegForm']['tanggal_lahir'];
			$model->kemampuan_bahasa= $_POST['PengajarRegForm']['kemampuan_bahasa'];
			$model->hobby= $_POST['PengajarRegForm']['hobby'];
			$model->cita_cita= $_POST['PengajarRegForm']['cita_cita'];
			$model->karakter= $_POST['PengajarRegForm']['karakter'];
			
			$model->avatar=$_POST['PengajarRegForm']['avatar'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->createPengajar())
			{	
				$model->avatar=CUploadedFile::getInstance($model,'avatar');
				if($model->avatar->saveAs(Yii::app()->basePath .'/../images/'.$model->avatar))
				{
					$image->User_ID = $model->User_id;
					$image->image = $model->avatar;
					if($image->save())
						$this->redirect(array('view','id'=>$model->User_id));
				}
			}
		}
		// display the login form
		$this->render('registration',array('model'=>$model));
	}
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		
		//form model to gather data
		$updatePengajar = new UpdatePengajarForm;
		$updatePengajar->User_id = $id;
		//data pelajaran
		$pelajarans = PengajarHasPelajaran::model()->findAll('Pengajar_User_id=?',array($id));
		$temp = array();
		$i=0;
		foreach($pelajarans as $data){
			$temp[$i]=$data->Pelajaran_id;
			$data->delete();
			$i++;
		}
				
		//populate data
		$updatePengajar->attributes = $model->attributes;
		
		if(!($temp==null))
			$updatePengajar->Pelajaran_id = $temp;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='pengajar-update-form')
		{
			echo CActiveForm::validate($updatePengajar);
			Yii::app()->end();
		}
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['UpdatePengajarForm']))
		{
			$updatePengajar->attributes=$_POST['UpdatePengajarForm'];
			if($updatePengajar->validate()){
				$model->attributes=$_POST['UpdatePengajarForm'];

				if($model->save())
				{
					$pelajaran = array();
					$i = 0;
					foreach($updatePengajar->Pelajaran_id as $pelajaranid)
					{
						$pelajaran[i] = new PengajarHasPelajaran;
						$pelajaran[i]->Pelajaran_id = $pelajaranid;
						$pelajaran[i]->Pengajar_User_id = $id;
						$pelajaran[i]->save();
						$i++;
					}
					
					$this->redirect(array('view','id'=>$model->User_id));
				}
			}
		}
		$this->render('update',array(
			'model'=>$updatePengajar,
		));
	}

	public function actionUpdateAccount($id)
	{
		$model = User::model()->findByPk($id);
		$updateUser = new CreateUserForm;
		$updateUser->attributes = $model->attributes;
		$updateUser->username = $model->username;
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
		$dataProvider=new CActiveDataProvider('Pengajar');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Pengajar('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pengajar']))
			$model->attributes=$_GET['Pengajar'];

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
		$model=Pengajar::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='pengajar-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
