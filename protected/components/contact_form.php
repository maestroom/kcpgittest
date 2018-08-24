<div class="srch_frm">
<h3>KCP Real Estate </h3>
<form id="contactform" name="contactform" method="post" action="<?php echo Yii::app()->createUrl('site/submitcontact'); ?>"  >
        <div class="control-group form-group col-md-12 first">
            <div class="controls">
                <input type="text" class="form-control" id="contactname" name="contactname" required data-validation-required-message="Please enter your name." name="name" placeholder="Your Name">

                <p class="help-block"></p>
            </div>

            <div class="controls">
                <input type="email" class="form-control" id="contactemail" name="contactemail" required data-validation-required-message="Please enter an email address." name="email" placeholder="Email Address">

                <p class="help-block"></p>
            </div>

            <div class="controls">
                <input type="number" class="form-control" id="contactphone" name="contactphone" required data-validation-required-message="Please enter your phone number." name="phone" placeholder="Your Phone/Mobile">

                <p class="help-block"></p>
            </div>                                 


            <div class="controls">
                <textarea rows="10" cols="100" class="form-control" id="contactmessage" name="contactmessage" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none" name="message" placeholder="Message"></textarea>
            </div>
            
            <div class="clearfix"></div>
            
            
        </div>
        <div class="clearfix"></div>
        <center><input type="submit" class="btn btn-primary" value="Send Mail" /></center>
        <div id="success"></div>
        <!-- For success/fail messages -->
    </form>
</div>



