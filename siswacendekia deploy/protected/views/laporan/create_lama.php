<?php
$this->breadcrumbs=array(
	'Laporans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Laporan', 'url'=>array('index')),
	array('label'=>'Manage Laporan', 'url'=>array('admin')),
);
?>

<h1>Create Laporan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>