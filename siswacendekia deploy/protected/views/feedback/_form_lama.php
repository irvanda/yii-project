<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'feedback-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'konten'); ?>
		<?php echo $form->textArea($model,'konten',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'konten'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tanggal'); ?>
		<?php echo $form->textField($model,'tanggal'); ?>
		<?php echo $form->error($model,'tanggal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Customer_User_id'); ?>
		<?php echo $form->textField($model,'Customer_User_id'); ?>
		<?php echo $form->error($model,'Customer_User_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->