<?php
$this->breadcrumbs=array(
	'Log Mengajars',
);

$this->menu=array(
	array('label'=>'Create LogMengajar', 'url'=>array('create')),
	((Yii::app()->user->getState('role'))=='admin')?array('label'=>'Manage LogMengajar', 'url'=>array('admin')):"",
	
);
?>

<h1>Log Mengajar</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
