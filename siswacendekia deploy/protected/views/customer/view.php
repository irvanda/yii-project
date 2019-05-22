<?php
$this->breadcrumbs=array(
	'Customers'=>array('index'),
	$model->User_id,
);

$this->menu=
(Yii::app()->user->getState('role')=='admin')?array(
	
		array('label'=>'List Customer', 'url'=>array('index')),
		array('label'=>'Create Customer', 'url'=>array('create')),
		array('label'=>'Update Customer', 'url'=>array('update', 'id'=>$model->User_id)),
		array('label'=>'Update User Account Customer', 'url'=>array('updateAccount', 'id'=>$model->User_id)),
		array('label'=>'Delete Customer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->User_id),'confirm'=>'Are you sure you want to delete this item?')),
		array('label'=>'Manage Customer', 'url'=>array('admin')),
):array(
	array('label'=>'Update Profile', 'url'=>array('update', 'id'=>$model->User_id)),
	array('label'=>'Update User Account Customer', 'url'=>array('updateAccount', 'id'=>$model->User_id)),
);
?>

<h1>View Customer #<?php echo $model->User_id; ?></h1>
<h2>Data Diri</h2>
<?php 
	$image=Image::model()->find('User_ID=?',array($model->User_id));
	$photo;
	if($image==null)
		$photo = 'no_photo.jpg';
	else
		$photo=($image->image);
	echo CHtml::image((Yii::app()->baseUrl.'/images/'.($photo)), ('foto '.($model->nama)), 
	array("width"=>"300", "height"=>"220")); 
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'User_id',
		'nama',
		'tanggal_lahir',
		'tempat_lahir',
		'alamat_rumah',
		'asal_sekolah',
		'alamat_sekolah',
		'kelas_jurusan',
		'no_hp',
		'email',
		'facebook',
		'anak_ke',
		'jumlah_saudara',
		'cita_cita',
		'hobi',
		'moto',
		'mapel_disukai',
		'mapel_tidak_disukai',
		'orangtua_id',
		'status',
		array(
			'label'=>'Paket yang diikuti',
			'value'=>$program->nama_program,
		),
		array(
			'label'=>'Pelajaran yang diikuti',
			'value'=>$pelajaran,
		),
	),
)); ?>
<h2>Data Orangtua</h2>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$orangtua,
	'attributes'=>array(
			'id',
			'nama_ayah',
			'tempat_lahir_ayah',
			'tanggal_lahir_ayah',
			'pekerjaan_ayah',
			'no_telp_ayah',
			'email_ayah',
			'facebook_ayah',
			'nama_ibu',
			'tempat_lahir_ibu',
			'tanggal_lahir_ibu',
			'alamat_ayah',
			'alamat_ibu',
			'pekerjaan_ibu',
			'no_telp_ibu',
			'email_ibu',
			'facebook_ibu',
	),
)); ?>