<?php
$this->breadcrumbs=array(
	'Daftar Siswa',
);

$this->menu=array(

);
?>

<h1>Daftar Siswa</h1>

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
					'imageUrl'=>Yii::app()->request->baseUrl.'/images/jadwal_icon.jpg',
					'url'=>'Yii::app()->createUrl("jadwalBelajarMengajar/viewJadwal", array("idSiswa"=>$data->User_id))',
				),
			),
		),
	)
)); 
?>