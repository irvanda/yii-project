<?php
$this->breadcrumbs=array(
	'Pelajarans'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pelajaran', 'url'=>array('index')),
	array('label'=>'Create Pelajaran', 'url'=>array('create')),
	array('label'=>'View Pelajaran', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Pelajaran', 'url'=>array('admin')),
);
?>

<h1>Update Pelajaran <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>