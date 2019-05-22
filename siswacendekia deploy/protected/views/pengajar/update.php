<?php
$this->breadcrumbs=array(
	'Pengajars'=>array('index'),
	$model->User_id=>array('view','id'=>$model->User_id),
	'Update',
);

$this->menu=
(Yii::app()->user->getState('role')=='admin')?array(
	array('label'=>'List Pengajar', 'url'=>array('index')),
	array('label'=>'Create Pengajar', 'url'=>array('create')),
	array('label'=>'View Pengajar', 'url'=>array('view', 'id'=>$model->User_id)),
	array('label'=>'Manage Pengajar', 'url'=>array('admin')),
):array(
	array('label'=>'View Profil', 'url'=>array('view', 'id'=>$model->User_id)),
	array('label'=>'Update User Account Pengajar', 'url'=>array('updateAccount', 'id'=>$model->User_id)),
);
?>

<h1>Update Pengajar <?php echo $model->User_id; ?></h1>

<?php echo $this->renderPartial('update_form', array('model'=>$model)); ?>