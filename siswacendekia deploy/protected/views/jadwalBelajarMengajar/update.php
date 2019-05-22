<?php
$this->breadcrumbs=array(
	'Jadwal Belajar Mengajars'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List JadwalBelajarMengajar', 'url'=>array('index')),
	array('label'=>'Create Jadwal', 'url'=>array('create')),
	array('label'=>'View Jadwal', 'url'=>array('view', 'id'=>$model->id)),
	//array('label'=>'Manage JadwalBelajarMengajar', 'url'=>array('admin')),
);
?>

<h1>Update JadwalBelajarMengajar <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>