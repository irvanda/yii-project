<div class="view">
	<b>Judul: </b><?php echo CHtml::encode($data->title); ?>
			
	<?php echo ($data->content) ?>
	<br />	
	<?php 
		$user = User::model()->findByPk($data->author_id);
	?>
	<b>Penulis:</b><?php echo " ".$user->username; ?><br />
	<b>Dibuat pada tanggal:</b><?php echo " ".CHtml::encode($data->create_time); ?><br />
	<b>Diperbarui pada tanggal:</b><?php echo " ".CHtml::encode($data->update_time); ?><br />		
	<?php if(Yii::app()->user->getState('role')==admin) {?>
	<b>Status:</b><?php echo " ".CHtml::encode($data->status); ?>
	<?php }?>
	<span style="float:right"><?php echo CHtml::link('Melihat lebih lanjut', array('view', 'id'=>$data->id)); ?></span><br />
</div>
	
	