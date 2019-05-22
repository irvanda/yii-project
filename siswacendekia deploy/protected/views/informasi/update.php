<?php
$this->breadcrumbs=array(
	'Informasis'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Informasi', 'url'=>array('index')),
	array('label'=>'Create Informasi', 'url'=>array('create')),
	array('label'=>'View Informasi', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Informasi', 'url'=>array('admin')),
);
?>

<h1>Update Informasi <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>