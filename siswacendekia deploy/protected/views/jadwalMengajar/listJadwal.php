<!--
	$message = bisa diubah atau dihapus.
	$action = 'upd' untuk mengubah, 'del' untuk menghapus.
-->
<?php
$this->breadcrumbs=array(
'Laporans'=>array('index'),
'Create',
);
?>

<?php $html = new CHtml;
	  $act; ?>

<?php
$this->menu=array(
array('label'=>'List Jadwal', 'url'=>array('index'))
);
?>

<h1>Silahkan pilih Jadwal yang ingin <?php echo $message; ?> :</h1>
<br />
<br />

<div>
<?php
if( $action == 'upd'){
	$url = 'Yii::app()->createUrl(\'jadwalMengajar/upd\', array(\'id\'=> $data[\'id\']))';
} else if( $action == 'del'){
	$url = 'Yii::app()->createUrl(\'jadwalMengajar/del\', array(\'id\'=> $data[\'id\']))';
}
$this->widget('zii.widgets.grid.CGridView', array(
'dataProvider'=>$jadwal,
'columns'=>array(
    'hari',
    'jam_mulai',
    'jam_selesai',
    array(
        'class'=> 'CButtonColumn',
        'template' => '{Pilih}',
        'buttons'=> array('Pilih'=> array(
        								'label'=> 'Pilih',
        								'url'=> $url,

    								)
					)
	)
    )));

?>
</div>

<div>
<?php if($action == 'del') {
		echo 'Apakah anda sudah yakin untuk menghapus jadwal yang anda pilih? <br />';
		echo 'Tindakan ini tidak dapat dibatalkan.';
}
?>
</div>