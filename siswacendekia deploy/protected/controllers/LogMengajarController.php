<?php

class LogMengajarController extends Controller
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
				'actions'=>array('create','update','log'),
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
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionLog($jam_mulai = '', $jam_selesai = '', $customer = '', $hari= ''){

		$model = new LogMengajar();

		if(isset($_POST['LogMengajar'])) {
			$model->attributes=$_POST['LogMengajar'];
			$model->Pengajar_User_id = Yii::app()->user->id;
			if($customer == '') {
				$customer = $_POST['customer'];
			}
			$tanggal = split('-',$model->tanggal,3);
			$bulan = $tanggal[1];
			$tahun = $tanggal[0];
			$today = split('-', date('y-m-d'),3);
				if($model->save()) {
					$criteria = new CDbCriteria;
					$criteria->condition = 'Customer_User_id= '.$customer.' AND bulan= '.$bulan.' AND tahun= '.$tahun.'';
					$tagihan = Tagihan::model()->find($criteria);
					$id_pengajar = Yii::app()->user->id;
					if($tagihan){
						$criteria->condition = 'Customer_User_id= '.$customer;
						$criteria->order = 'id desc';
						$tagihan2 = Tagihan::model()->find($criteria);
							if( $tagihan2 && $tagihan2 == $tagihan ){
								$id_tagihan = $tagihan['id'];
								$barisTagihan = new BarisTagihan;
								$barisTagihan->Tagihan_id = $id_tagihan;
								$barisTagihan->date = $model->tanggal;
								$barisTagihan->biaya = 100000;
								$barisTagihan->status = 1;
								$pengajar = Pengajar::model()->find('User_id='.$id_pengajar);
								$barisTagihan->details = 'Tagihan atas Log '.$tanggal[2].'-'.$bulan.'-'.$tahun.' dari '.$pengajar['nama_lengkap'];
								if($barisTagihan->save()){
									$this->redirect(array('view', 'id'=> $model->id));
								}
							} else if($tagihan2 && ((int)$tagihan2['tahun'] > (int)$tagihan['tahun'])  || ((int)$tagihan2['bulan'] > (int)$tagihan['bulan'])){
								$id_tagihan = $tagihan2['id'];
								$barisTagihan = new BarisTagihan;
								$barisTagihan->Tagihan_id = $id_tagihan;
								$barisTagihan->date = date('y-m-d');
								$barisTagihan->biaya = 100000;
								$barisTagihan->status = 1;
								$pengajar = Pengajar::model()->find('User_id='.$id_pengajar);
								$barisTagihan->details = 'Tagihan atas Log '.$tanggal[2].'-'.$bulan.'-'.$tahun.' dari '.$pengajar['nama_lengkap'];
								if($barisTagihan->save()) {
									$this->redirect(array('view', 'id'=> $model->id));
								}
							}
					} else {
						$tagihan = new Tagihan;
						$tagihan->bulan = $bulan;
						$tagihan->tahun = $tahun;
						$tagihan->status_pembayaran = 0;
						$tagihan->persetujuan = 1;
						$tagihan->Customer_User_id = $customer;
						if($tagihan->save()) {
							$barisTagihan = new BarisTagihan;
							$barisTagihan->Tagihan_id = $tagihan->id;
							$barisTagihan->date = date('y-m-d');
							$barisTagihan->biaya = 100000;
							$barisTagihan->status = 1;
							$pengajar = Pengajar::model()->find('User_id='.$id_pengajar);
							$barisTagihan->details = 'Tagihan atas Log '.$tanggal[2].'-'.$bulan.'-'.$tahun.' dari '.$pengajar['nama_lengkap'];
							if($barisTagihan->save()) {
								$this->redirect(array('view', 'id'=> $model->id));
							}
						}
					}
				}
		}

		$this->render('create', array('model'=> $model, 'jam_mulai'=> $jam_mulai, 'jam_selesai'=> $jam_selesai, 'customer'=>$customer, 'hari'=> $hari));

	}	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$id = Yii::app()->user->id;
		$jadwal = new CActiveDataProvider('JadwalBelajarMengajar', array(
    			'criteria'=>array(
        			'condition'=>'Pengajar_User_id='.$id,
        			'order'=>'hari ASC',
    			),
    			'pagination'=>array(
        			'pageSize'=>20,
    			),
		));
		$jadwals = JadwalBelajarMengajar::model()->findAll('Pengajar_User_id='.$id);
		$listCust = array();
		$i=0;
		foreach($jadwals as $jdwl):
			$listCust[$i] = Customer::model()->find('User_id='.$jdwl['Customer_User_id']);
			$i++;
		endforeach;

		$this->render('lstjadwal', array('jadwal'=> $jadwal, 'listCust'=> $listCust));
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

		if(isset($_POST['LogMengajar']))
		{
			$model->attributes=$_POST['LogMengajar'];
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
		$id=Yii::app()->user->id;
		$dataProvider=new CActiveDataProvider('LogMengajar', array(
    			'criteria'=>array(
        			'condition'=>'Pengajar_User_id='.$id,
        			'order'=>'tanggal ASC',
    			),
    			'pagination'=>array(
        			'pageSize'=>7,
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
		$model=new LogMengajar('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['LogMengajar']))
			$model->attributes=$_GET['LogMengajar'];

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
		$model=LogMengajar::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='log-mengajar-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
