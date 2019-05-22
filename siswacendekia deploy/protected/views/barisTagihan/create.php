<?php
$this->breadcrumbs=array(
	'Baris Tagihans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BarisTagihan', 'url'=>array('index')),
	array('label'=>'Manage BarisTagihan', 'url'=>array('admin')),
);
?>

<h1>Create BarisTagihan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>