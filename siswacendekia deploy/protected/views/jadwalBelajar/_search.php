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
		<?php echo $form->label($model,'hari'); ?>
		<?php echo $form->textField($model,'hari',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jam_mulai'); ?>
		<?php echo $form->textField($model,'jam_mulai'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jam_selesai'); ?>
		<?php echo $form->textField($model,'jam_selesai'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pelajaran'); ?>
		<?php echo $form->textField($model,'pelajaran',array('size'=>35,'maxlength'=>35)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Customer_User_id'); ?>
		<?php echo $form->textField($model,'Customer_User_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->