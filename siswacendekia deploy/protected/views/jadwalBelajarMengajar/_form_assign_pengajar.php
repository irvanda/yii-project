<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'assign-pengajar-form',
	'enableAjaxValidation'=>false,
)); 
//$url=Yii::app()->request->baseUrl.'/javascript/tagihan.js';


?>

<table>
	<tr>
		<td>
		
			<?php echo $form->labelEx($model,'hari'); ?>
			<?php echo $form->textField($model,'hari',array('size'=>6,'maxlength'=>6)); ?>
			<?php echo $form->error($model,'hari'); ?>
		</td>
		<td>
			<?php echo $form->labelEx($model,'jam_mulai'); ?>
			<?php echo $form->textField($model,'jam_mulai'); ?>
			<?php echo $form->error($model,'jam_mulai'); ?>
		</td>
		<td>
			<?php echo $form->labelEx($model,'jam_selesai'); ?>
			<?php echo $form->textField($model,'jam_selesai'); ?>
			<?php echo $form->error($model,'jam_selesai'); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo $form->labelEx($model,'Pengajar_User_id'); ?>
			<?php echo $form->textField($model,'Pengajar_User_id'); ?>
			<?php echo $form->error($model,'Pengajar_User_id'); ?>
		</td>
		<td>
			<?php echo $form->labelEx($model,'pelajaran'); ?>
			<?php echo $form->textField($model,'pelajaran',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'pelajaran'); ?>
		</td>
		<td>
			<?php echo $form->labelEx($model,'Customer_User_id'); ?>
			<?php echo $form->textField($model,'Customer_User_id'); ?>
			<?php echo $form->error($model,'Customer_User_id'); ?>
		</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td>
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
		</td>
	</tr>
<?php $this->endWidget(); ?>
</table>
</div><!-- form -->