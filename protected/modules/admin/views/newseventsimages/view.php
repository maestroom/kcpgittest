<?php
/* @var $this NewseventsimagesController */
/* @var $model NewsEventsImages */
?>

<?php
$this->breadcrumbs=array(
	'News Events Images'=>array('index'),
	$model->id,
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List NewsEventsImages', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create NewsEventsImages', 'url'=>array('create')),
	array('icon' => 'glyphicon glyphicon-edit','label'=>'Update NewsEventsImages', 'url'=>array('update', 'id'=>$model->id)),
	array('icon' => 'glyphicon glyphicon-minus-sign','label'=>'Delete NewsEventsImages', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage NewsEventsImages', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('View','NewsEventsImages '.$model->id) ?>

<?php $this->widget('zii.widgets.CDetailView',array(
	'htmlOptions' => array(
		'class' => 'table table-striped table-condensed table-hover',
	),
	'data'=>$model,
	'attributes'=>array(
		'id',
		'news_event_id',
		'path',
		'view_order',
		'status',
	),
)); ?>