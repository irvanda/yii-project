<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pelajaran-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_pelajaran'); ?>
		<?php echo $form->textField($model,'nama_pelajaran',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'nama_pelajaran'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tingkatan'); ?>
		<?php echo $form->textField($model,'tingkatan'); ?>
		<?php echo $form->error($model,'tingkatan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'harga'); ?>
		<?php echo $form->textField($model,'harga'); ?>
		<?php echo $form->error($model,'harga'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->