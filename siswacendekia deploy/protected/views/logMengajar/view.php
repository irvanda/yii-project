<?php
$this->breadcrumbs=array(
	'Log Mengajars'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List LogMengajar', 'url'=>array('index')),
	array('label'=>'Create LogMengajar', 'url'=>array('create')),
	//array('label'=>'Update LogMengajar', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete LogMengajar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	((Yii::app()->user->getState('role'))=='admin')?array('label'=>'Manage LogMengajar', 'url'=>array('admin')):"",
	
);
?>

<h1>View LogMengajar #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'tanggal',
		'jam_mulai',
		'jam_selesai',
		'deskripsi',
		'Pengajar_User_id',
	),
)); ?>
