<?php
/* @var $this MetatagController */
/* @var $model MetaTag */
?>

<?php
/*$this->breadcrumbs=array(
	'Meta Tags'=>array('index'),
	'Create',
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List MetaTag', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage MetaTag', 'url'=>array('admin')),
);*/
?>

<?php echo BsHtml::pageHeader('Create','Meta Details') ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>