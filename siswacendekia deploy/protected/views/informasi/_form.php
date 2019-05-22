<?php
$url=Yii::app()->request->baseUrl.'/javascript/tinymce/jscripts/tiny_mce/tiny_mce.js';
Yii::app()->clientScript->registerScriptFile($url, CClientScript::POS_HEAD);
$url2=Yii::app()->request->baseUrl.'/javascript/tiny_mce_std_conf.js';
Yii::app()->clientScript->registerScriptFile($url2, CClientScript::POS_HEAD);
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'informasi-form',
	'enableAjaxValidation'=>false,
)); 
?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>16, 'cols'=>60)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',array('1'=>'Draft','2'=>'Published', '3'=>'Archived'),array('empty'=>'--Status--')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->