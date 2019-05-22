<?php
$this->breadcrumbs=array(
	'Jadwal Mengajars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Jadwal Mengajar', 'url'=>array('index'))
);
?>

<h1>Create JadwalMengajar</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>