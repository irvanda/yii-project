<?php
$this->breadcrumbs=array(
	'Pengajars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pengajar', 'url'=>array('index')),
	array('label'=>'Manage Pengajar', 'url'=>array('admin')),
);
?>

<h1>Create Pengajar</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>