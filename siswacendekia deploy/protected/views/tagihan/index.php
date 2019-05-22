<?php
$this->breadcrumbs=array(
	'Tagihans',
);

$this->menu=array(
/*
	array('label'=>'Create Tagihan', 'url'=>array('create')),
	array('label'=>'Manage Tagihan', 'url'=>array('admin')),
*/);
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'User_id',
		'nama',
		'alamat_rumah',
		'asal_sekolah',
		array(
			'class'=>CButtonColumn,
			'template'=>'{view jadwal}',
			'buttons'=>array(
				'view jadwal' => array
				(
					'label'=>'View customer jadwal',
					'imageUrl'=>Yii::app()->request->baseUrl.'/images/lookup_icon.jpg',
					'url'=>'Yii::app()->createUrl("tagihan/viewTagihan", array("idSiswa"=>$data->User_id))',
				),
			),
		),
	)
));