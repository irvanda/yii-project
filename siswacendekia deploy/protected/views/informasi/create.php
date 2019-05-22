<?php
$this->breadcrumbs=array(
	'Informasis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Informasi', 'url'=>array('index')),
	array('label'=>'Manage Informasi', 'url'=>array('admin')),
);
?>

<h1>Create Informasi</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>