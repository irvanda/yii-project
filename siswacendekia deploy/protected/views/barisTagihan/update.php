<?php
$this->breadcrumbs=array(
	'Baris Tagihans'=>array('index'),
	$model->ID=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List BarisTagihan', 'url'=>array('index')),
	array('label'=>'Create BarisTagihan', 'url'=>array('create')),
	array('label'=>'View BarisTagihan', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Manage BarisTagihan', 'url'=>array('admin')),
);
?>

<h1>Update BarisTagihan <?php echo $model->ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>