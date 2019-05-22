<?php
$this->breadcrumbs=array(
	'Laporans'=>array('index'),
	$model->id,
);
if(Yii::app()->user->getState('role')=='admin'){
	$this->menu=array(
		array('label'=>'Daftar Siswa', 'url'=>array('index')),
		array('label'=>'Create Laporan', 'url'=>array('create')),
		//array('label'=>'Update Laporan', 'url'=>array('update', 'id'=>$model->id)),
		//array('label'=>'Delete Laporan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
		//array('label'=>'Manage Laporan', 'url'=>array('admin')),
	);
}
?>

<h1>View Laporan #<?php echo $model->id; ?></h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'date',
		'detail',
		(Yii::app()->user->getState('role')=='admin')?array(
			'class'=>CButtonColumn,
			'template'=>'{view}{update}{delete}',
		):array(
			'class'=>CButtonColumn,
			'template'=>'{view}',
		)),
));
?>
