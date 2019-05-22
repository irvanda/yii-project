<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'create-user-form',
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php if(Yii::app()->user->getState('role')=='admin'){ ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php }else{ ?>
		<?php echo $form->textField($model,'username', array("readonly"=>true)); ?>
		<?php } ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password2'); ?>
		<?php echo $form->passwordField($model,'password2'); ?>
		<?php echo $form->error($model,'password2'); ?>
	</div>
	<?php if(Yii::app()->user->getState('role')=='admin') {?>
	<div class="row">
		<?php echo $form->labelEx($model,'role'); ?>
		<?php echo $form->dropDownList($model,'role', CHtml::listData(Role::model()->findAll(), 'id', 'role'), array('empty'=>'--Select Role--')); ?>
		<?php echo $form->error($model,'role'); ?>
	</div>
	<?php } ?>
	<div class="row">
		<?php echo $form->labelEx($model,'avatar'); ?>
		<?php echo $form->fileField($model,'avatar',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'avatar'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Simpan'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->