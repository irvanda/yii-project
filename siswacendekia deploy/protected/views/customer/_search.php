<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'User_id'); ?>
		<?php echo $form->textField($model,'User_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tanggal_lahir'); ?>
		<?php echo $form->textField($model,'tanggal_lahir'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tempat_lahir'); ?>
		<?php echo $form->textField($model,'tempat_lahir',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alamat_rumah'); ?>
		<?php echo $form->textField($model,'alamat_rumah',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'asal_sekolah'); ?>
		<?php echo $form->textField($model,'asal_sekolah',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alamat_sekolah'); ?>
		<?php echo $form->textField($model,'alamat_sekolah',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kelas_jurusan'); ?>
		<?php echo $form->textField($model,'kelas_jurusan',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_hp'); ?>
		<?php echo $form->textField($model,'no_hp',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'facebook'); ?>
		<?php echo $form->textField($model,'facebook',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'anak_ke'); ?>
		<?php echo $form->textField($model,'anak_ke'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jumlah_saudara'); ?>
		<?php echo $form->textField($model,'jumlah_saudara'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cita_cita'); ?>
		<?php echo $form->textArea($model,'cita_cita',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hobi'); ?>
		<?php echo $form->textArea($model,'hobi',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'moto'); ?>
		<?php echo $form->textArea($model,'moto',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mapel_disukai'); ?>
		<?php echo $form->textArea($model,'mapel_disukai',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mapel_tidak_disukai'); ?>
		<?php echo $form->textArea($model,'mapel_tidak_disukai',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'orangtua_id'); ?>
		<?php echo $form->textField($model,'orangtua_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>14,'maxlength'=>14)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->