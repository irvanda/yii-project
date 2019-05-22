<?php
$this->breadcrumbs=array(
	'Orangtuas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Orangtua', 'url'=>array('index')),
	array('label'=>'Manage Orangtua', 'url'=>array('admin')),
);
?>

<h1>Create Orangtua</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>