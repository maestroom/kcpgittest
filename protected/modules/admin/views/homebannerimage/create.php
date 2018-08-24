<?php
/* @var $this HomebannerimageController */
/* @var $model HomeBannerImage */
?>

<?php
$this->breadcrumbs=array(
	'Home Banner Images'=>array('index'),
	'Create',
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List HomeBannerImage', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage HomeBannerImage', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Create','HomeBannerImage') ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>