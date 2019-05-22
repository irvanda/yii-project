<?php
$this->breadcrumbs=array(
	'Baris Tagihans',
);

$this->menu=array(
	array('label'=>'Create BarisTagihan', 'url'=>array('create')),
	array('label'=>'Manage BarisTagihan', 'url'=>array('admin')),
);
?>

<h1>Baris Tagihans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
