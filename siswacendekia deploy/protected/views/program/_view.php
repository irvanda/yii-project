<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_program')); ?>:</b>
	<?php echo CHtml::encode($data->nama_program); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deskripsi_program')); ?>:</b>
	<?php echo CHtml::encode($data->deskripsi_program); ?>
	<br />


</div>