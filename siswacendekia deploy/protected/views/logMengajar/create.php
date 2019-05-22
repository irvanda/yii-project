<?php
$this->breadcrumbs=array(
	'Log Mengajars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LogMengajar', 'url'=>array('index')),
	((Yii::app()->user->getState('role'))=='admin')?array('label'=>'Manage LogMengajar', 'url'=>array('admin')):"",
	
);
?>

<h1>Create LogMengajar</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'jam_mulai'=> $jam_mulai, 'jam_selesai'=> $jam_selesai, 'customer'=> $customer, 'hari'=> $hari)); ?>