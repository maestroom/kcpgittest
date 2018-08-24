<?php
/* @var $this NewseventsimagesController */
/* @var $model NewsEventsImages */
?>

<?php
$this->breadcrumbs=array(
	'News Events Images'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List NewsEventsImages', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create NewsEventsImages', 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-list-alt','label'=>'View NewsEventsImages', 'url'=>array('view', 'id'=>$model->id)),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage NewsEventsImages', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Update','NewsEventsImages '.$model->id) ?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>