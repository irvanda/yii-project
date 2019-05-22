<?php $this->beginContent('//layouts/main'); ?>
<div class="container2">
	<div class="span-19" >
		<!--for left sidebar-->	
		<div id="left-sidebar">
			<div id="login-box">
				<?php 
					$this->widget('application.extensions.login.XLoginPortlet',array(
							'visible'=>Yii::app()->user->isGuest,
					));
					
					if(!(Yii::app()->user->isGuest))
					{
						$iduser=Yii::app()->user->id;
						$user = User::model()->find('id=?',array($iduser));
						$image=Image::model()->find('User_ID=?',array($iduser));
						
						if(!$image->image==null)
						{
							$photo = $image->image;
						}
						else
						{
							$photo = "no_photo.jpg";
						}
				?>
						<div class='foto_profil_small'>
				<?php 		echo CHtml::image((Yii::app()->baseUrl.'/images/'.$photo), ('foto '.$user->username), array("width"=>"100", "height"=>"100"));?>
						</div>
				<?php 
						$this->widget('zii.widgets.CMenu',array(
							'items'=>array(
							array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
							),
						));
					}						
				?>	
			</div>
			<hr />
			<div style='margin-left:20px'>
				<span>Informasi:</span><br />
				<?php
					$informasi=Informasi::model()->findAll();
					$i=0;
					while((!($informasi[$i]->id==null)) && $i<3)
					{
						echo '> <a href=index.php?r=informasi/view&id='.$informasi[$i]->id.'>'.$informasi[$i]->title.'</a><br />';
						$i++;
					}
				?>
			</div>
		</div>

		<div id="content" >
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
	
	<div class="span-5 last">
		<div id="sidebar">
		<?php
			if(!(Yii::app()->user->isGuest))//Yii::app()->user->getState('role')=='admin')
			{
				$this->beginWidget('zii.widgets.CPortlet', array(
					'title'=>'Operations',
				));
				$this->widget('zii.widgets.CMenu', array(
					'items'=>$this->menu,
					'htmlOptions'=>array('class'=>'operations'),
				));
				$this->endWidget();
			}
		?>
		</div><!-- sidebar -->
	</div>
	<div style="clear:both"></div>
</div>
<?php $this->endContent(); ?>