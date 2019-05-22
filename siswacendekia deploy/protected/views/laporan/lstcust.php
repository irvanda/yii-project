<?php
$this->breadcrumbs=array(
'Laporans'=>array('index'),
'Create',
);
?>

<?php $html = new CHtml; ?>

<?php
$this->menu=array(
array('label'=>'List Laporan', 'url'=>array('index')),
array('label'=>'Manage Laporan', 'url'=>array('admin')),
);
?>

<h1>Silahkan pilih Customer yang diinginkan:</h1>
<br />
<br />

<div>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
'dataProvider'=>$jadwal,
'columns'=>array(
    'hari',
    'jam_mulai',
    'jam_selesai',
    'customerUser.nama',
    array(
        'class'=> 'CButtonColumn',
        'template' => '{Pilih}',
        'buttons'=> array('Pilih'=> array(
        								'label'=> 'Pilih',
        								'url'=> 'Yii::app()->createUrl(\'laporan/laporan\',
														array(\'customer\'=> $data[\'Customer_User_id\']))'
    								)
					)
	)
    )));

?>
</div>