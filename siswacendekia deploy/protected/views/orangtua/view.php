<?php
$this->breadcrumbs=array(
	'Orangtuas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Orangtua', 'url'=>array('index')),
	array('label'=>'Create Orangtua', 'url'=>array('create')),
	array('label'=>'Update Orangtua', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Orangtua', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Orangtua', 'url'=>array('admin')),
);
?>

<h1>View Orangtua #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
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
