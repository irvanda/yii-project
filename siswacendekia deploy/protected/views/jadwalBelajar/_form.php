<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'jadwal-belajar-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'hari'); ?>
		<?php echo $form->textField($model,'hari',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'hari'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jam_mulai'); ?>
		<?php echo $form->textField($model,'jam_mulai'); ?>
		<?php echo $form->error($model,'jam_mulai'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jam_selesai'); ?>
		<?php echo $form->textField($model,'jam_selesai'); ?>
		<?php echo $form->error($model,'jam_selesai'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pelajaran'); ?>
		<?php echo $form->textField($model,'pelajaran',array('size'=>35,'maxlength'=>35)); ?>
		<?php echo $form->error($model,'pelajaran'); ?>
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