<?php
$this->breadcrumbs=array(
	'Jadwal Siswa',
);

$this->menu=array(

);

?>
<?php
echo "<h1>Jadwal Siswa: ".$nama_siswa." </h1>";
?>
<?php
if(!($dataProvider==null)){ 
	$this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'hari',
		'jam_mulai',
		'jam_selesai',
		'pelajaran',
		array(
			'name'=>'pengajar',
			'value'=>'$data->pengajarUser->nama_lengkap',
		),
		array(
			'class'=>CButtonColumn,
			'template'=>'{assign_pengajar}',
			'buttons'=>array(
				'assign_pengajar' => array
				(
					'label'=>'assign pengajar',
					'imageUrl'=>Yii::app()->request->baseUrl.'/images/assign_pengajar_icon.jpg',
					'url'=>'Yii::app()->createUrl("jadwalBelajarMengajar/assignTutor", array("idJadwal"=>$data->id))',
				),
			),
		),
	)
)); 
}
?>

<?php
if(!$idJadwal==null){
$jdl = JadwalBelajarMengajar::model()->find('id=?',array($idJadwal));
echo "<h2>Daftar Pengajar untuk dialokasikan pada jadwal:"."</h2>";
echo 	"<table><tr><td>Hari</td><td>".$jdl->hari.
		"</td></tr><tr><td>Jam Mulai</td><td>".$jdl->jam_mulai."</td>".
		"<tr><td>Jam Selesai</td><td>".$jdl->jam_selesai."</td></tr>".
		"</tr><tr><td>Mapel</td><td>".$jdl->pelajaran."</td></tr></table>";

}
?>
<h2>Semua pengajar</h2>
<?php 
if(!($allTutor==null)){
	$this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$allTutor,
	'columns'=>array(
		'nama_lengkap',
		'alamat_kost',
		'no_hp',
		'status',
		'kemampuan_bahasa',
		'kendaraan',
		array(
			'class'=>CButtonColumn,
			'template'=>'{assign}',
			'buttons'=>array(
				'assign' => array
				(
					'label'=>'assign',
					'imageUrl'=>Yii::app()->request->baseUrl.'/images/assign_icon.jpg',
					'url'=>'Yii::app()->createUrl("jadwalBelajarMengajar/assign", array("idPengajar"=>$data->User_id, "idJadwal"=>'.$idJadwal.'))',
				),
			),
		),
	)
));
} 
?>
<!--<h2>Pengajar sesuai mata pelajaran</h2>-->
<?php 
if(!($suggestedTutor==null)){
	$this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$suggestedTutor,
	'columns'=>array(
		'nama_lengkap',
		'alamat_kost',
		'no_hp',
		'status',
		'kemampuan_bahasa',
		'nama_pelajaran',
		'kendaraan',
		array(
			'class'=>CButtonColumn,
			'template'=>'{assign}',
			'buttons'=>array(
				'assign' => array
				(
					'label'=>'assign',
					'imageUrl'=>Yii::app()->request->baseUrl.'/images/assign_icon.jpg',
					'url'=>'Yii::app()->createUrl("jadwalBelajarMengajar/assign", array("idPengajar"=>$data["User_id"], "idJadwal"=>'.$idJadwal.'))',
				),
			),
		),
	)
));
} 
?>


