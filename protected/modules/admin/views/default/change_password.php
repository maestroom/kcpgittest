<h1 class="page-header">Change Password</h1>


    <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'change-password-form',
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
                <?php echo $form->labelEx($model,'CurrentPassword'); ?>
                <?php echo $form->passwordField($model,'CurrentPassword', array('class'=>'is_required validate account_input form-control')); ?>
                <?php echo $form->error($model,'CurrentPassword'); ?>
             </div>

             <div class="form-group">
                <?php echo $form->labelEx($model,'NewPassword'); ?>
                <?php echo $form->passwordField($model,'NewPassword', array('class'=>'is_required validate account_input form-control')); ?>
                <?php echo $form->error($model,'NewPassword'); ?>
             </div>

             <div class="form-group">
                <?php echo $form->labelEx($model,'RepeatPassword'); ?>
                <?php echo $form->passwordField($model,'RepeatPassword', array('class'=>'is_required validate account_input form-control')); ?>
                <?php echo $form->error($model,'RepeatPassword'); ?>
             </div>
             

            <p class="submit">
                  <?php echo CHtml::submitButton('Save', array('class'=>'button btn btn-default button-medium')); ?>
            </p>

   <?php $this->endWidget(); ?> 