<?php
$url=Yii::app()->request->baseUrl.'/javascript/tinymce/jscripts/tiny_mce/tiny_mce.js';
Yii::app()->clientScript->registerScriptFile($url, CClientScript::POS_HEAD);
$url2=Yii::app()->request->baseUrl.'/javascript/tiny_mce_std_conf.js';
Yii::app()->clientScript->registerScriptFile($url2, CClientScript::POS_HEAD);
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'feedback-form',
	'enableAjaxValidation'=>false,
	//'method'=>'POST',
	'action'=>'index.php?r=feedback/create',
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
	<h4>Feedback untuk tanggal <?php echo date("d M Y", time());?> </h4> 
	</br>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'konten'); ?>
		<?php echo $form->textArea($model,'konten',array('rows'=>16, 'cols'=>60)); ?>
		<?php echo $form->error($model,'konten'); ?>
	</div>
	
	<!--
	<div class="row">
		<?php //echo $form->labelEx($model,'Customer_User_id'); ?>
		<?php //echo $form->textField($model,'Customer_User_id'); ?>
		<?php //echo $form->error($model,'Customer_User_id'); ?>
	</div> -->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->