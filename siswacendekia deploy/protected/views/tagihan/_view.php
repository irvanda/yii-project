<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bulan')); ?>:</b>
	<?php echo CHtml::encode($data->bulan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tahun')); ?>:</b>
	<?php echo CHtml::encode($data->tahun); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_pembayaran')); ?>:</b>
	<?php echo CHtml::encode($data->status_pembayaran); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('persetujuan')); ?>:</b>
	<?php echo CHtml::encode($data->persetujuan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Customer_User_id')); ?>:</b>
	<?php echo CHtml::encode($data->Customer_User_id); ?>
	<br />


</div>