<?php
$this->breadcrumbs=array(
	'Feedbacks',
);

	$this->menu=array(
		(Yii::app()->user->getState('role')=='siswa')?array('label'=>'Create Feedback', 'url'=>array('create')):"",
		array('label'=>'Daftar Feedback', 'url'=>array('admin')),
	);

?>


<h2>
  Feedback
</h2>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'enableSorting'=>true,
)); ?>

<?php //echo date("m/d/Y h:i:s a", time());?>
<?php //echo date("Y-m-d", time());?>


 <?php 
 if(Yii::app()->user->getState('role')=='siswa'){
	echo 'Beri Feedback<br />';
	$model=new Feedback;
	echo $this->renderPartial('_form', array('model'=>$model));  //rendering form feedback baru
}
?>
