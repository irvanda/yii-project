<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hari')); ?>:</b>
	<?php echo CHtml::encode($data->hari); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jam_mulai')); ?>:</b>
	<?php echo CHtml::encode($data->jam_mulai); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jam_selesai')); ?>:</b>
	<?php echo CHtml::encode($data->jam_selesai); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pelajaran')); ?>:</b>
	<?php echo CHtml::encode($data->pelajaran); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Customer_User_id')); ?>:</b>
	<?php echo CHtml::encode($data->Customer_User_id); ?>
	<br />


</div>