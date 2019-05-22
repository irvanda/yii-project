<?php

class JadwalBelajarMengajarController extends Controller
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
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','jadwal','daftarsiswa', 'viewJadwal'),
				'users'=>array('admin'),
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
	 */
	public function actionCreate()
	{
		$model=new JadwalBelajarMengajar;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['JadwalBelajarMengajar']))
		{
			$model->attributes=$_POST['JadwalBelajarMengajar'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['JadwalBelajarMengajar']))
		{
			$model->attributes=$_POST['JadwalBelajarMengajar'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
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
		$dataProvider=new CActiveDataProvider('JadwalBelajarMengajar');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	public function actionJadwal($id)
	{
		$jadwal = JadwalBelajarMengajar::model()->findAll('Customer_User_id=?', array($id));
		$this->render('index2',array(
			'jadwal'=>$jadwal,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new JadwalBelajarMengajar('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['JadwalBelajarMengajar']))
			$model->attributes=$_GET['JadwalBelajarMengajar'];

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
		$model=JadwalBelajarMengajar::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='jadwal-belajar-mengajar-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
		
	public function actionDaftarsiswa()
	{
		$dataProvider = new CActiveDataProvider('Customer', array(
		    'criteria'=>array(
				'condition'=>'',
				'order'=>'User_id DESC',
			),
			'pagination'=>array(
				'pageSize'=>20,
			),
		));	

		$this->render('daftar_siswa_jadwal',array(
			'dataProvider'=>$dataProvider,
		));		
	}
	
	public function actionViewJadwal($idSiswa)
	{
		$dataProvider = new CActiveDataProvider('JadwalBelajarMengajar', array(
		    'criteria'=>array(
				'condition'=>'Customer_User_id='.$idSiswa,
				'order'=>'hari DESC',
				'with'=>array('pengajarUser'),
			),
			'pagination'=>array(
				'pageSize'=>7,
			),
		));	

		$this->render('jadwal_siswa',array(
			'dataProvider'=>$dataProvider, 'idSiswa'=>$idSiswa,
		));
	}
	
	public function actionAssignTutor($idSiswa, $idJadwal)
	{
		$dataProvider = new CActiveDataProvider('JadwalBelajarMengajar', array(
		    'criteria'=>array(
				'condition'=>'Customer_User_id='.$idSiswa,
				'order'=>'hari DESC',
				'with'=>array('pengajarUser'),
			),
			'pagination'=>array(
				'pageSize'=>7,
			),
		));	
		
		$allTutor = new CActiveDataProvider('Pengajar', array(
			'pagination'=>array(
				'pageSize'=>7,
			),
		));	
		
		$suggestedTutor = new CActiveDataProvider('PengajarHasPelajaran', array(
		    'criteria'=>array(
				'condition'=>'Having Pelajaran_id ='.$idSiswa,
				'order'=>'hari DESC',
				'with'=>array('pengajarUser'),
			),
			'pagination'=>array(
				'pageSize'=>7,
			),
		));	
	
	}
}
