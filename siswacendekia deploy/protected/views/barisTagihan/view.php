<?php
$this->breadcrumbs=array(
	'Baris Tagihans'=>array('index'),
	$model->ID,
);

$this->menu=array(
/*
	array('label'=>'List BarisTagihan', 'url'=>array('index')),
	array('label'=>'Create BarisTagihan', 'url'=>array('create')),
	array('label'=>'Update BarisTagihan', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Delete BarisTagihan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BarisTagihan', 'url'=>array('admin')),
	*/
);
?>

<h1>View BarisTagihan #<?php echo $model->ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'details',
		'biaya',
		'date',
		'Tagihan_id',
		'status',
	),
)); ?>
