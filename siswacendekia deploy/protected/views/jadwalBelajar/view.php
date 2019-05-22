<?php
$this->breadcrumbs=array(
	'Jadwal Belajars'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List JadwalBelajar', 'url'=>array('index')),
	array('label'=>'Create JadwalBelajar', 'url'=>array('create')),
	array('label'=>'Update JadwalBelajar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete JadwalBelajar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage JadwalBelajar', 'url'=>array('admin')),
);
?>

<h1>View JadwalBelajar #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'hari',
		'jam_mulai',
		'jam_selesai',
		'pelajaran',
		'Customer_User_id',
	),
)); ?>
