<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'laporan-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'detail'); ?>
		<?php echo $form->textArea($model,'detail',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'detail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Pengajar_User_id'); ?>
		<?php echo $form->textField($model,'Pengajar_User_id'); ?>
		<?php echo $form->error($model,'Pengajar_User_id'); ?>
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