<?php
/* @var $this PropertyneighbourhoodsController */
/* @var $model PropertyNeighbourhoods */
?>

<?php
$this->breadcrumbs=array(
	'Property Neighbourhoods'=>array('index'),
	$model->title,
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List PropertyNeighbourhoods', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create PropertyNeighbourhoods', 'url'=>array('create')),
	array('icon' => 'glyphicon glyphicon-edit','label'=>'Update PropertyNeighbourhoods', 'url'=>array('update', 'id'=>$model->id)),
	array('icon' => 'glyphicon glyphicon-minus-sign','label'=>'Delete PropertyNeighbourhoods', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage PropertyNeighbourhoods', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('View','PropertyNeighbourhoods '.$model->id) ?>

<?php $this->widget('zii.widgets.CDetailView',array(
	'htmlOptions' => array(
		'class' => 'table table-striped table-condensed table-hover',
	),
	'data'=>$model,
	'attributes'=>array(
		'id',
		'property_id',
		'title',
		'content',
		'path',
		'view_order',
		'status',
	),
)); ?>