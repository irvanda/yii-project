<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'image-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->textArea($model,'image',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dates'); ?>
		<?php echo $form->textField($model,'dates'); ?>
		<?php echo $form->error($model,'dates'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'User_ID'); ?>
		<?php echo $form->textField($model,'User_ID'); ?>
		<?php echo $form->error($model,'User_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Informasi_idInformasi'); ?>
		<?php echo $form->textField($model,'Informasi_idInformasi'); ?>
		<?php echo $form->error($model,'Informasi_idInformasi'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->