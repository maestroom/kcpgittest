<?php
/* @var $this PropertyController */
/* @var $model Property */
/* @var $form BSActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

    <?php echo $form->textFieldControlGroup($model,'id'); ?>
    <?php echo $form->textFieldControlGroup($model,'title',array('maxlength'=>5000)); ?>
    <?php echo $form->textFieldControlGroup($model,'type',array('maxlength'=>255)); ?>
    <?php echo $form->textFieldControlGroup($model,'sqft',array('maxlength'=>20)); ?>
    <?php echo $form->textFieldControlGroup($model,'master_plan',array('maxlength'=>5000)); ?>
    <?php echo $form->textAreaControlGroup($model,'map_location',array('rows'=>6)); ?>
    <?php echo $form->textAreaControlGroup($model,'overview',array('rows'=>6)); ?>
    <?php echo $form->textAreaControlGroup($model,'specifications',array('rows'=>6)); ?>
    <?php echo $form->textAreaControlGroup($model,'builder',array('rows'=>6)); ?>
    <?php echo $form->textAreaControlGroup($model,'amenities',array('rows'=>6)); ?>
    <?php echo $form->textFieldControlGroup($model,'view_order'); ?>
    <?php echo $form->textFieldControlGroup($model,'status'); ?>

    <div class="form-actions">
        <?php echo BsHtml::submitButton('Search',  array('color' => BsHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

<?php $this->endWidget(); ?>
