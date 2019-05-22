<div>
	<br />
	<br />
	<br />
	<?php if(Yii::app()->user->isGuest){?>
	<p style='font-size: 20pt; text-align: center'>Please login first</p>
	<?php 
		}else{
			$this->redirect(array('site/index'));
		}
	?>
	
</div>