<?php
/* @var $this HomebannerimageController */
/* @var $model HomeBannerImage */
/* @var $form BSActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

    <?php echo $form->textFieldControlGroup($model,'id'); ?>
    <?php echo $form->textFieldControlGroup($model,'title',array('maxlength'=>5000)); ?>
    <?php echo $form->textAreaControlGroup($model,'content',array('rows'=>6)); ?>
    <?php echo $form->textFieldControlGroup($model,'path',array('maxlength'=>5000)); ?>
    <?php echo $form->textFieldControlGroup($model,'status'); ?>

    <div class="form-actions">
        <?php echo BsHtml::submitButton('Search',  array('color' => BsHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

<?php $this->endWidget(); ?>
