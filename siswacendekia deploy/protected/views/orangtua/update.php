<?php
$this->breadcrumbs=array(
	'Orangtuas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Orangtua', 'url'=>array('index')),
	array('label'=>'Create Orangtua', 'url'=>array('create')),
	array('label'=>'View Orangtua', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Orangtua', 'url'=>array('admin')),
);
?>

<h1>Update Orangtua <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>