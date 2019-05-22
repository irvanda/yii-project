<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_pelajaran')); ?>:</b>
	<?php echo CHtml::encode($data->nama_pelajaran); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tingkatan')); ?>:</b>
	<?php echo CHtml::encode($data->tingkatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('harga')); ?>:</b>
	<?php echo CHtml::encode($data->harga); ?>
	<br />


</div>