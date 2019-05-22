<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />

	<!--javascript-->
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/javascript/jquery-1.4.4.js" /></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/javascript/general.js" /></script>
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
		<div id="sublogo">private course</div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php 
		$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				//general menu
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Pendaftaran Siswa', 'url'=>array('customer/register'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Pendaftaran Pengajar', 'url'=>array('pengajar/register'), 'visible'=>Yii::app()->user->isGuest),
				//customer menu
				array('label'=>'Tagihan', 'url'=>array('/tagihan/viewTagihan&idSiswa='.Yii::app()->user->id), 'visible'=>(Yii::app()->user->getState('role')=='siswa' && Yii::app()->user->getState('status')=='diterima')),
				array('label'=>'Jadwal Belajar', 'url'=>array('/jadwalBelajarMengajar/index'), 'visible'=>(Yii::app()->user->getState('role')=='siswa' && Yii::app()->user->getState('status')=='diterima')),
				array('label'=>'Feedback', 'url'=>array('/feedback/index'), 'visible'=>(Yii::app()->user->getState('role')=='siswa' && Yii::app()->user->getState('status')=='diterima')),
				array('label'=>'Laporan Belajar', 'url'=>array('/laporan/viewDaftarLaporanSiswa&id='.Yii::app()->user->id), 'visible'=>(Yii::app()->user->getState('role')=='siswa' && Yii::app()->user->getState('status')=='diterima')),
				//pengajar menu
				array('label'=>'Jadwal Mengajar', 'url'=>array('/jadwalMengajar/index'), 'visible'=>(Yii::app()->user->getState('role')=='pengajar' && Yii::app()->user->getState('status')=='diterima')),
				array('label'=>'Log', 'url'=>array('/logMengajar/index'), 'visible'=>(Yii::app()->user->getState('role')=='pengajar' && Yii::app()->user->getState('status')=='diterima')),
				array('label'=>'Mengisi Laporan', 'url'=>array('/laporan/index'), 'visible'=>(Yii::app()->user->getState('role')=='pengajar' && Yii::app()->user->getState('status')=='diterima')),
				//admin menu
				array('label'=>'User', 'url'=>array('/user/index'), 'visible'=>(Yii::app()->user->getState('role')=='admin')),
				array('label'=>'Siswa', 'url'=>array('/customer/index'), 'visible'=>(Yii::app()->user->getState('role')=='admin')),
				array('label'=>'Pengajar', 'url'=>array('/pengajar/index'), 'visible'=>(Yii::app()->user->getState('role')=='admin')),
				array('label'=>'Alokasi Jadwal', 'url'=>array('/jadwalBelajarMengajar/daftarsiswa'), 'visible'=>(Yii::app()->user->getState('role')=='admin')),
				array('label'=>'Tagihan', 'url'=>array('/tagihan/index'), 'visible'=>(Yii::app()->user->getState('role')=='admin')),
				array('label'=>'Informasi', 'url'=>array('/informasi/index'), 'visible'=>(Yii::app()->user->getState('role')=='admin')),
				array('label'=>'Paket', 'url'=>array('/program/index'), 'visible'=>(Yii::app()->user->getState('role')=='admin')),
				array('label'=>'Feedback', 'url'=>array('/feedback/index'), 'visible'=>(Yii::app()->user->getState('role')=='admin')),
				//general menu
				array('label'=>'Informasi', 'url'=>array('/informasi/index'), 'visible'=>(Yii::app()->user->isGuest)),
				(Yii::app()->user->getState('role')=='admin')?
					array('label'=>'Edit Profil', 'url'=>array('/user/viewProfil&id='.Yii::app()->user->id), 'visible'=>!Yii::app()->user->isGuest)
					:((Yii::app()->user->getState('role')=='siswa')?
						array('label'=>'Edit Profil', 'url'=>array('/customer/view&id='.Yii::app()->user->id), 'visible'=>!Yii::app()->user->isGuest)
						:array('label'=>'Edit Profil', 'url'=>array('/pengajar/view&id='.Yii::app()->user->id), 'visible'=>!Yii::app()->user->isGuest)
				),
				//coba menu
				//array('label'=>'Auth Manager', 'url'=>array('/informasi/coba'), 'visible'=>Yii::app()->user->checkAccess('admin')),
			),
		)); ?>
	</div><!-- mainmenu -->

	<?php echo $content; ?>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>