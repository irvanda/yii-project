<?php

class LaporanController extends Controller
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
				'actions'=>array('index','view','viewDaftarLaporanSiswa'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'laporan', 'viewDaftarLaporan','viewDaftarLaporanSiswa'),
				'users'=>array('@'),
				'roles'=>array('pengajar','admin'),
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
	public function actionViewDaftarLaporan($id)
	{
		$idPengajar = Yii::app()->user->id;
	
		$dataProvider = new CActiveDataProvider('Laporan', array(
			'criteria'=> array(
				'condition'=> 'Customer_User_id='.$id.' AND Pengajar_User_id='.$idPengajar,
				'order'=> 'date DESC',
			),
			'pagination'=> array(
				'pageSize'=> 5,
			),			
		));
		
		$this->render('view_daftar_laporan',array(
			'dataProvider'=>$dataProvider, 'idCustomer'=>$id,
		));
	}

	public function actionViewDaftarLaporanSiswa($id)
	{
		$dataProvider = new CActiveDataProvider('Laporan', array(
			'criteria'=> array(
				'condition'=> 'Customer_User_id='.$id,
				'order'=> 'date DESC',
			),
			'pagination'=> array(
				'pageSize'=> 5,
			),			
		));
		
		$this->render('view_daftar_laporan',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	public function actionView($id){
		$model = $this->loadModel($id);
		$this->render('view',array(
			'model'=>$model,
		));
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate(){
		$idPengajar = Yii::app()->user->id;
		$model = new Laporan;
		
		$this->performAjaxValidation($model);
		if(isset($_POST['Laporan']))
		{
		
			$model->attributes = $_POST['Laporan'];	
			$model->Pengajar_User_id = $idPengajar;
			$model->date = date('Y-m-d');
			
			if($model->validate() && $model->save()){
				$this->redirect(array('viewDaftarLaporan', 'id'=>$model->Customer_User_id));
			}
		}
		$sql = 'SELECT DISTINCT Customer_User_id, nama FROM bsc.jadwal_belajar_mengajar j, customer where Pengajar_User_id='.$idPengajar.' and User_id=Customer_User_id';
		$connection=Yii::app()->db;
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();
		
		//echo $model->Customer_User_id;
		$this->render('create',array('model'=>$model, 'daftar_customer'=>$rows));
	}

	/**
	 * Creates a new laporan.
	 * @param integer $customer the ID of the customer to report.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionLaporan()
	{
		$model=new Laporan;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Laporan']))
		{
			$model->attributes=$_POST['Laporan'];
			$model->Customer_User_id = $customer;
			$model->Pengajar_User_id = Yii::app()->user->id;
			$model->date = date('y-m-d');
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
		if(Yii::app()->user->checkAccess('admin') || Yii::app()->user->id==$model->Pengajar_User_id){	
			// Uncomment the following line if AJAX validation is needed
			$this->performAjaxValidation($model);

			if(isset($_POST['Laporan']))
			{
				$model->attributes=$_POST['Laporan'];
				if($model->save())
					$this->redirect(array('viewDaftarLaporan','id'=>$model->Customer_User_id));
			}
			echo $model->Customer_User_id;
			$this->render('update',array(
				'model'=>$model,
			));
		}else{
			$this->render('update',array(
				'notif'=>'you are not authorized',
			));
		}
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
		//$dataProvider=new CActiveDataProvider('Laporan');
		$model = new Laporan;
		$id = Yii::app()->user->id;
		$sql = 'SELECT DISTINCT Customer_User_id, nama, alamat_rumah, no_hp FROM bsc.jadwal_belajar_mengajar j, customer where Pengajar_User_id='.$id.' and User_id=Customer_User_id';
		$dataProvider = new CSqlDataProvider($sql, array(
			'pagination'=>array(
			'pageSize'=>10,
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
		$model=new Laporan('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Laporan']))
			$model->attributes=$_GET['Laporan'];

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
		$model=Laporan::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='laporan-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
}
