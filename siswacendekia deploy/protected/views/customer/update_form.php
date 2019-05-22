<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'customer-update-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<!--data siswa-->
	<div class="row">
		<?php echo $form->labelEx($model,'nama'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'nama'); ?>
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
		<?php echo $form->labelEx($model,'tempat_lahir'); ?>
		<?php echo $form->textField($model,'tempat_lahir',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'tempat_lahir'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alamat_rumah'); ?>
		<?php echo $form->textField($model,'alamat_rumah',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'alamat_rumah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'asal_sekolah'); ?>
		<?php echo $form->textField($model,'asal_sekolah',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'asal_sekolah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alamat_sekolah'); ?>
		<?php echo $form->textField($model,'alamat_sekolah',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'alamat_sekolah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kelas_jurusan'); ?>
		<?php echo $form->textField($model,'kelas_jurusan',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'kelas_jurusan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_hp'); ?>
		<?php echo $form->textField($model,'no_hp',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'no_hp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'facebook'); ?>
		<?php echo $form->textField($model,'facebook',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'facebook'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'anak_ke'); ?>
		<?php echo $form->textField($model,'anak_ke'); ?>
		<?php echo $form->error($model,'anak_ke'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jumlah_saudara'); ?>
		<?php echo $form->textField($model,'jumlah_saudara'); ?>
		<?php echo $form->error($model,'jumlah_saudara'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cita_cita'); ?>
		<?php echo $form->textArea($model,'cita_cita',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'cita_cita'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hobi'); ?>
		<?php echo $form->textArea($model,'hobi',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'hobi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'moto'); ?>
		<?php echo $form->textArea($model,'moto',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'moto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mapel_disukai'); ?>
		<?php echo $form->textArea($model,'mapel_disukai',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'mapel_disukai'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mapel_tidak_disukai'); ?>
		<?php echo $form->textArea($model,'mapel_tidak_disukai',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'mapel_tidak_disukai'); ?>
	</div>
	
	<br />
	<!--Program form-->
	<div class="radio_button_program">
		<?php echo $form->labelEx($model,'Program_id'); ?>
		<?php echo $form->radioButtonList($model,'Program_id', CHtml::listData(Program::model()->findAll(), 'id','nama_program'), array('separator'=>'','labelOptions'=>array('style'=>'display:inline', 'class'=>'radio_button'))); ?>
		<?php echo $form->error($model,'Program_id'); ?>
	</div>

	<br />
	<!--Pelajaran form-->
	<div class="checkbox_pelajaran">
		<?php echo $form->labelEx($model,'Pelajaran_id'); ?>
		<?php echo $form->checkBoxList($model,'Pelajaran_id', CHtml::listData(Pelajaran::model()->findAll(), 'id','nama_pelajaran'), array('separator'=>'','labelOptions'=>array('style'=>'display:inline', 'class'=>'checkbox'))); ?>
		<?php echo $form->error($model,'Pelajaran_id'); ?>
	</div>	
	<br />
	<!--Orang tua form-->
	<div class="row">
		<?php echo $form->labelEx($model,'nama_ayah'); ?>
		<?php echo $form->textField($model,'nama_ayah',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nama_ayah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tempat_lahir_ayah'); ?>
		<?php echo $form->textField($model,'tempat_lahir_ayah',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'tempat_lahir_ayah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tanggal_lahir_ayah'); ?>
		<?php 
			$this->widget('zii.widgets.jui.CJuiDatePicker', array( 
			'model'=>$model, 'attribute'=>'tanggal_lahir_ayah','options'=>array( 'dateFormat'=>'yy-mm-dd',
			'showAnim'=>'fold',
			'gotoCurrent'=>true,
			),
			'htmlOptions'=>array( 'style'=>'height:20px;' ), 
			)); 
		?>
		<?php echo $form->error($model,'tanggal_lahir_ayah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pekerjaan_ayah'); ?>
		<?php echo $form->textField($model,'pekerjaan_ayah',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'pekerjaan_ayah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_telp_ayah'); ?>
		<?php echo $form->textField($model,'no_telp_ayah',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'no_telp_ayah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_ayah'); ?>
		<?php echo $form->textField($model,'email_ayah',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'email_ayah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'facebook_ayah'); ?>
		<?php echo $form->textField($model,'facebook_ayah',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'facebook_ayah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_ibu'); ?>
		<?php echo $form->textField($model,'nama_ibu',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nama_ibu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tempat_lahir_ibu'); ?>
		<?php echo $form->textField($model,'tempat_lahir_ibu',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'tempat_lahir_ibu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tanggal_lahir_ibu'); ?>
		<?php 
			$this->widget('zii.widgets.jui.CJuiDatePicker', array( 
			'model'=>$model, 'attribute'=>'tanggal_lahir_ibu','options'=>array( 'dateFormat'=>'yy-mm-dd',
			'showAnim'=>'fold',
			'gotoCurrent'=>true,
			),
			'htmlOptions'=>array( 'style'=>'height:20px;' ), 
			)); 
		?>
		<?php echo $form->error($model,'tanggal_lahir_ibu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alamat_ayah'); ?>
		<?php echo $form->textArea($model,'alamat_ayah',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'alamat_ayah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alamat_ibu'); ?>
		<?php echo $form->textArea($model,'alamat_ibu',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'alamat_ibu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pekerjaan_ibu'); ?>
		<?php echo $form->textField($model,'pekerjaan_ibu',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'pekerjaan_ibu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_telp_ibu'); ?>
		<?php echo $form->textField($model,'no_telp_ibu',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'no_telp_ibu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_ibu'); ?>
		<?php echo $form->textField($model,'email_ibu',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'email_ibu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'facebook_ibu'); ?>
		<?php echo $form->textField($model,'facebook_ibu',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'facebook_ibu'); ?>
	</div>

	<?php 
			$selection = $model->status;
			if($selection=='diterima')
				$num = 1;
			else if($selection=='belum diterima')
				$num = 2;
			else if($selection=='tidak diterima')
				$num = 3;
			else
				$num = 2;
	?>
	
	<?php if(Yii::app()->user->getState('role')=='admin'){ ?>
	<div class="row">
	<?php } else{ ?>
	<div class="row" style="display:none">
	<?php } ?>
		<?php 
				echo $form->labelEx($model,'status');
				echo $form->dropDownList($model,'status',array(2=>'belum diterima', 1=>'diterima', 3=>'tidak diterima'), array('options' => array($num =>array('selected'=>true)))); 
		?>
		<?php echo $form->error($model,'status'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
