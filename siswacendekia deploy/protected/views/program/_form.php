<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'program-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_program'); ?>
		<?php echo $form->textField($model,'nama_program',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'nama_program'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deskripsi_program'); ?>
		<?php echo $form->textArea($model,'deskripsi_program',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'deskripsi_program'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->