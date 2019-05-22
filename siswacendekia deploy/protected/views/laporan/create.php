<?php
$this->breadcrumbs=array(
	'Laporans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Daftar Siswa', 'url'=>array('index')),
	// array('label'=>'Manage Laporan', 'url'=>array('admin')),
);
?>

<h1>Create Laporan</h1>

<?php 
if(!($daftar_customer==null)){
	echo $this->renderPartial('_form', array('model'=>$model, 'customer'=> $daftar_customer)); 
}else{
	echo "<span style='font: 2em'><b>Anda tidak mempunyai siswa, anda tidak bisa membuat laporan</b></span>";
}
?>