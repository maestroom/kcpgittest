<?php
/* @var $this AboutusGalleryController */
/* @var $model AboutusGallery */

$this->breadcrumbs=array(
	'Aboutus Galleries'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AboutusGallery', 'url'=>array('index')),
	array('label'=>'Create AboutusGallery', 'url'=>array('create')),
	array('label'=>'View AboutusGallery', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AboutusGallery', 'url'=>array('admin')),
);
?>

<h1>Update AboutusGallery <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>