
<script src="<?php echo Yii::app()->baseUrl.'/ckeditor/ckeditor.js'; ?>"></script>

<h1 class="page-header">MLZ Settings</h1>


    <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'settings-form',
            'enableClientValidation'=>false,
            //'clientOptions'=>array('validateOnSubmit'=>true),
            'htmlOptions' =>array('enctype' => 'multipart/form-data', 'multiple'=>true, 'class'=>'box'),
        )); ?>
        

            <?php
                if(Yii::app()->user->hasFlash('success'))
                 { 
                    $msg = Yii::app()->user->getFlash('success');
                    echo BsHtml::alert(BsHtml::ALERT_COLOR_SUCCESS, BsHtml::bold($msg));
                 }
                elseif(Yii::app()->user->hasFlash('error')) 
                 {
                    $msg = Yii::app()->user->getFlash('error');
                    echo BsHtml::alert(BsHtml::ALERT_COLOR_ERROR, BsHtml::bold('Sorry. ') . $msg);
                 } 
            ?>

            <p class="help-block">Fields with <span class="required">*</span> are required.</p>

            <div class="form-group">
                <?php echo $form->labelEx($model,'currency'); ?>
                <?php echo $form->textField($model,'currency', array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'currency'); ?>
             </div>
            
             <div class="form-group">
                <?php echo $form->labelEx($model,'address'); ?>
                <?php echo $form->textArea($model,'address', array('class'=>'form-control', 'rows'=>5)); ?>
                <?php echo $form->error($model,'address'); ?>
             </div>           
            
            <div class="form-group">
                <?php echo $form->labelEx($model,'shipping_text'); ?>
                <?php echo $form->textArea($model,'shipping_text', array('class'=>'form-control','rows'=>5)); ?>
                <?php echo $form->error($model,'shipping_text'); ?>
             </div>
            
            <div class="form-group">                
                <?php echo $form->labelEx($model,'scrolling_content'); ?>
                <?php echo $form->textArea($model,'scrolling_content', array('class'=>'form-control','rows'=>10)); ?>
                <?php echo $form->error($model,'scrolling_content'); ?>
                <script type="text/javascript">
                    CKEDITOR.replace( 'MlzInfo_scrolling_content', {
                         toolbar: [
                                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline'] },
                                    //{ name: 'styles', items: [ 'Font'] },
                                    //{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
                         ],
                    });
                </script>
             </div>
             
            <div class="form-group">                
                <?php echo $form->labelEx($model,'terms_service'); ?>
                <?php echo $form->textArea($model,'terms_service', array('class'=>'form-control','rows'=>15)); ?>
                <?php echo $form->error($model,'terms_service'); ?>
                <script type="text/javascript">
                    CKEDITOR.replace( 'MlzInfo_terms_service', {
                         toolbar: [
                                    { name: 'clipboard', items: [ 'Cut','Copy','Paste','PasteText','PasteFromWord', 'Undo', 'Redo'] },
                                    { name: 'styles', items: [ 'Font','Styles', 'Format'] },
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
                <?php echo $form->labelEx($model,'privacy_policy'); ?>
                <?php echo $form->textArea($model,'privacy_policy', array('class'=>'form-control','rows'=>15)); ?>
                <?php echo $form->error($model,'privacy_policy'); ?>
                <script type="text/javascript">
                    CKEDITOR.replace( 'MlzInfo_privacy_policy', {
                         toolbar: [
                                    { name: 'clipboard', items: [ 'Cut','Copy','Paste','PasteText','PasteFromWord', 'Undo', 'Redo'] },
                                    { name: 'styles', items: [ 'Font','Styles', 'Format'] },
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
                <?php echo $form->labelEx($model,'aboutus'); ?>
                <?php echo $form->textArea($model,'aboutus', array('class'=>'form-control','rows'=>15)); ?>
                <?php echo $form->error($model,'aboutus'); ?>
                <script type="text/javascript">
                    CKEDITOR.replace( 'MlzInfo_aboutus', {
                         toolbar: [
                                    { name: 'clipboard', items: [ 'Cut','Copy','Paste','PasteText','PasteFromWord', 'Undo', 'Redo'] },
                                    { name: 'styles', items: [ 'Font','Styles', 'Format'] },
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
                <?php echo $form->labelEx($model,'faq'); ?>
                <?php echo $form->textArea($model,'faq', array('class'=>'form-control','rows'=>15)); ?>
                <?php echo $form->error($model,'faq'); ?>
                <script type="text/javascript">
                    CKEDITOR.replace( 'MlzInfo_faq', {
                         toolbar: [
                                    { name: 'clipboard', items: [ 'Cut','Copy','Paste','PasteText','PasteFromWord', 'Undo', 'Redo'] },
                                    { name: 'styles', items: [ 'Font','Styles', 'Format'] },
                                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline'] },
                                    { name: 'align', items: [ 'JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'] },                                    
                                    { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
                                    { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', 'Outdent', 'Indent' ] },
                                    { name: 'tools', items: [ 'Maximize'] },
                         ],
                    });
                </script>
             </div>
            
            <p class="submit">
                  <?php echo CHtml::submitButton('Save', array('class'=>'button btn btn-default button-medium')); ?>
            </p>

   <?php $this->endWidget(); ?> 