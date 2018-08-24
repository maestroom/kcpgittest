<?php
/* @var $this NewseventsimagesController */
/* @var $model NewsEventsImages */
/* @var $form BSActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

    <?php echo $form->textFieldControlGroup($model,'id'); ?>
    <?php echo $form->textFieldControlGroup($model,'news_event_id'); ?>
    <?php echo $form->textFieldControlGroup($model,'path',array('maxlength'=>5000)); ?>
    <?php echo $form->textFieldControlGroup($model,'view_order'); ?>
    <?php echo $form->textFieldControlGroup($model,'status'); ?>

    <div class="form-actions">
        <?php echo BsHtml::submitButton('Search',  array('color' => BsHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

<?php $this->endWidget(); ?>
