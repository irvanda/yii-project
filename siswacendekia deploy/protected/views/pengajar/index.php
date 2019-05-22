<?php
$this->breadcrumbs=array(
	'Pengajars',
);

$this->menu=array(
	array('label'=>'Create Pengajar', 'url'=>array('create')),
	array('label'=>'Manage Pengajar', 'url'=>array('admin')),
);
?>

<h1>Pengajar</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
