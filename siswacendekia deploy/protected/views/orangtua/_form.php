<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'orangtua-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_ayah'); ?>
		<?php echo $form->textField($model,'nama_ayah',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nama_ayah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tempat_lahir_ayah'); ?>
		<?php echo $form->textField($model,'tempat_lahir_ayah',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'tempat_lahir_ayah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tanggal_lahir_ayah'); ?>
		<?php echo $form->textField($model,'tanggal_lahir_ayah'); ?>
		<?php echo $form->error($model,'tanggal_lahir_ayah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pekerjaan_ayah'); ?>
		<?php echo $form->textField($model,'pekerjaan_ayah',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'pekerjaan_ayah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_telp_ayah'); ?>
		<?php echo $form->textField($model,'no_telp_ayah',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'no_telp_ayah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_ayah'); ?>
		<?php echo $form->textField($model,'email_ayah',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'email_ayah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'facebook_ayah'); ?>
		<?php echo $form->textField($model,'facebook_ayah',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'facebook_ayah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_ibu'); ?>
		<?php echo $form->textField($model,'nama_ibu',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nama_ibu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tempat_lahir_ibu'); ?>
		<?php echo $form->textField($model,'tempat_lahir_ibu',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'tempat_lahir_ibu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tanggal_lahir_ibu'); ?>
		<?php echo $form->textField($model,'tanggal_lahir_ibu'); ?>
		<?php echo $form->error($model,'tanggal_lahir_ibu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alamat_ayah'); ?>
		<?php echo $form->textArea($model,'alamat_ayah',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'alamat_ayah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alamat_ibu'); ?>
		<?php echo $form->textArea($model,'alamat_ibu',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'alamat_ibu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pekerjaan_ibu'); ?>
		<?php echo $form->textField($model,'pekerjaan_ibu',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'pekerjaan_ibu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_telp_ibu'); ?>
		<?php echo $form->textField($model,'no_telp_ibu',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'no_telp_ibu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_ibu'); ?>
		<?php echo $form->textField($model,'email_ibu',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'email_ibu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'facebook_ibu'); ?>
		<?php echo $form->textField($model,'facebook_ibu',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'facebook_ibu'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->