<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
	<?php echo CHtml::encode($data->image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dates')); ?>:</b>
	<?php echo CHtml::encode($data->dates); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('User_ID')); ?>:</b>
	<?php echo CHtml::encode($data->User_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Informasi_idInformasi')); ?>:</b>
	<?php echo CHtml::encode($data->Informasi_idInformasi); ?>
	<br />


</div>