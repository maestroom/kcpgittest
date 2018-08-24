<?php
/* @var $this MetatagController */
/* @var $model MetaTag */
?>

<?php
/*$this->breadcrumbs=array(
	'Meta Tags'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List MetaTag', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create MetaTag', 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-list-alt','label'=>'View MetaTag', 'url'=>array('view', 'id'=>$model->id)),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage MetaTag', 'url'=>array('admin')),
);*/
?>

<?php echo BsHtml::pageHeader('Update','Meta Details') ?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>