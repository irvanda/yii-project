<?php
$this->breadcrumbs=array(
	'Jadwal Belajar Mengajars',
);

$this->menu=array(
	//array('label'=>'Create JadwalBelajarMengajar', 'url'=>array('create')),
	//array('label'=>'Manage JadwalBelajarMengajar', 'url'=>array('admin')),
);
?>

<h1>Jadwal Belajar Mengajar</h1>

<?php /*$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 
*/
?>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'hari',
		'jam_mulai',
		'jam_selesai',
		array(
			'name'=>'nama pengajar',
			'value'=>'$data->pengajarUser->nama_lengkap',
		),
		array(
			'name'=>'no hp pengajar',
			'value'=>'$data->pengajarUser->no_hp',
		),
		array(
			'class'=>CButtonColumn,
			'template'=>'{view}{update}{delete}',
			),
		),
));
?>
<h2>Create Jadwal</h2>
<div class="form" style="border: 1px solid #C9E0ED">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'jadwal-form',
	'enableAjaxValidation'=>false,
	'action'=>'index.php?r=jadwalBelajarMengajar/createJadwal',
)); 
	$model = new JadwalBelajarMengajar;
?>
<table>
	<tr>
		<td><?php echo $form->labelEx($model,'hari'); ?></td>
		<td><?php echo $form->labelEx($model,'jam_mulai'); ?></td>
		<td><?php echo $form->labelEx($model,'jam_selesai'); ?></td>
		<td><?php echo $form->labelEx($model,'pelajaran'); ?></td>
	</tr>

	<tr>
		<td><?php echo $form->dropDownList($model,'hari',array(2=>'Senin',3=>'Selasa',4=>'Rabu',5=>'Kamis',6=>'Jumat',7=>'Sabtu',1=>'Minggu')); ?></td>
		<td><?php echo $form->dropDownList($model,'jam_mulai',array('08:00'=>'08:00','08:30'=>'08:30','09:00'=>'09:00','09:30'=>'09:30','10:00'=>'10:00','10:30'=>'10:30','11:30'=>'11:30','12:00'=>'12:00','12:30'=>'12:30','13:00'=>'13:00','13:30'=>'13:30','14:00'=>'14:00','14:30'=>'14:30','15:00'=>'15:00','15:30'=>'15:30','16:00'=>'16:00','16:30'=>'16:30','17:00'=>'17:00','17:30'=>'17:30','18:00'=>'18:00','18:30'=>'18:30','19:00'=>'19:00','19:30'=>'19:30','20:00'=>'20:00','20:30'=>'20:30','21:00'=>'21:00')); ?></td>
		<td><?php echo $form->dropDownList($model,'jam_selesai', array('08:00'=>'08:00','08:30'=>'08:30','09:00'=>'09:00','09:30'=>'09:30','10:00'=>'10:00','10:30'=>'10:30','11:30'=>'11:30','12:00'=>'12:00','12:30'=>'12:30','13:00'=>'13:00','13:30'=>'13:30','14:00'=>'14:00','14:30'=>'14:30','15:00'=>'15:00','15:30'=>'15:30','16:00'=>'16:00','16:30'=>'16:30','17:00'=>'17:00','17:30'=>'17:30','18:00'=>'18:00','18:30'=>'18:30','19:00'=>'19:00','19:30'=>'19:30','20:00'=>'20:00','20:30'=>'20:30','21:00'=>'21:00')); ?></td>
		<?php
			$sql = 'Select nama_pelajaran, id from pelajaran, pelajaran_has_customer where id=Pelajaran_id AND Customer_User_id='.Yii::app()->user->id;
			$connection=Yii::app()->db;  
			$command=$connection->createCommand($sql);
			$rows=$command->queryAll();
			if($rows==null || $rows[0][0]==null)
				echo "<td>".$form->dropDownList($model, 'pelajaran', CHtml::listData(Pelajaran::model()->findAll(),'id','nama_pelajaran'))."</td>";
			else
				echo "<td>".$form->dropDownList($model,'pelajaran',CHtml::listData($rows, $rows->id, $rows->nama_pelajaran))."</td>";
		?>
	</tr>

	<tr>
		<td><?php echo $form->error($model,'hari'); ?></td>
		<td><?php echo $form->error($model,'jam_mulai'); ?></td>
		<td><?php echo $form->error($model,'jam_selesai'); ?></td>
		<td><?php echo $form->error($model,'pelajaran'); ?></td>	
	</tr>

	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td><?php echo CHtml::submitButton('Create'); ?></td>
	</tr>
</table>
<?php $this->endWidget(); ?>
</div>