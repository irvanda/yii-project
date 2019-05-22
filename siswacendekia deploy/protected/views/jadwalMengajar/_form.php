<div class="form">
<?php
	$html = new CHtml;
	$form = $this->beginWidget('CActiveForm', array(
	'id'=>'jadwal-mengajar-form',
	'enableAjaxValidation'=>false,
	));
?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'hari'); ?>
		<?php $hari = (string)$model->hari; ?>
		<?php echo $html->activeDropDownList($model,'hari', array(
								$hari=>$hari,
								'Minggu'=> 'Minggu',
								'Senin'=> 'Senin',
								'Selasa'=> 'Selasa',
								'Rabu'=> 'Rabu',
								'Kamis'=> 'Kamis',
								'Jumat'=> 'Jumat',
								'Sabtu'=> 'Sabtu',
								));
		?>
		<?php echo $form->error($model,'hari'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jam_mulai'); ?>
		<?php $jam_mulai = $model->jam_mulai; ?>
		<?php
			  	$jam_m = split(':', $jam_mulai,3);
				$jam1 = $jam_m[0].':'.$jam_m[1];
				echo $html->activeDropDownList($model, 'jam_mulai',
					array( $jam1=> $jam1,
			  			'08:00'=> '08:00',
			  			'08:30'=> '08:30',
			  			'09:00'=> '09:00',
			  			'09:30'=> '09:30',
			  			'10:00'=> '10:00',
			  			'10:30'=> '10:30',
			  			'11:00'=> '11:00',
			  			'11:30'=> '11:30',
			  			'12:00'=> '12:00',
					    '12:30'=> '12:30',
			  			'13:00'=> '13:00',
			  			'13:30'=> '13:30',
			  			'14:00'=> '14:00',
			 			'14:30'=> '14:30',
			  			'15:00'=> '15:00',
			  			'15:30'=> '15:30',
			  			'16:00'=> '16:00',
			  			'16:30'=> '16:30',
			  			'17:00'=> '17:00',
			  			'17:30'=> '17:30',
			  			'18:00'=> '18:00',
			 			'18:30'=> '18:30',
			  			'19:00'=> '19:00',
			  			'19:30'=> '19:30',
			  			'20:00'=> '20:00'
					));
		?>
		<?php echo $form->error($model,'jam_mulai'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jam_selesai'); ?>
		<?php $jam_selesai = $model->jam_selesai; ?>
		<?php
				$jam_s = split(':', $jam_selesai,3);
				$jam2 = $jam_s[0].':'.$jam_s[1];
					echo $html->activeDropDownList($model, 'jam_selesai',
					array( $jam2=> $jam2,
					    '08:00'=> '08:00',
			  			'08:30'=> '08:30',
			  			'09:00'=> '09:00',
			  			'09:30'=> '09:30',
			  			'10:00'=> '10:00',
			  			'10:30'=> '10:30',
			  			'11:00'=> '11:00',
			  		    '11:30'=> '11:30',
			  			'12:00'=> '12:00',
			  			'12:30'=> '12:30',
			  			'13:00'=> '13:00',
			  			'13:30'=> '13:30',
			  			'14:00'=> '14:00',
			  			'14:30'=> '14:30',
			  			'15:00'=> '15:00',
			  			'15:30'=> '15:30',
			  			'16:00'=> '16:00',
			  			'16:30'=> '16:30',
			  			'17:00'=> '17:00',
			  			'17:30'=> '17:30',
			  			'18:00'=> '18:00',
			  			'18:30'=> '18:30',
			  			'19:00'=> '19:00',
			  			'19:30'=> '19:30',
			  			'20:00'=> '20:00'
					));
		?>
		<?php echo $form->error($model,'jam_selesai'); ?>
	</div>

	<div class="row">
		<?php echo $html->label('NB: Jika jadwal sudah pernah disimpan, maka anda akan dialihkan ke halaman awal dan penyimpanan dibatalkan.', false); ?>
	</div>

	<div class="row buttons">
		<?php echo $html->submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->