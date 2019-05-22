<?php
$this->breadcrumbs=array(
	'Jadwal Mengajars'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List JadwalMengajar', 'url'=>array('index')),
	array('label'=>'Create JadwalMengajar', 'url'=>array('create')),
	array('label'=>'Update JadwalMengajar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete JadwalMengajar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage JadwalMengajar', 'url'=>array('admin')),
);
?>

<h1>View JadwalMengajar #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'hari',
		'jam_mulai',
		'jam_selesai',
		'Pengajar_User_id',
	),
)); ?>
