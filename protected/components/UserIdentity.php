<?php


class UserIdentity extends CUserIdentity
{
    
    const ERROR_USERNAME_NOT_ACTIVE = 3;
    const ERROR_LOGIN_ATTEMPT = 4; 
	
    public function authenticate()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $search_date_limit = date("Y-m-d H:i:s", (time()-86400));
        $get_login_history = LoginHistoryUser::model()->findAll(array('condition'=>'ip="'.$ip.'" AND date_time>"'.$search_date_limit.'" ORDER BY id DESC LIMIT 10 OFFSET 0')); // last successful attempt from this ip
        
        $login_status = 0; // 0->Login Failed, 1->Login Success
        $ref_user_id = NULL;
        $chk_status = 1; 
        $chk1 = 1; // local check variable
        $is_attempt_allowed = 0; // 0->No, 1->Yes
        $login_attempt_error_msg = '';
        $login_email_verification_error_msg = '';
        
        if(empty($get_login_history))
        {
            $is_attempt_allowed = 1;
        }
        else
        {
            $no_of_failed_attempts = 0;
            $last_failed_attempt_time = 0;
            $last_success_attempt_time = 0;
            $time_diff = 0;
            
            foreach ($get_login_history as $history)
            {
                if($history->login_status==1)
                {
                    $last_success_attempt_time = strtotime($history->date_time);
                    break;
                }                
                else
                {                    
                    if($no_of_failed_attempts==0)
                    {
                        $last_failed_attempt_time = strtotime($history->date_time);
                        $chk_status = 1;
                    }
                    if($history->status==2 && $chk1==1)
                    {
                        $last_failed_attempt_time = strtotime($history->date_time);
                        $chk_status = 2;
                        $chk1=0;
                    }
                    $no_of_failed_attempts++;
                }
            }
            
            $time_diff = time()-$last_failed_attempt_time;

            if($no_of_failed_attempts<5)
            {
                $is_attempt_allowed = 1;
            }
            elseif(($no_of_failed_attempts>=5) && ($no_of_failed_attempts<10))
            {
                if($time_diff>3600)
                {
                    $is_attempt_allowed = 1; 
                    $chk_status = 2;
                }
                elseif($chk_status == 2)
                {
                    $is_attempt_allowed = 1;
                }
                else
                {    
                    //$login_attempt_error_msg = 'Login attempt blocked. please try after '.date('Y-m-d h:i A',(time()+(3600-$time_diff)));
                
                    $hours = ((3600-$time_diff) / 3600) % 24;
                    $mins = ((3600-$time_diff) / 60) % 60;
                    $secs = (3600-$time_diff) % 60;                    
                    $login_attempt_error_msg = 'Login attempt blocked. please try after '.$mins.' minutes and '.$secs.' seconds';
                }
            }
            elseif($no_of_failed_attempts>=10)
            {
                if($time_diff>86400)
                {
                    $is_attempt_allowed = 1;
                }
                else
                {                    
                    //$login_attempt_error_msg = 'Login attempt blocked. please try after '.date('Y-m-d h:i A',(time()+(86400-$time_diff)));
                
                    $hours = ((86400-$time_diff) / 3600) % 24;
                    $mins = ((86400-$time_diff) / 60) % 60;
                    $secs = (86400-$time_diff) % 60;
                    $login_attempt_error_msg = 'Login attempt blocked. please try after '.$hours.' hour '.$mins.' minutes and '.$secs.' seconds';
                }
            }
        }
        
        if($is_attempt_allowed==1)
        {
            $user = User::model()->findByAttributes(array('email_id'=>trim($this->username),'user_type'=>3));
            //echo '<pre>'; print_r($user); exit();
            if($user===null) // No user found!
            { 
                $this->errorCode=self::ERROR_USERNAME_INVALID;
            }
            elseif($user->status<0) // if user registered after email verification concept and email id not verified yet  
            { 
                $this->errorCode = self::ERROR_LOGIN_ATTEMPT; 
                $this->errorMessage = 'Sorry! your email account verification is pending. please check your e-mail box (including the spam folder) and follow the link to activate your account.';
            }
            elseif($user->email_verified==0) // if user registered before email verification concept and email id not verified yet  
            {
                # update account activation key and send verification link
                $key_charecters = 'abcdefghijklmnopqrstuvwxyz';
                $key_text = $user->user_id.$key_charecters[rand(0, strlen($key_charecters) - 1)].time().$key_charecters[rand(0, strlen($key_charecters) - 1)];

                if(User::model()->updateByPk($user->user_id, array('reset_key'=>sha1($key_text))))
                {
                    $timenow = time();
                    $url = Yii::app()->createAbsoluteUrl('site/verify', array('verificationkey'=>$key_text));

                    $from_name = 'MyLuckyZone';
                    $to = $user->email_id;
                    $subject = "Welcome to MyLuckyZone.com LLC";
                    $message = "Hi, Greetings from MyLuckyZone.com LLC <br />";
                    $message .= "<br /> To activate your ".$user->email_id." MyLuckyZone.com Account, click the link below <br />";
                    $message .= "<br /> <a href='".$url."'>".$url."</a> <br />";
                    $message .= "<br /> This link will be valid only upto ".date('Y-m-d H:i:s', $timenow+7200);
                    $message .= "<br /> If clicking the link above doesn't work, please copy and paste the URL in a new browser window instead. ";
                    $message .= "<br /> If you've received this mail in error, it's likely that another MyLuckyZone user entered your email address by mistake while trying to register. If you didn't initiate the request, you don't need to take any further action and can safely disregard this email.";
                    $message.= '<br /><br />Regards, <br /><br /> Administration team, <br /> MyLuckyZone.com LLC';

                    $mail_content = array();
                    $email1 = array('from_name'=>$from_name, 'to_emailid'=>$to, 'subject'=>$subject, 'message'=>$message);

                    array_push($mail_content, $email1);
                    $reponse = Utility::sendEmail2($mail_content); 

                    if($reponse['success']==1)
                    {
                        $login_email_verification_error_msg = 'An email has been sent to '.$user->email_id.', please check your e-mail box (including the spam folder) and follow the link to activate your account. the link will be valid only upto '.date('Y-m-d H:i:s', $timenow+7200);
                    }
                    else
                    {
                        $login_email_verification_error_msg = 'Verification mail sending failed. please try again';
                    }
                }
                else
                {
                    $login_email_verification_error_msg = 'Activation key generation failed. please try again';
                }
                
                $this->errorCode=self::ERROR_LOGIN_ATTEMPT;
                $this->errorMessage = $login_email_verification_error_msg;
            }
            elseif($user->status==0) // Admin Blocked user!
            { 
                $this->errorCode=self::ERROR_USERNAME_NOT_ACTIVE;
            }
            //elseif($user->password !== sha1 ($this->password)) // Invalid password!
            elseif($user->password !== $this->password) // Invalid password!
            { 
                $this->errorCode=self::ERROR_PASSWORD_INVALID;
            }            
            else // Okay!
            {
                # update last login time
                User::model()->updateByPk($user->user_id, array('last_success_login'=>date('Y-m-d H:i:s', time())));
                 
                # set user sessions
                $this->setState('id', $user->user_id);
                $this->setState('usertype', $user->user_type);  // 1->Admin, 2->Partner, 3->Visitor
                $this->setState('emailid', $user->email_id);
                $this->setState('isAdmin', ($this->name == 'admin'));
                  
                if($user->user_type==3)
                {
                    # for getting Visitor details
                    $get_visitor = Visitor::model()->findByAttributes(array('user_id'=>$user->user_id));
                    $this->setState('name', $get_visitor->firstname.' '.$get_visitor->lastname);
                    $this->setState('gender', $get_visitor->gender);
                    $this->setState('dob', $get_visitor->dob);
                    $this->setState('visitorid', $get_visitor->visitor_id);
                    $this->setState('visitorcode', $get_visitor->visitor_code);
                    
                    if($get_visitor->referrer_id!=NULL && $get_visitor->points_share>0 && (time()<=strtotime($get_visitor->reference_valid_upto)+86399))
                    {
                        $this->setState('referrerid', $get_visitor->referrer_id);
                        $this->setState('pointshare', $get_visitor->points_share);
                        $this->setState('validupto', strtotime($get_visitor->reference_valid_upto)+86399);
                    }
                }

                if($user->user_type==2)
                {
                    # for getting Partner details
                    $get_partner = Partner::model()->findByAttributes(array('user_id'=>$user->user_id));
                    $this->setState('name', $get_partner->company_name);
                    $this->setState('partnerid', $get_partner->partner_id);
                }
                
                $login_status = 1;
                $ref_user_id = $user->user_id;
                  
                 $this->errorCode=self::ERROR_NONE; 
            }
            
            $login_history_model = new LoginHistoryUser();
            $login_history_model->ip = $ip;
            $login_history_model->date_time = date('Y-m-d H:i:s', time());
            $login_history_model->login_status = $login_status;
            $login_history_model->ref_user_id = $ref_user_id;
            $login_history_model->status = $chk_status;
            $login_history_model->save();
        }    
        else
        {
            $this->errorCode = self::ERROR_LOGIN_ATTEMPT; 
            $this->errorMessage = $login_attempt_error_msg;
        }
		
        //return !$this->errorCode;
        return $this->errorCode;
    }
 
}