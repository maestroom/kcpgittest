<?php
/* @var $this AboutusGalleryController */
/* @var $model AboutusGallery */

$this->breadcrumbs=array(
	'Aboutus Galleries'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AboutusGallery', 'url'=>array('index')),
	array('label'=>'Manage AboutusGallery', 'url'=>array('admin')),
);
?>

<h1>Create AboutusGallery</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>