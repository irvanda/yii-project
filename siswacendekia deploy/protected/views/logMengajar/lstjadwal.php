<?php
$this->breadcrumbs=array(
'Log Mengajars'=>array('index'),
'Create',
);

$this->menu=array(
array('label'=>'List LogMengajar', 'url'=>array('index')),
((Yii::app()->user->getState('role'))=='admin')?array('label'=>'Manage LogMengajar', 'url'=>array('admin')):"",

);
?>

<h1>Pilih Jadwal yang akan dibuat Log:</h1>

<div>
<?php
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
            								'url'=> 'Yii::app()->createUrl(\'logMengajar/log\',
														array(\'jam_mulai\'=> $data[\'jam_mulai\'],
 															  \'jam_selesai\'=> $data[\'jam_selesai\'],
 															  \'customer\'=> $data[\'Customer_User_id\'],
 															  \'hari\'=> $data[\'hari\']))')),
        ),
    ),
));

?>
</div>

<div>
<?php
if(!($jadwal->getItemCount()==0)){
	echo $this->renderPartial('_form', array('model'=> new LogMengajar, 'listCust'=> $listCust));
}else{
	echo "<div style='font: 4em'><b>Informasi:</b><br /><b>Anda tidak mempunyai jadwal belajar mengajar untuk dibuat log</b></div>";
}
?>
</div>

