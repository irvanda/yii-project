<?php
$this->breadcrumbs=array(
	'Laporans'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Laporan', 'url'=>array('index')),
	array('label'=>'Create Laporan', 'url'=>array('create')),
	array('label'=>'View Laporan', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Laporan', 'url'=>array('admin')),
);
?>

<h1>Update Laporan <?php echo $model->id; ?></h1>

<?php 
if($model==null){
	echo "<div>".$notif."</div>";
}else{
	echo $this->renderPartial('_form', array('model'=>$model)); 
}?>