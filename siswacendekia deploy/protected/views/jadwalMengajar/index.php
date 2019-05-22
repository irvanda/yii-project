<?php
$this->breadcrumbs=array(
	'Jadwal Mengajars',
);

$this->menu=array(
	array('label'=>'Create Alokasi Waktu Mengajar', 'url'=>array('create')),
	//array('label'=>'Update Alokasi Waktu Mengajar', 'url'=>array('update')),
	//array('label'=>'Delete Alokasi Waktu Mengajar', 'url'=>array('delete'))
);
?>

<h2>Jadwal Mengajar:</h2>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
'dataProvider'=>$jadwal,
'columns'=>array(
    'hari',
    'jam_mulai',
    'jam_selesai',
    'customerUser.nama',
    'customerUser.alamat_rumah',
	'customerUser.no_hp',
    ),
));

echo "<br /><h2>Alokasi Waktu Kosong:</h2>";

$this->widget('zii.widgets.grid.CGridView', array(
'dataProvider'=>$jadwal_luang,
'columns'=>array(
    'hari',
    'jam_mulai',
    'jam_selesai',
	array(
			'class'=>CButtonColumn,
			'template'=>'{update}{delete}',
		),
    ),
));
?>
