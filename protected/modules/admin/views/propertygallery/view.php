<?php
/* @var $this PropertygalleryController */
/* @var $model PropertyGallery */
?>

<?php
$this->breadcrumbs=array(
	'Property Galleries'=>array('index'),
	$model->id,
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List PropertyGallery', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create PropertyGallery', 'url'=>array('create')),
	array('icon' => 'glyphicon glyphicon-edit','label'=>'Update PropertyGallery', 'url'=>array('update', 'id'=>$model->id)),
	array('icon' => 'glyphicon glyphicon-minus-sign','label'=>'Delete PropertyGallery', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage PropertyGallery', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('View','PropertyGallery '.$model->id) ?>

<?php $this->widget('zii.widgets.CDetailView',array(
	'htmlOptions' => array(
		'class' => 'table table-striped table-condensed table-hover',
	),
	'data'=>$model,
	'attributes'=>array(
		'id',
		'property_id',
		'path',
		'view_order',
		'status',
	),
)); ?>