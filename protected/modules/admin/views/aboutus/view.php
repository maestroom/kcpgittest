<?php
/* @var $this AboutusController */
/* @var $model Aboutus */
?>

<?php
$this->breadcrumbs=array(
	'Aboutuses'=>array('index'),
	$model->id,
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List Aboutus', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create Aboutus', 'url'=>array('create')),
	array('icon' => 'glyphicon glyphicon-edit','label'=>'Update Aboutus', 'url'=>array('update', 'id'=>$model->id)),
	array('icon' => 'glyphicon glyphicon-minus-sign','label'=>'Delete Aboutus', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage Aboutus', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('View','Aboutus '.$model->id) ?>

<?php $this->widget('zii.widgets.CDetailView',array(
	'htmlOptions' => array(
		'class' => 'table table-striped table-condensed table-hover',
	),
	'data'=>$model,
	'attributes'=>array(
		'id',
		'content',
		'status',
	),
)); ?>