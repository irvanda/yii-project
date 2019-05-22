<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'image'); ?>
		<?php echo $form->textArea($model,'image',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dates'); ?>
		<?php echo $form->textField($model,'dates'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'User_ID'); ?>
		<?php echo $form->textField($model,'User_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Informasi_idInformasi'); ?>
		<?php echo $form->textField($model,'Informasi_idInformasi'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->