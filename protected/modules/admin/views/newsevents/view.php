<?php
/* @var $this NewseventsController */
/* @var $model NewsEvents */
?>

<?php
$this->breadcrumbs=array(
	'News Events'=>array('index'),
	$model->title,
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List NewsEvents', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create NewsEvents', 'url'=>array('create')),
	array('icon' => 'glyphicon glyphicon-edit','label'=>'Update NewsEvents', 'url'=>array('update', 'id'=>$model->id)),
	array('icon' => 'glyphicon glyphicon-minus-sign','label'=>'Delete NewsEvents', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage NewsEvents', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('View','NewsEvents '.$model->id) ?>

<?php $this->widget('zii.widgets.CDetailView',array(
	'htmlOptions' => array(
		'class' => 'table table-striped table-condensed table-hover',
	),
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'content',
		'date',
		'view_order',
		'status',
	),
)); ?>