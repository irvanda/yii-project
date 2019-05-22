<?php
$this->breadcrumbs=array(
	'Pelajarans'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Pelajaran', 'url'=>array('index')),
	array('label'=>'Create Pelajaran', 'url'=>array('create')),
	array('label'=>'Update Pelajaran', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Pelajaran', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pelajaran', 'url'=>array('admin')),
);
?>

<h1>View Pelajaran #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nama_pelajaran',
		'tingkatan',
		'harga',
	),
)); ?>
