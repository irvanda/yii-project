<div class="view">
	<table>
		<tr>
			<td><b><?php echo CHtml::encode($data->getAttributeLabel('tanggal')); ?>:</b></td>
			<td><?php echo CHtml::encode($data->tanggal); ?></td>
			<td><b><?php echo CHtml::encode($data->getAttributeLabel('jam_mulai')); ?>:</b></td>
			<td><?php echo CHtml::encode($data->jam_mulai); ?></td>
			<td><b><?php echo CHtml::encode($data->getAttributeLabel('jam_selesai')); ?>:</b></td>
			<td><?php echo CHtml::encode($data->jam_selesai); ?></td>
		</tr>
	</table>
	<table>
		<tr>
			<td><b><?php echo CHtml::encode($data->getAttributeLabel('deskripsi')); ?>:</b>
			<?php echo CHtml::encode($data->deskripsi); ?></td>
		</tr>
		<tr></tr>
	</table>
</div>