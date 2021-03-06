<?php
/* @var $this NewseventsimagesController */
/* @var $model NewsEventsImages */
/* @var $form BSActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'id'=>'news-events-images-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldControlGroup($model,'news_event_id'); ?>
    <?php echo $form->textFieldControlGroup($model,'path',array('maxlength'=>5000)); ?>
    <?php echo $form->textFieldControlGroup($model,'view_order'); ?>
    <?php echo $form->textFieldControlGroup($model,'status'); ?>

    <?php echo BsHtml::submitButton('Submit', array('color' => BsHtml::BUTTON_COLOR_PRIMARY)); ?>

<?php $this->endWidget(); ?>
