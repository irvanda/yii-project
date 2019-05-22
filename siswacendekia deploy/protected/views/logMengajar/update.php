<?php
$this->breadcrumbs=array(
	'Log Mengajars'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LogMengajar', 'url'=>array('index')),
	array('label'=>'Create LogMengajar', 'url'=>array('create')),
	array('label'=>'View LogMengajar', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage LogMengajar', 'url'=>array('admin')),
);
?>

<h1>Update LogMengajar <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>