
<script src="<?php echo Yii::app()->baseUrl.'/ckeditor/ckeditor.js'; ?>"></script>

<h1 class="page-header">Home Banner Image</h1>


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
                <?php echo $form->labelEx($model,'title'); ?>
                <?php echo $form->textField($model,'title', array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'title'); ?>
             </div>
                         
            <div class="form-group">                
                <?php echo $form->labelEx($model,'content'); ?>
                <?php echo $form->textArea($model,'content', array('class'=>'form-control','rows'=>2)); ?>
                <?php echo $form->error($model,'content'); ?>
             </div>
            
            <div class="form-group">
                <?php echo $form->labelEx($model, 'Banner Image ').' (image should be 1250 * 330 size for better view in website)';?>
                <?php echo BsHtml::imageResponsive(Yii::app()->baseUrl.$model->path, 'No Image Found', array('style' => 'width = 100px; height: 100px')); ?>  
                <?php 
                         $this->widget('CMultiFileUpload', array(
                             //'model'=>$model,
                             //'attribute'=>'Attachments',
                             'name'=>'bannerimage',
                             'accept'=>'jpg|jpeg|gif|png',
                             'options'=>array(
                                           'afterFileSelect'=>'function(e ,v ,m){
                                                   var fileSize = e.files[0].size;
                                                        if(fileSize>2*1024*1024)
                                                         {
                                                           alert("File Size must smaller than 2 MB");
                                                           $(".MultiFile-remove").click(); 
                                                         }                      
                                                         return true;
                                                }',
                                        ),

                             'htmlOptions'=>array('class'=>'with-preview'), 
                             'denied'=>'File Type is not allowed',
                             'duplicate'=>'Already Selected',
                             'max'=>1, // max 10 files
                             //'multiple'=>TRUE,
                          )); 
                 ?>   
              </div>
            
            <p class="submit">
                  <?php echo CHtml::submitButton('Save', array('class'=>'button btn btn-default button-medium')); ?>
            </p>

   <?php $this->endWidget(); ?> 