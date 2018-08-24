<script src="<?php echo Yii::app()->baseUrl.'/ckeditor/ckeditor.js'; ?>"></script>

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'id'=>'aboutus-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="form-group">                
        <?php echo $form->labelEx($model,'content'); ?>
        <?php echo $form->textArea($model,'content', array('class'=>'form-control','rows'=>15)); ?>
        <?php echo $form->error($model,'content'); ?>
        <script type="text/javascript">
            CKEDITOR.replace( 'Aboutus_content', {
                 toolbar: [
                            { name: 'clipboard', items: [ 'Cut','Copy','Paste','PasteText','PasteFromWord', 'Undo', 'Redo'] },
                            { name: 'styles', items: [ 'Font', 'Format', 'FontSize'] },
                            { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline'] },
                            { name: 'align', items: [ 'JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'] },                                    
                            { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
                            { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', 'Outdent', 'Indent' ] },
                            { name: 'tools', items: [ 'Maximize'] },
                 ],
            });
        </script>
     </div>

    <div class="form-group">                
        <?php echo $form->labelEx($model,'fun_facts'); ?>
        <?php echo $form->textArea($model,'fun_facts', array('class'=>'form-control','rows'=>15)); ?>
        <?php echo $form->error($model,'fun_facts'); ?>
        <script type="text/javascript">
            CKEDITOR.replace( 'Aboutus_fun_facts', {
                 toolbar: [
                            { name: 'clipboard', items: [ 'Cut','Copy','Paste','PasteText','PasteFromWord', 'Undo', 'Redo'] },
                            { name: 'styles', items: [ 'Font', 'Format', 'FontSize'] },
                            { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline'] },
                            { name: 'align', items: [ 'JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'] },                                    
                            { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
                            { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', 'Outdent', 'Indent' ] },
                            { name: 'tools', items: [ 'Maximize'] },
                 ],
            });
        </script>
     </div>

    <?php echo BsHtml::submitButton('Submit', array('color' => BsHtml::BUTTON_COLOR_PRIMARY)); ?>

<?php $this->endWidget(); ?>
