<?php
$this->breadcrumbs=array(
	'Pengajars'=>array('index'),
	$model->User_id,
);

$this->menu=
(Yii::app()->user->getState('role')=='admin')?array(
	
	array('label'=>'List Pengajar', 'url'=>array('index')),
	array('label'=>'Create Pengajar', 'url'=>array('create')),
	array('label'=>'Update Pengajar', 'url'=>array('update', 'id'=>$model->User_id)),
	array('label'=>'Delete Pengajar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->User_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pengajar', 'url'=>array('admin')),
):array(
	array('label'=>'Update Profile', 'url'=>array('update', 'id'=>$model->User_id)),
	array('label'=>'Update User Account Pengajar', 'url'=>array('updateAccount', 'id'=>$model->User_id)),
);
?>

<h1>View Pengajar #<?php echo $model->User_id; ?></h1>
<?php 
	$image=Image::model()->find('User_ID=?',array($model->User_id));
	if($image==null){
		$photo = 'no_photo.jpg';
	}else{
		$photo = $image->image;
	}
	
	echo CHtml::image((Yii::app()->baseUrl.'/images/'.($photo)), ('foto '.($model->nama_lengkap)), array("width"=>"300", "height"=>"220")); 
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'User_id',
		'nama_lengkap',
		'nama_panggilan',
		'alamat_rumah',
		'alamat_kost',
		'no_hp',
		'no_rekening',
		'fakultas',
		'jurusan',
		'status',
		'angkatan',
		'ipk',
		'tempat_lahir',
		'tanggal_lahir',
		'kemampuan_bahasa',
		'hobby',
		'cita_cita',
		'karakter',
		'kendaraan',
		array(
			'label'=>'Pelajaran yang dikuasai',
			'value'=>$pelajaran,
		),
	),
)); ?>
