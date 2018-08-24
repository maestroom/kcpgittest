<?php
/* @var $this NewseventsimagesController */
/* @var $model NewsEventsImages */
?>

<?php
$this->breadcrumbs=array(
	'News Events Images'=>array('index'),
	'Create',
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List NewsEventsImages', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage NewsEventsImages', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Create','NewsEventsImages') ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>