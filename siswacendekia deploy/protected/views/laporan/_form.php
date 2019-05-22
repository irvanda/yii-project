<?php
	$form=$this->beginWidget('CActiveForm', array(
	'id'=>'laporan-form',
	'enableAjaxValidation'=>true,
)); 

?>

	<b>Buat Laporan:</b>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'detail'); ?><br />
		<?php echo $form->textArea($model,'detail',array('rows'=>4, 'cols'=>61)); ?>
		<?php echo $form->error($model,'detail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Customer_User_id'); ?><br />
		<?php
			if($model->Customer_User_id==null){
				echo $form->dropDownList($model,'Customer_User_id',CHtml::listData($customer, 'Customer_User_id', 'nama'));
			}else{
				echo $form->textField($model,'Customer_User_id', array('readonly'=>true));
			}
		?>
		<?php echo $form->error($model,'Customer_User_id'); ?>
	</div>
	
	<div class="row buttons" style='float:right'>
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
