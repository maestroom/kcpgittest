<?php
/* @var $this AboutusGalleryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Aboutus Galleries',
);

$this->menu=array(
	array('label'=>'Create AboutusGallery', 'url'=>array('create')),
	array('label'=>'Manage AboutusGallery', 'url'=>array('admin')),
);
?>

<h1>Aboutus Galleries</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
