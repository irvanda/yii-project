<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('User_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->User_id), array('view', 'id'=>$data->User_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_lahir')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_lahir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tempat_lahir')); ?>:</b>
	<?php echo CHtml::encode($data->tempat_lahir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat_rumah')); ?>:</b>
	<?php echo CHtml::encode($data->alamat_rumah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('asal_sekolah')); ?>:</b>
	<?php echo CHtml::encode($data->asal_sekolah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat_sekolah')); ?>:</b>
	<?php echo CHtml::encode($data->alamat_sekolah); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('kelas_jurusan')); ?>:</b>
	<?php echo CHtml::encode($data->kelas_jurusan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_hp')); ?>:</b>
	<?php echo CHtml::encode($data->no_hp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('facebook')); ?>:</b>
	<?php echo CHtml::encode($data->facebook); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('anak_ke')); ?>:</b>
	<?php echo CHtml::encode($data->anak_ke); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jumlah_saudara')); ?>:</b>
	<?php echo CHtml::encode($data->jumlah_saudara); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cita_cita')); ?>:</b>
	<?php echo CHtml::encode($data->cita_cita); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hobi')); ?>:</b>
	<?php echo CHtml::encode($data->hobi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('moto')); ?>:</b>
	<?php echo CHtml::encode($data->moto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mapel_disukai')); ?>:</b>
	<?php echo CHtml::encode($data->mapel_disukai); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mapel_tidak_disukai')); ?>:</b>
	<?php echo CHtml::encode($data->mapel_tidak_disukai); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('orangtua_id')); ?>:</b>
	<?php echo CHtml::encode($data->orangtua_id); ?>
	<br />
	*/?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	 

</div>