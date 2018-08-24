<?php
/* @var $this AboutusController */
/* @var $model Aboutus */
?>

<?php
$this->breadcrumbs=array(
	'Aboutuses'=>array('index'),
	'Create',
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List Aboutus', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage Aboutus', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Create','Aboutus') ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>