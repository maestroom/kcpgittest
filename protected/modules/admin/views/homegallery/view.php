<?php
/* @var $this HomegalleryController */
/* @var $model HomeGallery */
?>

<?php
$this->breadcrumbs=array(
	'Home Galleries'=>array('index'),
	$model->title,
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List HomeGallery', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create HomeGallery', 'url'=>array('create')),
	array('icon' => 'glyphicon glyphicon-edit','label'=>'Update HomeGallery', 'url'=>array('update', 'id'=>$model->id)),
	array('icon' => 'glyphicon glyphicon-minus-sign','label'=>'Delete HomeGallery', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage HomeGallery', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('View','HomeGallery '.$model->id) ?>

<?php $this->widget('zii.widgets.CDetailView',array(
	'htmlOptions' => array(
		'class' => 'table table-striped table-condensed table-hover',
	),
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'content',
		'path',
		'view_order',
		'status',
	),
)); ?>