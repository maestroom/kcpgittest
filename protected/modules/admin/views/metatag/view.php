<?php
/* @var $this MetatagController */
/* @var $model MetaTag */
?>

<?php
$this->breadcrumbs=array(
	'Meta Tags'=>array('index'),
	$model->title,
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List MetaTag', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create MetaTag', 'url'=>array('create')),
	array('icon' => 'glyphicon glyphicon-edit','label'=>'Update MetaTag', 'url'=>array('update', 'id'=>$model->id)),
	array('icon' => 'glyphicon glyphicon-minus-sign','label'=>'Delete MetaTag', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage MetaTag', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('View','MetaTag '.$model->id) ?>

<?php $this->widget('zii.widgets.CDetailView',array(
	'htmlOptions' => array(
		'class' => 'table table-striped table-condensed table-hover',
	),
	'data'=>$model,
	'attributes'=>array(
		'id',
		'page',
		'title',
		'key_words',
		'description',
		'seo_script',
		'status',
	),
)); ?>