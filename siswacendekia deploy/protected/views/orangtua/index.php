<?php
$this->breadcrumbs=array(
	'Orangtuas',
);

$this->menu=array(
	array('label'=>'Create Orangtua', 'url'=>array('create')),
	array('label'=>'Manage Orangtua', 'url'=>array('admin')),
);
?>

<h1>Orangtuas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
