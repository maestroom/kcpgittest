<?php
/* @var $this PropertyphotosController */
/* @var $model PropertyPhotos */
?>

<?php
$this->breadcrumbs=array(
	'Property Photoses'=>array('index'),
	$model->id,
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List PropertyPhotos', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create PropertyPhotos', 'url'=>array('create')),
	array('icon' => 'glyphicon glyphicon-edit','label'=>'Update PropertyPhotos', 'url'=>array('update', 'id'=>$model->id)),
	array('icon' => 'glyphicon glyphicon-minus-sign','label'=>'Delete PropertyPhotos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage PropertyPhotos', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('View','PropertyPhotos '.$model->id) ?>

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