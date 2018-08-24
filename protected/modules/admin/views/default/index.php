    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Admin Login</h3>
                </div>
                <div class="panel-body">
                    
                    <?php $form=$this->beginWidget('CActiveForm', array(
                            'id'=>'login-form',
                            'enableClientValidation'=>true,
                            'clientOptions'=>array('validateOnSubmit'=>true),
                            'htmlOptions'=>array('class'=>'box',)
                         )); ?>
                    
                        <fieldset>
                            <div class="form-group">
                                <?php echo $form->textField($login_model,'username', array('class'=>'form-control','placeholder'=>'E-mail')); ?>
                                <?php echo $form->error($login_model,'username'); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $form->passwordField($login_model,'password', array('class'=>'form-control','placeholder'=>'Password')); ?>
                                <?php echo $form->error($login_model,'password'); ?>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <!--<input name="remember" type="checkbox" value="Remember Me">Remember Me-->
                                </label>
                            </div>
                            <!-- Change this to a button or input when using this as a form 
                            <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a>-->
                            <?php echo CHtml::submitButton('Login', array('class'=>'btn btn-lg btn-success btn-block')); ?>
                        </fieldset>
                    <?php $this->endWidget(); ?> 
                </div>
            </div>
        </div>
    </div>