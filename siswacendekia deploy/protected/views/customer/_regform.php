<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'customer-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nama'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'nama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tanggal_lahir'); ?>
		<?php echo $form->textField($model,'tanggal_lahir'); ?>
		<?php echo $form->error($model,'tanggal_lahir'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tempat_lahir'); ?>
		<?php echo $form->textField($model,'tempat_lahir',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'tempat_lahir'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alamat_rumah'); ?>
		<?php echo $form->textField($model,'alamat_rumah',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'alamat_rumah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'asal_sekolah'); ?>
		<?php echo $form->textField($model,'asal_sekolah',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'asal_sekolah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alamat_sekolah'); ?>
		<?php echo $form->textField($model,'alamat_sekolah',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'alamat_sekolah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kelas_jurusan'); ?>
		<?php echo $form->textField($model,'kelas_jurusan',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'kelas_jurusan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_hp'); ?>
		<?php echo $form->textField($model,'no_hp',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'no_hp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'facebook'); ?>
		<?php echo $form->textField($model,'facebook',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'facebook'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'anak_ke'); ?>
		<?php echo $form->textField($model,'anak_ke'); ?>
		<?php echo $form->error($model,'anak_ke'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jumlah_saudara'); ?>
		<?php echo $form->textField($model,'jumlah_saudara'); ?>
		<?php echo $form->error($model,'jumlah_saudara'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cita_cita'); ?>
		<?php echo $form->textArea($model,'cita_cita',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'cita_cita'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hobi'); ?>
		<?php echo $form->textArea($model,'hobi',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'hobi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'moto'); ?>
		<?php echo $form->textArea($model,'moto',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'moto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mapel_disukai'); ?>
		<?php echo $form->textArea($model,'mapel_disukai',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'mapel_disukai'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mapel_tidak_disukai'); ?>
		<?php echo $form->textArea($model,'mapel_tidak_disukai',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'mapel_tidak_disukai'); ?>
	</div>

	<hr />
	<!--Orangtua form-->
	<?php echo $form->errorSummary($modelorangtua); ?>

	<div class="row">
		<?php echo $form->labelEx($modelorangtua,'nama_ayah'); ?>
		<?php echo $form->textField($modelorangtua,'nama_ayah',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($modelorangtua,'nama_ayah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelorangtua,'tempat_lahir_ayah'); ?>
		<?php echo $form->textField($modelorangtua,'tempat_lahir_ayah',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($modelorangtua,'tempat_lahir_ayah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelorangtua,'tanggal_lahir_ayah'); ?>
		<?php echo $form->textField($modelorangtua,'tanggal_lahir_ayah'); ?>
		<?php echo $form->error($modelorangtua,'tanggal_lahir_ayah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelorangtua,'pekerjaan_ayah'); ?>
		<?php echo $form->textField($modelorangtua,'pekerjaan_ayah',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($modelorangtua,'pekerjaan_ayah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelorangtua,'no_telp_ayah'); ?>
		<?php echo $form->textField($modelorangtua,'no_telp_ayah',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($modelorangtua,'no_telp_ayah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelorangtua,'email_ayah'); ?>
		<?php echo $form->textField($modelorangtua,'email_ayah',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($modelorangtua,'email_ayah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelorangtua,'facebook_ayah'); ?>
		<?php echo $form->textField($modelorangtua,'facebook_ayah',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($modelorangtua,'facebook_ayah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelorangtua,'nama_ibu'); ?>
		<?php echo $form->textField($modelorangtua,'nama_ibu',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($modelorangtua,'nama_ibu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelorangtua,'tempat_lahir_ibu'); ?>
		<?php echo $form->textField($modelorangtua,'tempat_lahir_ibu',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($modelorangtua,'tempat_lahir_ibu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelorangtua,'tanggal_lahir_ibu'); ?>
		<?php echo $form->textField($modelorangtua,'tanggal_lahir_ibu'); ?>
		<?php echo $form->error($modelorangtua,'tanggal_lahir_ibu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelorangtua,'alamat_ayah'); ?>
		<?php echo $form->textArea($modelorangtua,'alamat_ayah',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($modelorangtua,'alamat_ayah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelorangtua,'alamat_ibu'); ?>
		<?php echo $form->textArea($modelorangtua,'alamat_ibu',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($modelorangtua,'alamat_ibu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelorangtua,'pekerjaan_ibu'); ?>
		<?php echo $form->textField($modelorangtua,'pekerjaan_ibu',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($modelorangtua,'pekerjaan_ibu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelorangtua,'no_telp_ibu'); ?>
		<?php echo $form->textField($modelorangtua,'no_telp_ibu',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($modelorangtua,'no_telp_ibu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelorangtua,'email_ibu'); ?>
		<?php echo $form->textField($modelorangtua,'email_ibu',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($modelorangtua,'email_ibu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelorangtua,'facebook_ibu'); ?>
		<?php echo $form->textField($modelorangtua,'facebook_ibu',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($modelorangtua,'facebook_ibu'); ?>
	</div>
	
	<hr />
	<!--User form-->
	
	<?php echo $form->errorSummary($modeluser); ?>

	<div class="row">
		<?php echo $form->labelEx($modeluser,'username'); ?>
		<?php echo $form->textField($modeluser,'username',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($modeluser,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modeluser,'password'); ?>
		<?php echo $form->passwordField($modeluser,'password',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($modeluser,'password'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->