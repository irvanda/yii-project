<?php
$this->breadcrumbs=array(
	'Jadwal Belajars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List JadwalBelajar', 'url'=>array('index')),
	array('label'=>'Manage JadwalBelajar', 'url'=>array('admin')),
);
?>

<h1>Create JadwalBelajar</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>