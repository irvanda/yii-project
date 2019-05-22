<?php
$this->breadcrumbs=array(
	'Pelajarans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pelajaran', 'url'=>array('index')),
	array('label'=>'Manage Pelajaran', 'url'=>array('admin')),
);
?>

<h1>Create Pelajaran</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>