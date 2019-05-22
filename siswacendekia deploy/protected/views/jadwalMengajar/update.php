<?php
$this->breadcrumbs=array(
	'Jadwal Mengajars'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Jadwal Mengajar', 'url'=>array('index'))
);
?>

<h1>Update JadwalMengajar <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>