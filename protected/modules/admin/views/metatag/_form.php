<?php
/* @var $this MetatagController */
/* @var $model MetaTag */
/* @var $form BSActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'id'=>'meta-tag-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php //echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldControlGroup($model,'page',array('maxlength'=>255, 'readonly'=>'readonly')); ?>
    <?php echo $form->textFieldControlGroup($model,'title',array('maxlength'=>500)); ?>
    <?php echo $form->textAreaControlGroup($model,'key_words',array('rows'=>4)); ?>
    <?php echo $form->textAreaControlGroup($model,'description',array('rows'=>4)); ?>
    <?php echo $form->textAreaControlGroup($model,'seo_script',array('rows'=>4)); ?>
    (please do not enclose with script tag) 
    <?php //echo $form->textFieldControlGroup($model,'status'); ?>
	
	<br /><br />
	<?php echo BsHtml::submitButton('Submit', array('color' => BsHtml::BUTTON_COLOR_PRIMARY)); ?>

<?php $this->endWidget(); ?>
