<?php
$this->breadcrumbs=array(
	'Laporans'=>array('index'),
	$model->id,
);

$this->menu=
(Yii::app()->user->getState('role')=='admin')?array(
	array('label'=>'Daftar Siswa', 'url'=>array('index')),
	array('label'=>'Create Laporan', 'url'=>array('create')),
	array('label'=>'Update Laporan', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Laporan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage Laporan', 'url'=>array('admin')),
):array(
	array('label'=>'Daftar Laporan', 'url'=>array('viewDaftarLaporanSiswa', 'id'=>Yii::app()->user->id)),
	array('label'=>'Update Laporan', 'url'=>array('update', 'id'=>$model->id)),
);
?>

<h1>View Laporan #<?php echo $model->id; ?></h1>

<?php 
/*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'detail',
		'date',
		'Pengajar_User_id',
		'Customer_User_id',
	),
));
*/
$pengajar = Pengajar::model()->find('User_id=?',array($model->Pengajar_User_id));
?>

<table id='newspaper-b'>
<tr>
<td>Tanggal:<?php echo " ".$model->date; ?></td>
<td>Pengajar:<?php echo " ".$pengajar->nama_lengkap; ?></td>
</tr>
<tr>
<td>Isi Laporan:</td>
<td><?php echo " ".$model->detail; ?></td>
</tr>
</table>



