<?php

class ChangePasswordForm extends CFormModel
{
        public $CurrentPassword;
	public $NewPassword;
        public $RepeatPassword;

        public function rules()
	{
		return array(
			array('CurrentPassword, NewPassword, RepeatPassword', 'required'),
                        array('CurrentPassword', 'checkpassword'),
                        array('RepeatPassword', 'compare', 'compareAttribute'=>'NewPassword'),
		);
	}


        public function attributeLabels()
	{
		return array(
			'CurrentPassword'=>'Current Password',
                        'NewPassword'=>'New Password',
                        'RepeatPassword'=>'Repeat Password',
		);
	}
        
        
	public function checkpassword()
	 {
            $getUser = User::model()->findAll(array('condition' => 'userid="'.Yii::app()->user->id.'" AND password="'.sha1($this->CurrentPassword).'"'));
 		
            if(empty($getUser))
            {
		$this->addError("CurrentPassword", "Current Password is wrong.");
            }
	 }
        
}