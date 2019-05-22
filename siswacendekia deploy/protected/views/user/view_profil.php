<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Update Profil', 'url'=>array('update', 'id'=>$model->id)),
);
?>

<h1>View User #<?php echo $model->id; ?></h1>
	
<?php 
	$image=Image::model()->find('User_ID=?',array($model->id));
	echo CHtml::image((Yii::app()->baseUrl.'/images/'.($image->image)), ('foto '.($model->username)), 
	array("width"=>"200", "height"=>"150")); 
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'password',
		'salt',
	),
)); ?>
