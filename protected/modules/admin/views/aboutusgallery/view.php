<?php
/* @var $this AboutusGalleryController */
/* @var $model AboutusGallery */

$this->breadcrumbs=array(
	'Aboutus Galleries'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AboutusGallery', 'url'=>array('index')),
	array('label'=>'Create AboutusGallery', 'url'=>array('create')),
	array('label'=>'Update AboutusGallery', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AboutusGallery', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AboutusGallery', 'url'=>array('admin')),
);
?>

<h1>View AboutusGallery #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'path',
		'created',
		'status',
	),
)); ?>
