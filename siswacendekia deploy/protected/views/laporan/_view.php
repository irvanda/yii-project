<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detail')); ?>:</b>
	<?php echo CHtml::encode($data->detail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pengajar_User_id')); ?>:</b>
	<?php echo CHtml::encode($data->Pengajar_User_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Customer_User_id')); ?>:</b>
	<?php echo CHtml::encode($data->Customer_User_id); ?>
	<br />


</div>