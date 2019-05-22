<?php
$this->breadcrumbs=array(
	'Tagihans',
);
/*
$this->menu=array(
	array('label'=>'Create Tagihan', 'url'=>array('create')),
	array('label'=>'Manage Tagihan', 'url'=>array('admin')),
);*/
$user_role = Yii::app()->user->getState('role');
$siswa = Customer::model()->find('User_id=?',array($idSiswa));
echo "<h2>Tagihan ".$siswa->nama."</h2>"
?>

<!--tabel yang menampilkan tagihan per bulan siswa tertentu-->
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataTagihan,
	'columns'=>array(
		'bulan',
		'tahun',
		array(
			'name'=>'Persetujuan',
			'value'=>'(($data->persetujuan)==1)?"setuju":"belum setuju"',
		),
		array(
			'name'=>'Status Pembayaran',
			'value'=>'(($data->status_pembayaran)==1)?"Lunas":"Belum Lunas"',
		),
		array(
			'class'=>CButtonColumn,
			'template'=>'{detail_tagihan}',
			'buttons'=>array(
				'detail_tagihan' => array
				(
					'label'=>'View detail tagihan',
					'imageUrl'=>Yii::app()->request->baseUrl.'/images/assign_icon.jpg',
					'url'=>'Yii::app()->createUrl("tagihan/viewDetailTagihan", array("idTagihan"=>$data->id, "idSiswa"=>'.$idSiswa.'))',
				),
			),
		),
	)
));
?>

<!--form untuk create tagihan per bulan-->
<?php 
if($user_role=='admin'){
?>
<span><b>Membuat tagihan baru:</b></span>
<div class="form" style="border: 1px solid #C9E0ED">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tagihan-form',
	'enableAjaxValidation'=>false,
	'action'=>'index.php?r=tagihan/createTagihan',
)); 
	$modeltagihan = new CreateTagihanForm;
?>
<table>
	<tr>
		<td><?php echo $form->labelEx($modeltagihan,'bulan'); ?></td>
		<td><?php echo $form->labelEx($modeltagihan,'tahun'); ?></td>
		<td><?php echo $form->labelEx($modeltagihan,'status_pembayaran'); ?></td>
		<td><?php echo $form->labelEx($modeltagihan,'persetujuan'); ?></td>
		<td><?php echo $form->labelEx($modeltagihan,'Customer_User_id'); ?></td>
	</tr>

	<tr>
		<td><?php echo $form->dropDownList($modeltagihan,'bulan',array('01'=>'Januari','02'=>'Februari','03'=>'Maret','04'=>'April','05'=>'Mei','06'=>'Juni','07'=>'Juli','08'=>'Agustus','09'=>'September','10'=>'Oktober','11'=>'November','12'=>'Desember')); ?></td>
		<td><?php echo $form->textField($modeltagihan,'tahun',array('size'=>4,'maxlength'=>4)); ?></td>
		<td><?php echo $form->dropDownList($modeltagihan,'status_pembayaran', array(1=>'lunas', 0=>'belum lunas')); ?></td>
		<td><?php echo $form->dropDownList($modeltagihan,'persetujuan',array(1=>'disetujui', 0=>'belum disetujui')); ?></td>
		<td><?php echo $form->textField($modeltagihan,'Customer_User_id',array('size'=>5,'maxlength'=>5, 'value'=>$idSiswa, 'readonly'=>true)); ?></td>
	</tr>

	<tr>
		<td><?php echo $form->error($modeltagihan,'bulan'); ?></td>
		<td><?php echo $form->error($modeltagihan,'tahun'); ?></td>
		<td><?php echo $form->error($modeltagihan,'status_pembayaran'); ?></td>
		<td><?php echo $form->error($modeltagihan,'persetujuan'); ?></td>
		<td><?php echo $form->error($modeltagihan,'Customer_User_id'); ?></td>		
	</tr>

	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td><?php echo CHtml::submitButton('Create'); ?></td>
	</tr>
</table>
<?php $this->endWidget(); ?>
</div>
<?php }?>

<!--tampilan keterangan tagihan yang dipilih-->
<br />
<?php
	if(!$idTagihan==null)
	{
		$tagihan = Tagihan::model()->find('id=?',array($idTagihan));
		echo "<h2>Detail tagihan ".$siswa->nama." pada:</h2>";
?>
	<table id="newspaper-b" style="margin:0px">
		<tr>
			<td>Bulan/Tanggal</td>
			<td><?php echo $tagihan->bulan.'/'.$tagihan->tahun; ?></td>
		</tr>
		<tr>
			<td>Pembayaran</td>
			<td><?php echo ($tagihan->status_pembayaran)?'Lunas':'Belum lunas'; ?></td>
		</tr>
		<tr>
			<td>Persetujuan</td>
			<td><?php echo ($tagihan->persetujuan)?'Setuju':'Belum setuju'; ?></td>
		</tr>
	</table>
<?php
	}
?>

<!--tabel detail tagihan perbulan-->
<?php

if(!$detailTagihan==null)
{
	$this->widget('zii.widgets.grid.CGridView', array(
		'dataProvider'=>$detailTagihan,
		'columns'=>array(
			'date',
			'details',
			'biaya',
			'status',
			array(
				'name'=>'Persetujuan',
				'value'=>'CHtml::checkBox("status",$data->status,array("value"=>$data->status,"id"=>"tagihan_".$data->ID))',
				'type'=>'raw',
				'htmlOptions'=>array('width'=>5),
			),
			array(
				'class'=>CButtonColumn,
				'template'=>($user_role=='admin')?'{view}{update}{delete}':'{view}',
				'buttons'=>array(
				'view' => array
				(
					'url'=>'Yii::app()->createUrl("barisTagihan/view", array("id"=>$data->ID))',
				),
				'update' => array
				(
					'url'=>'Yii::app()->createUrl("barisTagihan/update", array("id"=>$data->ID))',
				),
				'delete' => array
				(
					'url'=>'Yii::app()->createUrl("barisTagihan/delete", array("id"=>$data->ID))',
				),
			),
			)
		)
	));
}
?>

<!--tombol untuk mengubah status pembayaran oleh admin atau mengubah status persetujuan oleh customer-->
<?php
if(!$idTagihan==null)
{
	if($user_role=='admin')
	{
		$action_url="window.location='index.php?r=tagihan/updateStatusPembayaran&idTagihan=".$idTagihan."&idSiswa=".$idSiswa."'";
		$label_button=($tagihan->status_pembayaran)?'Ubah status pembayaran ke belum lunas':'Ubah status pembayaran ke lunas';
	}
	else
	{
		$action_url="window.location='index.php?r=tagihan/updateStatusPersetujuan&idTagihan=".$idTagihan."&idSiswa=".$idSiswa."'";
		$label_button=($tagihan->persetujuan)?'Ubah status persetujuan ke belum setuju':'Ubah status persetujuan ke setuju';
	}
?>

<span style="margin:275px">
			<input type="button"<?php echo ' onClick="'.$action_url.'" value="'.$label_button.'" ';?>/>
</span>
<br />
<?php 
}
?>

<!--form untuk create baris tagihan pada tagihan bulan tertentu-->
<?php
if($user_role=='admin')
{
	if(!$idTagihan==null)
	{
?>
		<span><b>Membuat baris tagihan baru:</b></span>
		<div class="form" style="border: 1px solid #C9E0ED">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'create-baris-tagihan-form',
			'enableAjaxValidation'=>false,
			'action'=>'index.php?r=tagihan/createBarisTagihan',
		)); 
	if($model==null)
		$model = new CreateBarisTagihanForm;
?>
	<table>
		<tr>
			<td><?php echo $form->labelEx($model,'details'); ?></td>
		</tr>

		
		<tr>
			<td><?php echo $form->textArea($model,'details',array('rows'=>2, 'cols'=>30)); ?></td>
			<td><?php echo $form->error($model,'details'); ?></td>
		</tr>
	</table>
	<table>
		<tr>
			<td><?php echo $form->labelEx($model,'biaya'); ?></td>
			<td><?php echo $form->labelEx($model,'status'); ?></td>
			<td><?php echo $form->labelEx($model,'Tagihan_id'); ?></td>
		</tr>

		<tr>
			<td><?php echo $form->textField($model,'biaya',array('size'=>8,'maxlength'=>8,)); ?></td>
			<td><?php echo $form->dropDownList($model,'status', array(0=>'belum disetujui',1=>'disetujui')); ?></td>
			<td><?php echo $form->textField($model,'Tagihan_id', array('size'=>5,'maxlength'=>5,'value'=>$idTagihan,'readonly'=>true)); ?></td>
		</tr>

		<tr>
			<td><?php echo $form->error($model,'biaya',array('size'=>5,'maxlength'=>5)); ?></td>			
			<td><?php echo $form->error($model,'status',array('size'=>5,'maxlength'=>5)); ?></td>
			<td><?php echo $form->error($model,'Tagihan_id',array('size'=>5,'maxlength'=>5)); ?></td>
			<td><?php echo $form->textField($model,'siswa_id', array('value'=>$idSiswa, 'style'=>'display:none;')); ?></td>
		</tr>
	
		<tr>
			<td><?php echo CHtml::submitButton('Save'); ?></td>
		</tr>
	</table>

<?php $this->endWidget(); ?>
<?php
	}
}
?>
	</div><!-- form -->
