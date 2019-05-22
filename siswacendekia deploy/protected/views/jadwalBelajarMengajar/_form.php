<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'jadwal-belajar-mengajar-form',
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
<?php if((Yii::app()->user->getState('role')=='admin')){ ?>
	<div class="row">
		<?php echo $form->labelEx($model,'Pengajar_User_id'); ?>
		<?php echo $form->textField($model,'Pengajar_User_id'); ?>
		<?php echo $form->error($model,'Pengajar_User_id'); ?>
	</div>
<?php } ?>
	<div class="row">
		<?php echo $form->labelEx($model,'pelajaran'); ?>
		<?php echo $form->textArea($model,'pelajaran',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'pelajaran'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Customer_User_id'); ?>
<?php 
	if($model->Customer_User_id==null){
		echo $form->textField($model,'Customer_User_id', array('value'=>(Yii::app()->user->id), 'readonly'=>true)); 
	}else{
 		echo $form->textField($model,'Customer_User_id', array('readonly'=>true));
	}
?>

		<?php echo $form->error($model,'Customer_User_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->