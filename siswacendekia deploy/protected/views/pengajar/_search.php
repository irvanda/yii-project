<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'User_id'); ?>
		<?php echo $form->textField($model,'User_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama_lengkap'); ?>
		<?php echo $form->textField($model,'nama_lengkap',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama_panggilan'); ?>
		<?php echo $form->textField($model,'nama_panggilan',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alamat_rumah'); ?>
		<?php echo $form->textArea($model,'alamat_rumah',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alamat_kost'); ?>
		<?php echo $form->textArea($model,'alamat_kost',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_hp'); ?>
		<?php echo $form->textField($model,'no_hp',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_rekening'); ?>
		<?php echo $form->textField($model,'no_rekening',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fakultas'); ?>
		<?php echo $form->textField($model,'fakultas',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jurusan'); ?>
		<?php echo $form->textField($model,'jurusan',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>14,'maxlength'=>14)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'angkatan'); ?>
		<?php echo $form->textField($model,'angkatan',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ipk'); ?>
		<?php echo $form->textField($model,'ipk',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tempat_lahir'); ?>
		<?php echo $form->textField($model,'tempat_lahir',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tanggal_lahir'); ?>
		<?php echo $form->textField($model,'tanggal_lahir'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kemampuan_bahasa'); ?>
		<?php echo $form->textArea($model,'kemampuan_bahasa',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hobby'); ?>
		<?php echo $form->textArea($model,'hobby',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cita_cita'); ?>
		<?php echo $form->textArea($model,'cita_cita',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'karakter'); ?>
		<?php echo $form->textArea($model,'karakter',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kendaraan'); ?>
		<?php echo $form->textField($model,'kendaraan',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->