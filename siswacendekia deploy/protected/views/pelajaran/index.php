<?php
$this->breadcrumbs=array(
	'Pelajarans',
);

$this->menu=array(
	array('label'=>'Create Pelajaran', 'url'=>array('create')),
	array('label'=>'Manage Pelajaran', 'url'=>array('admin')),
);
?>

<h1>Pelajarans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
