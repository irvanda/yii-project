<?php
$this->breadcrumbs=array(
	'Laporans',
);

$this->menu=array(
	array('label'=>'Create Laporan', 'url'=>array('create')),
	//array('label'=>'Manage Laporan', 'url'=>array('admin')),
);

?>

<h1>Daftar Siswa</h1>

<?php 
//$this->widget('zii.widgets.CListView', array(
//	'dataProvider'=>$dataProvider,
//	'itemView'=>'_view',
//)); 
$this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'nama',
		'alamat_rumah',
		'no_hp',
		array(
			'class'=>CButtonColumn,
			'template'=>'{laporan}',
			'buttons'=>array(
				'laporan' => array
				(
					'label'=>'buat laporan',
					'imageUrl'=>Yii::app()->request->baseUrl.'/images/assign_icon.jpg',
					'url'=>'Yii::app()->createUrl("laporan/viewDaftarLaporan", array("id"=>$data[Customer_User_id]))',
				),
			),
		),
	),
));
?>
