<?php
$this->breadcrumbs=array(
	'Pengajars'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Pengajar', 'url'=>array('index')),
	array('label'=>'Create Pengajar', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('pengajar-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Pengajar</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pengajar-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'User_id',
		'nama_lengkap',
		'nama_panggilan',
		'alamat_kost',
		'no_hp',
		'status',
		/*
		'no_rekening',
		'fakultas',
		'jurusan',
		'status',
		'angkatan',
		'ipk',
		'tempat_lahir',
		'tanggal_lahir',
		'kemampuan_bahasa',
		'hobby',
		'cita_cita',
		'karakter',
		'kendaraan',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
