<?php
$this->breadcrumbs=array(
	'Informasis'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Informasi', 'url'=>array('index')),
	array('label'=>'Create Informasi', 'url'=>array('create')),
	array('label'=>'Update Informasi', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Informasi', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Informasi', 'url'=>array('admin')),
);
?>

<h1>View Informasi #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'create_time',
		'update_time',
		'content:html',
		'author_id',
		'tags',
		'status',
	),
)); ?>
