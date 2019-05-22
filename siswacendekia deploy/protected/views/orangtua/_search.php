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
		<?php echo $form->label($model,'nama_ayah'); ?>
		<?php echo $form->textField($model,'nama_ayah',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tempat_lahir_ayah'); ?>
		<?php echo $form->textField($model,'tempat_lahir_ayah',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tanggal_lahir_ayah'); ?>
		<?php echo $form->textField($model,'tanggal_lahir_ayah'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pekerjaan_ayah'); ?>
		<?php echo $form->textField($model,'pekerjaan_ayah',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_telp_ayah'); ?>
		<?php echo $form->textField($model,'no_telp_ayah',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email_ayah'); ?>
		<?php echo $form->textField($model,'email_ayah',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'facebook_ayah'); ?>
		<?php echo $form->textField($model,'facebook_ayah',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama_ibu'); ?>
		<?php echo $form->textField($model,'nama_ibu',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tempat_lahir_ibu'); ?>
		<?php echo $form->textField($model,'tempat_lahir_ibu',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tanggal_lahir_ibu'); ?>
		<?php echo $form->textField($model,'tanggal_lahir_ibu'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alamat_ayah'); ?>
		<?php echo $form->textArea($model,'alamat_ayah',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alamat_ibu'); ?>
		<?php echo $form->textArea($model,'alamat_ibu',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pekerjaan_ibu'); ?>
		<?php echo $form->textField($model,'pekerjaan_ibu',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_telp_ibu'); ?>
		<?php echo $form->textField($model,'no_telp_ibu',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email_ibu'); ?>
		<?php echo $form->textField($model,'email_ibu',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'facebook_ibu'); ?>
		<?php echo $form->textField($model,'facebook_ibu',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->