<?php
$this->breadcrumbs=array(
	'Customers'=>array('index'),
	$model->User_id=>array('view','id'=>$model->User_id),
	'Update',
);

$this->menu=
(Yii::app()->user->getState('role')=='admin')?array(
	array('label'=>'List Customer', 'url'=>array('index')),
	array('label'=>'Create Customer', 'url'=>array('create')),
	array('label'=>'View Customer', 'url'=>array('view', 'id'=>$model->User_id)),
	array('label'=>'Manage Customer', 'url'=>array('admin')),
):
array(
	array('label'=>'View Profil', 'url'=>array('view', 'id'=>$model->User_id)),
	array('label'=>'Update User Account Customer', 'url'=>array('updateAccount', 'id'=>$model->User_id)),
);
?>

<h1>Update Customer <?php echo $model->User_id; ?></h1>

<?php echo $this->renderPartial('update_form', array('model'=>$model)); ?>