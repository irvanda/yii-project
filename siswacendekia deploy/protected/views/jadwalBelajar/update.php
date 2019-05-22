<?php
$this->breadcrumbs=array(
	'Jadwal Belajars'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List JadwalBelajar', 'url'=>array('index')),
	array('label'=>'Create JadwalBelajar', 'url'=>array('create')),
	array('label'=>'View JadwalBelajar', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage JadwalBelajar', 'url'=>array('admin')),
);
?>

<h1>Update JadwalBelajar <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>