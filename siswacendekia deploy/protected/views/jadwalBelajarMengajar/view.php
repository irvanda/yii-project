<?php
$this->breadcrumbs=array(
	'Jadwal Belajar Mengajars'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Lihat Jadwal', 'url'=>array('index')),
	//array('label'=>'Create JadwalBelajarMengajar', 'url'=>array('create')),
	array('label'=>'Update Jadwal', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Jadwal', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage JadwalBelajarMengajar', 'url'=>array('admin')),
);
?>

<h1>View JadwalBelajarMengajar #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'hari',
		'jam_mulai',
		'jam_selesai',
		'Pengajar_User_id',
		'pelajaran',
		'Customer_User_id',
	),
)); ?>


