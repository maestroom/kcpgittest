<?php
/* @var $this ClientsController */
/* @var $model Clients */
?>

<?php
$this->breadcrumbs=array(
	'Clients'=>array('index'),
	$model->title,
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List Clients', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create Clients', 'url'=>array('create')),
	array('icon' => 'glyphicon glyphicon-edit','label'=>'Update Clients', 'url'=>array('update', 'id'=>$model->id)),
	array('icon' => 'glyphicon glyphicon-minus-sign','label'=>'Delete Clients', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage Clients', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('View','Clients '.$model->id) ?>

<?php $this->widget('zii.widgets.CDetailView',array(
	'htmlOptions' => array(
		'class' => 'table table-striped table-condensed table-hover',
	),
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'path',
		'view_order',
		'status',
	),
)); ?>