<?php
/* @var $this PropertyvideosController */
/* @var $model PropertyVideos */
?>

<?php
$this->breadcrumbs=array(
	'Property Videoses'=>array('index'),
	$model->id,
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List PropertyVideos', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create PropertyVideos', 'url'=>array('create')),
	array('icon' => 'glyphicon glyphicon-edit','label'=>'Update PropertyVideos', 'url'=>array('update', 'id'=>$model->id)),
	array('icon' => 'glyphicon glyphicon-minus-sign','label'=>'Delete PropertyVideos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage PropertyVideos', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('View','PropertyVideos '.$model->id) ?>

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