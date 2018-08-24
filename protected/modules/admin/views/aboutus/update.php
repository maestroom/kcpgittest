<?php
/* @var $this AboutusController */
/* @var $model Aboutus */
?>

<?php
$this->breadcrumbs=array(
	'Aboutuses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List Aboutus', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create Aboutus', 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-list-alt','label'=>'View Aboutus', 'url'=>array('view', 'id'=>$model->id)),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage Aboutus', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Update','Aboutus '.$model->id) ?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>