<?php
$this->breadcrumbs=array(
	'Jadwal Belajars',
);

$this->menu=array(
	array('label'=>'Create JadwalBelajar', 'url'=>array('create')),
	array('label'=>'Manage JadwalBelajar', 'url'=>array('admin')),
);
?>

<h1>Jadwal Belajars</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
