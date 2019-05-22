<?php
$this->breadcrumbs=array(
	'Customers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=
(Yii::app()->user->getState('role')=='admin')?array(
	array('label'=>'List Customer', 'url'=>array('index')),
	array('label'=>'Create Customer', 'url'=>array('create')),
	array('label'=>'View Customer', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Customer', 'url'=>array('admin')),
):
array(
	array('label'=>'View Profil', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Update Customer <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_account_form', array('model'=>$model)); ?>