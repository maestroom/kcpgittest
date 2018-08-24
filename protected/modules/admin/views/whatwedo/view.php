<?php
/* @var $this WhatwedoController */
/* @var $model WhatWeDo */
?>

<?php
$this->breadcrumbs=array(
	'What We Dos'=>array('index'),
	$model->title,
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List WhatWeDo', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create WhatWeDo', 'url'=>array('create')),
	array('icon' => 'glyphicon glyphicon-edit','label'=>'Update WhatWeDo', 'url'=>array('update', 'id'=>$model->id)),
	array('icon' => 'glyphicon glyphicon-minus-sign','label'=>'Delete WhatWeDo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage WhatWeDo', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('View','WhatWeDo '.$model->id) ?>

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
		'view_order',
		'status',
	),
)); ?>