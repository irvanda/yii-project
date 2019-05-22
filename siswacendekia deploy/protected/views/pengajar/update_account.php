<?php
$this->breadcrumbs=array(
	'Pengajars'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=
(Yii::app()->user->getState('role')=='admin')?array(
	array('label'=>'List Pengajar', 'url'=>array('index')),
	array('label'=>'Create Pengajar', 'url'=>array('create')),
	array('label'=>'View Pengajar', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Pengajar', 'url'=>array('admin')),
):array(
	array('label'=>'View Profil', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Update User Account Pengajar', 'url'=>array('updateAccount', 'id'=>$model->id)),
);
?>

<h1>Update Pengajar <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_account_form', array('model'=>$model)); ?>