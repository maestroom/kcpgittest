<?php
/* @var $this TestimonialsController */
/* @var $model Testimonials */
?>

<?php
$this->breadcrumbs=array(
	'Testimonials'=>array('index'),
	$model->name,
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List Testimonials', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create Testimonials', 'url'=>array('create')),
	array('icon' => 'glyphicon glyphicon-edit','label'=>'Update Testimonials', 'url'=>array('update', 'id'=>$model->id)),
	array('icon' => 'glyphicon glyphicon-minus-sign','label'=>'Delete Testimonials', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage Testimonials', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('View','Testimonials '.$model->id) ?>

<?php $this->widget('zii.widgets.CDetailView',array(
	'htmlOptions' => array(
		'class' => 'table table-striped table-condensed table-hover',
	),
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'content',
		'path',
		'status',
	),
)); ?>