<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'id'=>'news-events-form',
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
        <?php echo $form->labelEx($model,'title'); ?>
        <?php echo $form->textField($model,'title', array('class'=>'form-control')); ?>
        <?php echo $form->error($model,'title'); ?>
    </div>
    
    <div class="form-group">
        <?php echo $form->labelEx($model,'content'); ?>
        <?php echo $form->textArea($model,'content', array('class'=>'form-control')); ?>
        <?php echo $form->error($model,'content'); ?>
    </div>
    
    <div class="form-group">
        <?php echo $form->labelEx($model,'date'); ?>
        <?php   
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model' => $model,
                        'attribute' => 'date',
                        'options' => array(
                                'dateFormat' => 'yy-mm-dd',     
                                'showOtherMonths' => false,      // show dates in other months
                                'selectOtherMonths' => false,    // can seelect dates in other months
                                'changeYear' => true,           // can change year
                                'changeMonth' => true,          // can change month
                                'yearRange' => '2015:2099',     // range of year
                                //'minDate' => 'today',    // minimum date
                                //'maxDate' => 'today',  // maximum date
                                'showButtonPanel' => true,      // show button panel
                                'mode'=>'date',
                              ),
                        'htmlOptions' => array(
                                'class'=>'is_required form-control',
                                //'size' => '15',         // textField size
                                //'maxlength' => '10',    // textField maxlength
                                'readonly'=>'readonly',
                                'placeholder'=>'YYYY-MM-DD',
                            ),
                    ));

            ?>
        <?php echo $form->error($model,'date'); ?>
    </div>  
    
    <div class="form-group">
        <?php echo $form->labelEx($model,'view_order'); ?>
        <?php echo $form->numberField($model,'view_order', array('class'=>'form-control', 'min'=>'0', 'step'=>'0.01', 'onkeypress'=>'return isNumberKeyDecimal(event)')); ?>
        <?php echo $form->error($model,'view_order'); ?>
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
        <label >Images </label> (images should be 370 * 240 size for better view in website) 
        <?php
                if(isset($model->newsEventsImages) && !empty($model->newsEventsImages))
                {    
                    echo '<br />';
                    echo '<table style=" border-collapse: separate; border-spacing: 0 1em;">';
                    foreach ($model->newsEventsImages as $img)
                    {
                        echo '<tr id="img'.$img->id.'">';
                        echo '<td>';
                        echo BsHtml::imageResponsive(Yii::app()->baseUrl.$img->path, 'No Image Found', array('style' => 'width = 240px; height: 80px'));   
                        echo '</td>';
                        echo '<td>';
                        echo '<a href="" onclick="return deleteimg('.$img->id.')" ><img width="20" height="20" src="'.Yii::app()->theme->baseUrl.'/assets/images/delete.png'.'" /></a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                }    
              ?>
        <br />
        <?php
        
                 $this->widget('CMultiFileUpload', array(
                     //'model'=>$model,
                     //'attribute'=>'Attachments',
                     'name'=>'img',
                     'accept'=>'jpg|jpeg|gif|png',
                     'options'=>array(
                                   'afterFileSelect'=>'function(e ,v ,m){
                                           var fileSize = e.files[0].size;
                                                if(fileSize>1*1024*1024)
                                                 {
                                                   alert("File Size must smaller than 1 MB");
                                                   $(".MultiFile-remove").click(); 
                                                 }                      
                                                 return true;
                                        }',
                                ),
                     
                     'htmlOptions'=>array('class'=>'with-preview'), 
                     'denied'=>'File Type is not allowed',
                     'duplicate'=>'Already Selected',
                     'max'=>10, // max 10 files
                     //'multiple'=>TRUE,
                  )); 
         ?>
    </div> 

    <?php echo BsHtml::submitButton('Submit', array('color' => BsHtml::BUTTON_COLOR_PRIMARY)); ?>

<?php $this->endWidget(); ?>

    
<script type="text/javascript">
    function deleteimg(id)
    {
        //alert(id);

        if(confirm('Are you sure to delete this image?'))
        {
            $.ajax({
            url:"<?php echo Yii::app()->createUrl('admin/newsevents/deleteimg'); ?>",
            type: 'POST',
            data: {id : id,},
            success: function (data)
                     {
                        $('#img'+id).remove();
                     }
            });
        }

        return false;
    }
</script>     
    
    
