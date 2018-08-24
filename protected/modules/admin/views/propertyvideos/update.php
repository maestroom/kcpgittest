<?php echo BsHtml::pageHeader('Update','Property Videos ('.$model->property->title.')') ?>
<?php $this->renderPartial('_form', array('model'=>$model, 'property_id'=>$property_id)); ?>

