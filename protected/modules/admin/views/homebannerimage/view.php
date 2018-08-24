<?php
/* @var $this HomebannerimageController */
/* @var $model HomeBannerImage */
?>

<?php
$this->breadcrumbs=array(
	'Home Banner Images'=>array('index'),
	$model->title,
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List HomeBannerImage', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create HomeBannerImage', 'url'=>array('create')),
	array('icon' => 'glyphicon glyphicon-edit','label'=>'Update HomeBannerImage', 'url'=>array('update', 'id'=>$model->id)),
	array('icon' => 'glyphicon glyphicon-minus-sign','label'=>'Delete HomeBannerImage', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage HomeBannerImage', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('View','HomeBannerImage '.$model->id) ?>

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
		'status',
	),
)); ?>