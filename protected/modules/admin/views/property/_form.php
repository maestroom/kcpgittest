<script src="<?php echo Yii::app()->baseUrl.'/ckeditor/ckeditor.js'; ?>"></script>

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'id'=>'property-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype'=>'multipart/form-data')
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php //echo $form->errorSummary($model); ?>
	
	<div class="form-group">
        <?php echo $form->labelEx($model,'id_alias'); ?>
        <?php echo $form->textField($model,'id_alias', array('class'=>'form-control')); ?>
        <?php echo $form->error($model,'id_alias'); ?>
         (please avoid space and special characters)
    </div>
	    
    <div class="form-group">
        <?php echo $form->labelEx($model,'title'); ?>
        <?php echo $form->textField($model,'title', array('class'=>'form-control')); ?>
        <?php echo $form->error($model,'title'); ?>
    </div>
    
    <div class="form-group">
        <?php echo $form->labelEx($model,'type'); ?>
        <?php 
                $types = array("Upcomming"=>"Upcomming", "Ongoing"=>"Ongoing", "Completed"=>"Completed");
                echo $form->dropDownList($model,'type',$types,array('class'=>'form-control'));
          ?>
        <?php echo $form->error($model,'type'); ?>
    </div>
    
    <div class="form-group">
        <?php echo $form->labelEx($model,'sqft'); ?>
        <?php echo $form->numberField($model,'sqft', array('class'=>'form-control', 'min'=>'1', 'step'=>'1', 'onkeypress'=>'return isNumberKeyDecimal(event)')); ?>
        <?php echo $form->error($model,'sqft'); ?>
    </div>
    
    <div class="form-group">                
        <?php echo $form->labelEx($model,'overview'); ?>
        <?php echo $form->textArea($model,'overview', array('class'=>'form-control','rows'=>15)); ?>
        <?php echo $form->error($model,'overview'); ?>
        <script type="text/javascript">
            CKEDITOR.replace( 'Property_overview', {
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
        <?php echo $form->labelEx($model,'specifications'); ?>
        <?php echo $form->textArea($model,'specifications', array('class'=>'form-control','rows'=>15)); ?>
        <?php echo $form->error($model,'specifications'); ?>
        <script type="text/javascript">
            CKEDITOR.replace( 'Property_specifications', {
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
        <?php echo $form->labelEx($model,'builder'); ?>
        <?php echo $form->textArea($model,'builder', array('class'=>'form-control','rows'=>15)); ?>
        <?php echo $form->error($model,'builder'); ?>
        <script type="text/javascript">
            CKEDITOR.replace( 'Property_builder', {
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
        <?php echo $form->labelEx($model,'amenities'); ?>
        <?php echo $form->textArea($model,'amenities', array('class'=>'form-control','rows'=>15)); ?>
        <?php echo $form->error($model,'amenities'); ?>
        <script type="text/javascript">
            CKEDITOR.replace( 'Property_amenities', {
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
        <label >Cover Image <span class="required">*</span></label> (image should be 370 * 240 size for better view in website)
        <?php
                if(isset($model->path) && $model->path!='')
                {
                    echo BsHtml::imageResponsive(Yii::app()->baseUrl.$model->path, 'No Image Found', array('style' => 'width = 240px; height: 80px')); 
                }
                
                 $this->widget('CMultiFileUpload', array(
                     //'model'=>$model,
                     //'attribute'=>'Attachments',
                     'name'=>'coverimg',
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
        <?php echo $form->error($model,'path'); ?>
    </div>
    
    <div class="form-group">
        <label >Master Plan </label> (image should be 1150 * 500 size for better view in website)
        <?php 
                if(isset($model->master_plan) && $model->master_plan!='')
                {
                    echo BsHtml::imageResponsive(Yii::app()->baseUrl.$model->master_plan, 'No Image Found', array('style' => 'width = 100px; height: 100px')); 
                }
                
                 $this->widget('CMultiFileUpload', array(
                     //'model'=>$model,
                     //'attribute'=>'Attachments',
                     'name'=>'masterplan',
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
    
    <?php /*
    <div class="form-group">
        <label >Location Map </label> (image should be 1150 * 500 size for better view in website)
        <?php
                if(isset($model->map_location) && $model->map_location!='')
                {
                    echo BsHtml::imageResponsive(Yii::app()->baseUrl.$model->map_location, 'No Image Found', array('style' => 'width = 100px; height: 100px')); 
                }
                
                 $this->widget('CMultiFileUpload', array(
                     //'model'=>$model,
                     //'attribute'=>'Attachments',
                     'name'=>'maplocation',
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
    * */ ?>
    
    <div class="form-group">
        <?php echo $form->labelEx($model,'map_location'); ?> 
        <?php echo $form->textField($model,'map_location', array('class'=>'form-control')); ?>
        <?php echo $form->error($model,'map_location'); ?>
    </div>
    
    
    <div class="form-group">
        <?php echo $form->labelEx($model,'view_order'); ?>
        <?php echo $form->numberField($model,'view_order', array('class'=>'form-control', 'min'=>'1', 'step'=>'1', 'onkeypress'=>'return isNumberKeyDecimal(event)')); ?>
        <?php echo $form->error($model,'view_order'); ?>
    </div>
    
    <div class="form-group">
        <?php echo $form->labelEx($model,'meta_title'); ?> 
        <?php echo $form->textField($model,'meta_title', array('class'=>'form-control')); ?>
        <?php echo $form->error($model,'meta_title'); ?>
    </div>
    
    <div class="form-group">
        <?php echo $form->labelEx($model,'meta_keywords'); ?> 
        <?php echo $form->textArea($model,'meta_keywords', array('class'=>'form-control', 'rows'=>3)); ?>
        <?php echo $form->error($model,'meta_keywords'); ?>
    </div>
    
    <div class="form-group">
        <?php echo $form->labelEx($model,'meta_description'); ?> 
        <?php echo $form->textArea($model,'meta_description', array('class'=>'form-control', 'rows'=>3)); ?>
        <?php echo $form->error($model,'meta_description'); ?>
    </div>
    
    <div class="form-group">
        <?php echo $form->labelEx($model,'seo_script'); ?> 
        <?php echo $form->textArea($model,'seo_script', array('class'=>'form-control', 'rows'=>3)); ?>
        <?php echo $form->error($model,'seo_script'); ?>
         (please do not enclose with script tag) 
    </div>

    <?php echo BsHtml::submitButton('Submit', array('color' => BsHtml::BUTTON_COLOR_PRIMARY)); ?>

<?php $this->endWidget(); ?>
    
    
  