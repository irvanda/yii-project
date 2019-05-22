<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pengajar-registration-form',
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php
			if(Yii::app()->user->getState('role')=='admin'){
				echo $form->textField($model,'username'); 
			}else{
				echo $form->textField($model,'username', array('readonly'=>true));
			}
		?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password', array('value'=>'')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password2'); ?>
		<?php echo $form->passwordField($model,'password2'); ?>
		<?php echo $form->error($model,'password2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'avatar'); ?>
		<?php echo $form->fileField($model,'avatar',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'avatar'); ?>
	</div>
	
	<!--data pengajar-->
	<div class="row">
		<?php echo $form->labelEx($model,'nama_lengkap'); ?>
		<?php echo $form->textField($model,'nama_lengkap',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'nama_lengkap'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_panggilan'); ?>
		<?php echo $form->textField($model,'nama_panggilan',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'nama_panggilan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alamat_rumah'); ?>
		<?php echo $form->textArea($model,'alamat_rumah',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'alamat_rumah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alamat_kost'); ?>
		<?php echo $form->textArea($model,'alamat_kost',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'alamat_kost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_hp'); ?>
		<?php echo $form->textField($model,'no_hp',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'no_hp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_rekening'); ?>
		<?php echo $form->textField($model,'no_rekening',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'no_rekening'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fakultas'); ?>
		<?php echo $form->textField($model,'fakultas',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'fakultas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jurusan'); ?>
		<?php echo $form->textField($model,'jurusan',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'jurusan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'angkatan'); ?>
		<?php echo $form->textField($model,'angkatan',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'angkatan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ipk'); ?>
		<?php echo $form->textField($model,'ipk',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'ipk'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tempat_lahir'); ?>
		<?php echo $form->textField($model,'tempat_lahir',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'tempat_lahir'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tanggal_lahir'); ?>
		<?php 
			$this->widget('zii.widgets.jui.CJuiDatePicker', array( 
			'model'=>$model, 'attribute'=>'tanggal_lahir','options'=>array( 'dateFormat'=>'yy-mm-dd',
			'showAnim'=>'fold',
			'gotoCurrent'=>true,
			),
			'htmlOptions'=>array( 'style'=>'height:20px;' ), 
			)); 
		?>
		<?php echo $form->error($model,'tanggal_lahir'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kemampuan_bahasa'); ?>
		<?php echo $form->textArea($model,'kemampuan_bahasa',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'kemampuan_bahasa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hobby'); ?>
		<?php echo $form->textArea($model,'hobby',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'hobby'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cita_cita'); ?>
		<?php echo $form->textArea($model,'cita_cita',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'cita_cita'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'karakter'); ?>
		<?php echo $form->textArea($model,'karakter',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'karakter'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kendaraan'); ?>
		<?php echo $form->textField($model,'kendaraan',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'kendaraan'); ?>
	</div>
	
	<br />
	<!--Pelajaran form-->
	<div class="checkbox_pelajaran">
		<?php echo $form->labelEx($model,'Pelajaran_id'); ?>
		<?php echo $form->checkBoxList($model,'Pelajaran_id', CHtml::listData(Pelajaran::model()->findAll(), 'id','nama_pelajaran'), array('separator'=>'','labelOptions'=>array('style'=>'display:inline', 'class'=>'checkbox'))); ?>
		<?php echo $form->error($model,'Pelajaran_id'); ?>
	</div>	
	
	<?php if(Yii::app()->user->getState('role')=='admin'){?>
	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',array(2=>'belum diterima', 1=>'diterima', 3=>'tidak diterima'), array('options' => array($num =>array('selected'=>true)))); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>
	<?php }?>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
