<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'informasi-form',
	'enableAjaxValidation'=>false,
)); 
/*
$url=Yii::app()->request->baseUrl.'/javascript/latest/markitup/jquery.markitup.js';
Yii::app()->clientScript->registerScriptFile($url, CClientScript::POS_HEAD);
$url=Yii::app()->request->baseUrl.'/javascript/latest/markitup/sets/default/set.js';
Yii::app()->clientScript->registerScriptFile($url, CClientScript::POS_HEAD);

$url=Yii::app()->request->baseUrl.'/javascript/latest/markitup/skins/markitup/style.css';
Yii::app()->clientScript->registerCssFile($url);
$url=Yii::app()->request->baseUrl.'/javascript/latest/markitup/sets/default/style.css';
Yii::app()->clientScript->registerCssFile($url);

Yii::app()->clientScript->registerScript('texteditor', 
'$(document).ready(function() {
      $("#myTextArea").markItUp(mySettings);
	});', CClientScript::POS_HEAD);
	
CPSMarkItUpWidget::create( array( 'id' => 'myTextArea' ) );*/

?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php 
		$this->widget('ext.ckeditor.CKEditorWidget',array(
		  "model"=>$model,                 # Data-Model
		  "attribute"=>'content',          # Attribute in the Data-Model
		  "defaultValue"=>"Test Text",     # Optional
		 
		  # Additional Parameter (Check http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.config.html)
		  "config" => array(
			  "height"=>"400px",
			  "width"=>"100%",
			  "toolbar"=>"Full",
			  ),
 
			) );
/*
			$this->widget('application.components.widgets.XHeditor',array(
                'model'=>$model,
                'modelAttribute'=>'content',
                'showModelAttributeValue'=>false, // defaults to true, displays the value of $modelInstance->attribute in the textarea
                'config'=>array(
                    'id'=>'xh1',
                    'name'=>'xh',
                    'tools'=>'mini', // mini, simple, fill or from XHeditor::$_tools
                    'width'=>'100%',
                    //see XHeditor::$_configurableAttributes for more
                ),
			));
			*/
		//echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50, 'id'=>'myTextArea')); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->