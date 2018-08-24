<?php
/* @var $this MetatagController */
/* @var $model MetaTag */
/* @var $form BSActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

    <?php //echo $form->textFieldControlGroup($model,'id'); ?>
    <?php echo $form->textFieldControlGroup($model,'page',array('maxlength'=>255)); ?>
    <?php echo $form->textAreaControlGroup($model,'title',array('rows'=>6)); ?>
    <?php echo $form->textAreaControlGroup($model,'key_words',array('rows'=>6)); ?>
    <?php echo $form->textAreaControlGroup($model,'description',array('rows'=>6)); ?>
    <?php //echo $form->textAreaControlGroup($model,'seo_script',array('rows'=>6)); ?>
    <?php //echo $form->textFieldControlGroup($model,'status'); ?>

    <div class="form-actions">
        <?php echo BsHtml::submitButton('Search',  array('color' => BsHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

<?php $this->endWidget(); ?>
