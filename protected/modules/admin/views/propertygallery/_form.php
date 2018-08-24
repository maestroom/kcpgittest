<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'id'=>'property-gallery-form',
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
        <?php echo $form->labelEx($model,'view_order'); ?>
        <?php echo $form->numberField($model,'view_order', array('class'=>'form-control', 'min'=>'0', 'step'=>'0.01', 'onkeypress'=>'return isNumberKeyDecimal(event)')); ?>
        <?php echo $form->error($model,'view_order'); ?>
    </div>
    
    <div class="form-group">
        <label >Image </label> (image should be 770 * 435 size for better view in website)
        <?php
                if(isset($model->path) && $model->path!='')
                {
                    echo BsHtml::imageResponsive(Yii::app()->baseUrl.$model->path, 'No Image Found', array('style' => 'width = 177px; height: 100px')); 
                }
                
                 $this->widget('CMultiFileUpload', array(
                     //'model'=>$model,
                     //'attribute'=>'Attachments',
                     'name'=>'img',
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

    <?php echo BsHtml::submitButton('Submit', array('color' => BsHtml::BUTTON_COLOR_PRIMARY)); ?>
    <a href="<?php echo Yii::app()->createUrl('admin/propertygallery/admin', array('propertyid'=>$property_id)); ?>" class="btn btn-danger"> Cancel </a>

<?php $this->endWidget(); ?>