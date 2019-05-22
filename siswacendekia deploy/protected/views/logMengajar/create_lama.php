<?php
$this->breadcrumbs=array(
	'Log Mengajars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LogMengajar', 'url'=>array('index')),
	array('label'=>'Manage LogMengajar', 'url'=>array('admin')),
);
?>

<h1>Create LogMengajar</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>