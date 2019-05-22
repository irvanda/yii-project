<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tagihan-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'bulan'); ?>
		<?php echo $form->textField($model,'bulan',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'bulan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tahun'); ?>
		<?php echo $form->textField($model,'tahun',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'tahun'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_pembayaran'); ?>
		<?php echo $form->textField($model,'status_pembayaran'); ?>
		<?php echo $form->error($model,'status_pembayaran'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'persetujuan'); ?>
		<?php echo $form->textField($model,'persetujuan'); ?>
		<?php echo $form->error($model,'persetujuan'); ?>
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