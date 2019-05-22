<?php

class TagihanController extends Controller
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
				'actions'=>array('viewTagihan','viewDetailTagihan','updateStatusPersetujuan'),
				'users'=>array('@'),
				'roles'=>array('admin','siswa'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','viewTagihan','viewDetailTagihan','createBarisTagihan','updateStatusPembayaran','createTagihan'),
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
	 */
	public function actionCreate()
	{
		$model=new Tagihan;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Tagihan']))
		{
			$model->attributes=$_POST['Tagihan'];
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

		if(isset($_POST['Tagihan']))
		{
			$model->attributes=$_POST['Tagihan'];
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
		/*
		$dataProvider=new CActiveDataProvider('Tagihan');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));*/
		$dataProvider = new CActiveDataProvider('Customer', array(
		    'criteria'=>array(
				'condition'=>'',
				'order'=>'nama ASC',
			),
			'pagination'=>array(
				'pageSize'=>15,
			),
		));	

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionViewTagihan($idSiswa)
	{
		$dataTagihan = new CActiveDataProvider('Tagihan', array(
		    'criteria'=>array(
				'condition'=>'Customer_User_id='.$idSiswa,
				'order'=>'bulan DESC',
			),
			'pagination'=>array(
				'pageSize'=>15,
			),
		));

		$this->render('tagihan',array(
			'dataTagihan'=>$dataTagihan, 'idSiswa'=>$idSiswa,
		));		
	}

	public function actionViewDetailTagihan($idTagihan, $idSiswa)
	{
		$dataTagihan = new CActiveDataProvider('Tagihan', array(
		    'criteria'=>array(
				'condition'=>'Customer_User_id='.$idSiswa,
				'order'=>'bulan DESC',
			),
			'pagination'=>array(
				'pageSize'=>15,
			),
		));

		$detailTagihan = new CActiveDataProvider('BarisTagihan', array(
		    'criteria'=>array(
				'condition'=>'Tagihan_id='.$idTagihan,
				'order'=>'date ASC',
			),
			'pagination'=>array(
				'pageSize'=>15,
			),
		));
		
		$this->render('tagihan',array(
			'dataTagihan'=>$dataTagihan, 'detailTagihan'=>$detailTagihan, 'idSiswa'=>$idSiswa, 'idTagihan'=>$idTagihan,
		));		
	}
	
	public function actionCreateBarisTagihan()
	{
	
		$idSiswa = $_POST['CreateBarisTagihanForm']['siswa_id'];
		$idTagihan = $_POST['CreateBarisTagihanForm']['Tagihan_id'];
		
		$model=new CreateBarisTagihanForm;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		//echo $_POST['CreateBarisTagihanForm']['siswa_id'];
		$model->date = date('Y-m-d');
		if(isset($_POST['CreateBarisTagihanForm']))
		{
			//if($_POST['BarisTagihan']['details'])
			$model->attributes=$_POST['CreateBarisTagihanForm'];
			$model->details=$_POST['CreateBarisTagihanForm']['details'];
			$model->createBarisTagihan();
		}
		/*
		$this->render('tagihan',array(
			'dataTagihan'=>$dataTagihan, 'detailTagihan'=>$detailTagihan, 'idSiswa'=>$idSiswa, 'idTagihan'=>$idTagihan, 'model'=>$model,
		));*/
		$this->redirect(array('viewDetailTagihan', 'idTagihan'=>$idTagihan, 'idSiswa'=>$idSiswa));
	}
	
	public function actionUpdateStatusPembayaran($idTagihan, $idSiswa)
	{
		$model = $this->loadModel($idTagihan);
		$status_pembayaran = $model->status_pembayaran;
		if($status_pembayaran==1)
			$model->status_pembayaran=0;
		else
			$model->status_pembayaran=1;
		$model->save();
		
		$this->redirect(array('viewDetailTagihan', 'idTagihan'=>$idTagihan, 'idSiswa'=>$idSiswa));
	}

	public function actionUpdateStatusPersetujuan($idTagihan, $idSiswa)
	{
		$model = $this->loadModel($idTagihan);
		$persetujuan = $model->persetujuan;
		if($persetujuan==1)
			$model->persetujuan=0;
		else
			$model->persetujuan=1;
		$model->save();
		
		$this->redirect(array('viewDetailTagihan', 'idTagihan'=>$idTagihan, 'idSiswa'=>$idSiswa));
	}
	
	public function actionCreateTagihan()
	{
	
		$idSiswa = $_POST['CreateTagihanForm']['Customer_User_id']; 
		
		$model=new CreateTagihanForm;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		//echo $_POST['CreateBarisTagihanForm']['siswa_id'];
		$model->persetujuan = 0;
		if(isset($_POST['CreateTagihanForm']))
		{
			$model->attributes=$_POST['CreateTagihanForm'];
			$model->createTagihan();
			$idTagihan=$model->id;
		}

		$this->redirect(array('viewDetailTagihan', 'idTagihan'=>$idTagihan, 'idSiswa'=>$idSiswa));
	}
	
	
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Tagihan('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Tagihan']))
			$model->attributes=$_GET['Tagihan'];

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
		$model=Tagihan::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='tagihan-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
