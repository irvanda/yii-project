<?php
$this->breadcrumbs=array(
	'Jadwal Belajar Mengajars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Jadwal', 'url'=>array('index')),
	//array('label'=>'Manage JadwalBelajarMengajar', 'url'=>array('admin')),
);
?>

<h1>Create JadwalBelajarMengajar</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>