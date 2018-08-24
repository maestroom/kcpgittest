<?php

$property_name = '';

$get_property = Property::model()->findByPk($property_id);
if(!empty($get_property))
{
    $property_name = $get_property->title;
}

?>

<?php echo BsHtml::pageHeader('Add','Property Videos ('.$property_name.')') ?>

<?php $this->renderPartial('_form', array('model'=>$model, 'property_id'=>$property_id)); ?>

