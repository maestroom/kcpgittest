<?php
/* @var $this PropertyController */
/* @var $model Property */
?>

<?php
$this->breadcrumbs=array(
	'Properties'=>array('index'),
	$model->title,
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List Property', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create Property', 'url'=>array('create')),
	array('icon' => 'glyphicon glyphicon-edit','label'=>'Update Property', 'url'=>array('update', 'id'=>$model->id)),
	array('icon' => 'glyphicon glyphicon-minus-sign','label'=>'Delete Property', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage Property', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('View','Property '.$model->id) ?>

<?php $this->widget('zii.widgets.CDetailView',array(
	'htmlOptions' => array(
		'class' => 'table table-striped table-condensed table-hover',
	),
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'type',
		'sqft',
		'master_plan',
		'map_location',
		'overview',
		'specifications',
		'builder',
		'amenities',
		'view_order',
		'status',
	),
)); ?>