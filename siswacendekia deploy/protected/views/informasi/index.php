<?php
$this->breadcrumbs=array(
	'Informasis',
);

$this->menu=array(
	array('label'=>'Create Informasi', 'url'=>array('create')),
	array('label'=>'Manage Informasi', 'url'=>array('admin')),
);
?>

<h1>Informasi</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
