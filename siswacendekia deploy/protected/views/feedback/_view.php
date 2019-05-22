<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal); ?>
	<br />
	<?php
		$customer = Customer::model()->find("User_id=?", array($data->Customer_User_id));
	?>
	<b>Customer:</b><?php echo " ".$customer->nama; ?>
	<br />

	<b>Isi feedback:</b><?php echo " ".$data->konten; ?>
	
	<br />

</div>