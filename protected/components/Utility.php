<?php


class Utility 
{   
    public static function getStatus($status)
    {
        if($status==1) { return 'Active'; } else { return 'Inactive'; }
    }
    
    # format currency
    public static function formatCurrency($value, $currency = "USD")
    {
        return Yii::app()->numberFormatter->formatCurrency($value, $currency);
    }
    
    # get H:M:S from given secs
    public static function getTotaltimewithseconds($value)
    {
        $result = '';
        if($value!='')
        {
            $result = sprintf("%02d:%02d:%02d", ($value/3600),($value/60%60), (($value%3600)%60));
        }
        return $result;
    }
    
    # get H:M from given secs
    public static function getTotaltimewithoutseconds($value)
    {
        $result = '';
        if($value!='')
        {
            $result = sprintf("%02d:%02d", ($value/3600),($value/60%60));
        }
        return $result;
    }
    
    # send Email to verified email id only
    public static function sendEmail($mail_content, $force_to_send_mails=NULL)
    {
        $success_count = 0;
        $failed_count = 0;
        
        if(!empty($mail_content))
        {
            foreach ($mail_content as $content)
            {
                $from_emailid = 'admin@myluckyzone.com';
                $from_name = ($content['from_name']!='') ? $content['from_name'] : 'MyLuckyZone';
                $to_emailid = ($content['to_emailid']!='') ? $content['to_emailid'] : '';
                $subject = ($content['subject']!='') ? $content['subject'] : '';
                $message = ($content['message']!='') ? $content['message'] : '';
                
                if($to_emailid!='')
                {
                    $check_mailid = User::model()->findByAttributes(array('email_id'=>$to_emailid));
                    
                    # if email id is visitor
                    if(!empty($check_mailid))
                    {
                        # if email already verified 
                        if($check_mailid->email_verified==1)
                        {
                            $email_queue_model = new EmailQueue();
                            $email_queue_model->from_name = $from_name;
                            $email_queue_model->from_email = $from_emailid;
                            $email_queue_model->to_email = $to_emailid;
                            $email_queue_model->subject = $subject;
                            $email_queue_model->message = $message;
                            $email_queue_model->created_date = date('Y-m-d H:i:s');
                            $email_queue_model->mail_status = 1; // 1->Pending, 2->Sent
                            $email_queue_model->email_verified = 1; // 1->yes, 0->No
                            $email_queue_model->mail_sent_date = NULL;
                            $email_queue_model->status = 1;
                            
                            if($email_queue_model->save())
                            {
                                $success_count++;
                            }
                            else
                            {
                                $failed_count++;
                            }
                        }    
                    }
                }
            }
        }
        
        if($force_to_send_mails == 1)
        {
            $process_email_queue_url = Yii::app()->createAbsoluteUrl('site/processemailqueue');
            exec("wget -b --no-check-certificate -q ".$process_email_queue_url);
        }
        
        return array('success'=>$success_count,'failed'=>$failed_count);
    }
    
    # send Email immediately to any email id (non verified)
    public static function sendEmail2($mail_content)
    {
        $success_count = 0;
        $failed_count = 0;
        
        require_once(Yii::app()->basePath.'/../phpmail/class.phpmailer.php');  
        require_once(Yii::app()->basePath.'/../phpmail/class.smtp.php');  
        $mail_obj = new PHPMailer();
        $mail_obj->IsSMTP();
        //$mail_obj->SMTPDebug = 3;
        $mail_obj->CharSet = 'UTF-8';
        $mail_obj->Host = "email-smtp.us-west-2.amazonaws.com";
        $mail_obj->SMTPAuth= true;
        $mail_obj->Port = 587; // 587 or 465
        $mail_obj->Username= 'AKIAJFOKMLQLCUFXHMVQ';
        $mail_obj->Password= 'AvNrhOnTMXWondIV5NyJ2okU0FQ7AN7JFRQQ6ymEdrBg';
        $mail_obj->SMTPSecure = 'tls';
        $mail_obj->isHTML(true);
        
        if(!empty($mail_content))
        {
            foreach ($mail_content as $content)
            {
                $from_emailid = 'admin@myluckyzone.com';
                $from_name = ($content['from_name']!='') ? $content['from_name'] : 'MyLuckyZone';
                $to_emailid = ($content['to_emailid']!='') ? $content['to_emailid'] : '';
                $subject = ($content['subject']!='') ? $content['subject'] : '';
                $message = ($content['message']!='') ? $content['message'] : '';
                
                $mail_obj->From = $from_emailid;
                $mail_obj->FromName= $from_name;        
                $mail_obj->Subject = $subject;
                $mail_obj->Body = $message;
                
                if($to_emailid!='')
                {
                    $mail_obj->addAddress($to_emailid);
                    if($mail_obj->send())
                    {
                        $email_queue_model = new EmailQueue();
                        $email_queue_model->from_name = $from_name;
                        $email_queue_model->from_email = $from_emailid;
                        $email_queue_model->to_email = $to_emailid;
                        $email_queue_model->subject = $subject;
                        $email_queue_model->message = $message;
                        $email_queue_model->created_date = date('Y-m-d H:i:s');
                        $email_queue_model->mail_status = 2; // 1->Pending, 2->Sent
                        $email_queue_model->email_verified = 0; // 1->yes, 0->No
                        $email_queue_model->mail_sent_date = date('Y-m-d H:i:s');
                        $email_queue_model->status = 1;
                        $email_queue_model->save();
                                
                        $success_count++;
                    }
                    else
                    {
                        $failed_count++;
                    }
                    $mail_obj->ClearAllRecipients();
                }
            }
        }
        
        $process_email_queue_url = Yii::app()->createAbsoluteUrl('site/processemailqueue');
        exec("wget -b --no-check-certificate -q ".$process_email_queue_url);
        
        return array('success'=>$success_count,'failed'=>$failed_count);
    }
    
    # send Email to any email id (non verified)
    public static function sendEmail3($mail_content)
    {
        $success_count = 0;
        $failed_count = 0;
        
        if(!empty($mail_content))
        {
            foreach ($mail_content as $content)
            {
                $from_emailid = 'admin@myluckyzone.com';
                $from_name = ($content['from_name']!='') ? $content['from_name'] : 'MyLuckyZone';
                $to_emailid = ($content['to_emailid']!='') ? $content['to_emailid'] : '';
                $subject = ($content['subject']!='') ? $content['subject'] : '';
                $message = ($content['message']!='') ? $content['message'] : '';
                
                if($to_emailid!='')
                {
                    $email_queue_model = new EmailQueue();
                    $email_queue_model->from_name = $from_name;
                    $email_queue_model->from_email = $from_emailid;
                    $email_queue_model->to_email = $to_emailid;
                    $email_queue_model->subject = $subject;
                    $email_queue_model->message = $message;
                    $email_queue_model->created_date = date('Y-m-d H:i:s');
                    $email_queue_model->mail_status = 1; // 1->Pending, 2->Sent
                    $email_queue_model->email_verified = 0; // 1->yes, 0->No
                    $email_queue_model->mail_sent_date = NULL;
                    $email_queue_model->status = 1;

                    if($email_queue_model->save())
                    {
                        $success_count++;
                    }
                    else
                    {
                        $failed_count++;
                    }
                }
            }
        }
        
        $process_email_queue_url = Yii::app()->createAbsoluteUrl('site/processemailqueue');
        exec("wget -b --no-check-certificate -q ".$process_email_queue_url);
        
        return array('success'=>$success_count,'failed'=>$failed_count);
    }
    
    
    # send Email to Partners (verified email id only)
    public static function sendEmailToPartners($mail_content, $force_to_send_mails=NULL)
    {
        $success_count = 0;
        $failed_count = 0;
        
        if(!empty($mail_content))
        {
            foreach ($mail_content as $content)
            {
                $from_emailid = 'admin@myluckyzone.com';
                $from_name = ($content['from_name']!='') ? $content['from_name'] : 'MyLuckyZone';
                $to_emailid = ($content['to_emailid']!='') ? $content['to_emailid'] : '';
                $subject = ($content['subject']!='') ? $content['subject'] : '';
                $message = ($content['message']!='') ? $content['message'] : '';
                
                if($to_emailid!='')
                {
                    $check_mailid = Partner::model()->findByAttributes(array('email_id'=>$to_emailid));
                    
                    # if email id is partner
                    if(!empty($check_mailid))
                    {
                        # if email already verified 
                        if($check_mailid->email_verified==1)
                        {
                            $email_queue_model = new EmailQueue();
                            $email_queue_model->from_name = $from_name;
                            $email_queue_model->from_email = $from_emailid;
                            $email_queue_model->to_email = $to_emailid;
                            $email_queue_model->subject = $subject;
                            $email_queue_model->message = $message;
                            $email_queue_model->created_date = date('Y-m-d H:i:s');
                            $email_queue_model->mail_status = 1; // 1->Pending, 2->Sent
                            $email_queue_model->email_verified = 1; // 1->yes, 0->No
                            $email_queue_model->mail_sent_date = NULL;
                            $email_queue_model->status = 1;
                            
                            if($email_queue_model->save())
                            {
                                $success_count++;
                            }
                            else
                            {
                                $failed_count++;
                            }
                        }    
                    }
                }
            }
        }
        
        if($force_to_send_mails == 1)
        {
            $process_email_queue_url = Yii::app()->createAbsoluteUrl('site/processemailqueue');
            exec("wget -b --no-check-certificate -q ".$process_email_queue_url);
        }
        
        return array('success'=>$success_count,'failed'=>$failed_count);
    }
    
    
/*    
    # send Email to any email id (non verified)
    public static function sendEmail3($mail_content)
    {
        $success_count = 0;
        $failed_count = 0;
        
        if(!empty($mail_content))
        {
            foreach ($mail_content as $content)
            {
                $from_emailid = 'admin@myluckyzone.com';
                $from_name = ($content['from_name']!='') ? $content['from_name'] : 'MyLuckyZone';
                $to_emailid = ($content['to_emailid']!='') ? $content['to_emailid'] : '';
                $subject = ($content['subject']!='') ? $content['subject'] : '';
                $message = ($content['message']!='') ? $content['message'] : '';
                
                if($to_emailid!='')
                {
                    $check_mailid = User::model()->findByAttributes(array('email_id'=>$to_emailid));
                    
                    # if email id is visitor
                    if(!empty($check_mailid))
                    {
                        # if email already verified 
                        if($check_mailid->email_verified==1)
                        {
                            $email_queue_model = new EmailQueue();
                            $email_queue_model->from_name = $from_name;
                            $email_queue_model->from_email = $from_emailid;
                            $email_queue_model->to_email = $to_emailid;
                            $email_queue_model->subject = $subject;
                            $email_queue_model->message = $message;
                            $email_queue_model->created_date = date('Y-m-d H:i:s');
                            $email_queue_model->mail_status = 1; // 1->Pending, 2->Sent
                            $email_queue_model->email_verified = 0; // 1->yes, 0->No
                            $email_queue_model->mail_sent_date = NULL;
                            $email_queue_model->status = 1;
                            
                            if($email_queue_model->save())
                            {
                                $success_count++;
                            }
                            else
                            {
                                $failed_count++;
                            }
                        }    
                    }
                }
            }
        }
        
        $process_email_queue_url = Yii::app()->createAbsoluteUrl('site/processemailqueue');
        exec("wget -b --no-check-certificate -q ".$process_email_queue_url);
        
        return array('success'=>$success_count,'failed'=>$failed_count);
    }    
    
/*    
    # send Email to verified email id only
    public static function sendEmail($mail_content)
    {
        $success_count = 0;
        $failed_count = 0;
        
        require_once(Yii::app()->basePath.'/../phpmail/class.phpmailer.php');  
        require_once(Yii::app()->basePath.'/../phpmail/class.smtp.php');  
        $mail_obj = new PHPMailer();
        $mail_obj->IsSMTP();
        //$mail_obj->SMTPDebug = 3;
        $mail_obj->CharSet = 'UTF-8';
        $mail_obj->Host = "email-smtp.us-west-2.amazonaws.com";
        $mail_obj->SMTPAuth= true;
        $mail_obj->Port = 587; // 587 or 465
        $mail_obj->Username= 'AKIAJFOKMLQLCUFXHMVQ';
        $mail_obj->Password= 'AvNrhOnTMXWondIV5NyJ2okU0FQ7AN7JFRQQ6ymEdrBg';
        $mail_obj->SMTPSecure = 'tls';
        $mail_obj->isHTML(true);
        
        if(!empty($mail_content))
        {
            foreach ($mail_content as $content)
            {
                $from_emailid = 'admin@myluckyzone.com';
                $from_name = ($content['from_name']!='') ? $content['from_name'] : 'MyLuckyZone';
                $to_emailid = ($content['to_emailid']!='') ? $content['to_emailid'] : '';
                $subject = ($content['subject']!='') ? $content['subject'] : '';
                $message = ($content['message']!='') ? $content['message'] : '';
                
                $mail_obj->From = $from_emailid;
                $mail_obj->FromName= $from_name;        
                $mail_obj->Subject = $subject;
                $mail_obj->Body = $message;
                
                if($to_emailid!='')
                {
                    $check_mailid = User::model()->findByAttributes(array('email_id'=>$to_emailid));
                    
                    # if email id is visitor
                    if(!empty($check_mailid))
                    {
                        # if email already verified 
                        if($check_mailid->email_verified==1)
                        {
                            $mail_obj->addAddress($to_emailid);
                            if($mail_obj->send())
                            {
                                $success_count++;
                            }
                            else
                            {
                                $failed_count++;
                            }
                            $mail_obj->ClearAllRecipients();
                        }    
                    }
                }
            }
        }
        
        return array('success'=>$success_count,'failed'=>$failed_count);
    }
    
    # send Email to any email id (non verified)
    public static function sendEmail2($mail_content)
    {
        $success_count = 0;
        $failed_count = 0;
        
        require_once(Yii::app()->basePath.'/../phpmail/class.phpmailer.php');  
        require_once(Yii::app()->basePath.'/../phpmail/class.smtp.php');  
        $mail_obj = new PHPMailer();
        $mail_obj->IsSMTP();
        //$mail_obj->SMTPDebug = 3;
        $mail_obj->CharSet = 'UTF-8';
        $mail_obj->Host = "email-smtp.us-west-2.amazonaws.com";
        $mail_obj->SMTPAuth= true;
        $mail_obj->Port = 587; // 587 or 465
        $mail_obj->Username= 'AKIAJFOKMLQLCUFXHMVQ';
        $mail_obj->Password= 'AvNrhOnTMXWondIV5NyJ2okU0FQ7AN7JFRQQ6ymEdrBg';
        $mail_obj->SMTPSecure = 'tls';
        $mail_obj->isHTML(true);
        
        if(!empty($mail_content))
        {
            foreach ($mail_content as $content)
            {
                $from_emailid = 'admin@myluckyzone.com';
                $from_name = ($content['from_name']!='') ? $content['from_name'] : 'MyLuckyZone';
                $to_emailid = ($content['to_emailid']!='') ? $content['to_emailid'] : '';
                $subject = ($content['subject']!='') ? $content['subject'] : '';
                $message = ($content['message']!='') ? $content['message'] : '';
                
                $mail_obj->From = $from_emailid;
                $mail_obj->FromName= $from_name;        
                $mail_obj->Subject = $subject;
                $mail_obj->Body = $message;
                
                if($to_emailid!='')
                {
                    $mail_obj->addAddress($to_emailid);
                    if($mail_obj->send())
                    {
                        $success_count++;
                    }
                    else
                    {
                        $failed_count++;
                    }
                    $mail_obj->ClearAllRecipients();
                }
            }
        }
        
        return array('success'=>$success_count,'failed'=>$failed_count);
    }    
*/    

    # send out bidden notification to Auction product bidder
    public static function sendAuctionOutBiddenNotification($get_current_highest_bid=NULL)
    {
        if(!empty($get_current_highest_bid))
        {
            $url = Yii::app()->createAbsoluteUrl('visitor/viewauctionproduct', array('id'=>$get_current_highest_bid->auction_product_id));

            $subject = "Notification";
            $message = 'Dear '.$get_current_highest_bid->visitor->firstname.' '.$get_current_highest_bid->visitor->lastname.',';
            $message.= '<br /><br /> You are out bidden by someone for the product <b>"'.$get_current_highest_bid->auctionProduct->title.'"</b>';
            $message.= "<br /> To bid again for the product please click the following link on or before ".$get_current_highest_bid->auctionProduct->auction_end_date;
            $message.= "<br /> <a href='".$url."'>".$url."</a>";
            $message.= '<br /><br /> Regards, <br /> Administration team, <br /> MyLuckyZone.com LLC';

            $mail_content = array();
            $email_array = array('from_name'=>'', 'to_emailid'=>$get_current_highest_bid->user->email_id, 'subject'=>$subject, 'message'=>$message);
            array_push($mail_content, $email_array);                        
            $reponse = Utility::sendEmail2($mail_content);
        }    
    }
    
    
    # get browser information
    public static function getBrowser()
    {
        $u_agent = $_SERVER['HTTP_USER_AGENT'];
        $bname = 'Unknown';
        $platform = 'Unknown';
        $version= "";
        $ub = "";

        //First get the platform?
        if (preg_match('/linux/i', $u_agent)) {
            $platform = 'linux';
        }
        elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
            $platform = 'mac';
        }
        elseif (preg_match('/windows|win32/i', $u_agent)) {
            $platform = 'windows';
        }
        elseif (preg_match('/android/i', $u_agent)) {
            $platform = 'android';
        }
        elseif (preg_match('/iphone|ipod|ipad/i', $u_agent)) {
            $platform = 'ios';
        }

        // Next get the name of the useragent yes seperately and for good reason
        if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
        {
            $bname = 'Internet Explorer';
            $ub = "MSIE";
        }
        elseif(preg_match('/Firefox/i',$u_agent))
        {
            $bname = 'Mozilla Firefox';
            $ub = "Firefox";
        }
        elseif(preg_match('/Chrome/i',$u_agent))
        {
            $bname = 'Google Chrome';
            $ub = "Chrome";
        }
        elseif(preg_match('/Safari/i',$u_agent))
        {
            $bname = 'Apple Safari';
            $ub = "Safari";
        }
        elseif(preg_match('/Opera/i',$u_agent))
        {
            $bname = 'Opera';
            $ub = "Opera";
        }
        elseif(preg_match('/Netscape/i',$u_agent))
        {
            $bname = 'Netscape';
            $ub = "Netscape";
        }

        // finally get the correct version number
        $known = array('Version', $ub, 'other');
        $pattern = '#(?<browser>' . join('|', $known) .
        ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
        if (!preg_match_all($pattern, $u_agent, $matches)) {
            // we have no matching number just continue
        }

        // see how many we have
        $i = count($matches['browser']);
        if ($i != 1) {
            //we will have two since we are not using 'other' argument yet
            //see if version is before or after the name
            if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
                $version= $matches['version'][0];
            }
            else {
                $version= $matches['version'][1];
            }
        }
        else {
            $version= $matches['version'][0];
        }

        // check if we have a number
        if ($version==null || $version=="") {$version="?";}

        return array(
            'userAgent' => $u_agent,
            'name'      => $bname,
            'version'   => $version,
            'platform'  => $platform,
            'pattern'    => $pattern
        );
    }
    
    
    # get ip info
    public static function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) 
    {
        $output = NULL;
        if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE)
        {
            $ip = $_SERVER["REMOTE_ADDR"];
            if ($deep_detect)
            {
                if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
            }
        }

        $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
        $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
        $continents = array(
                                "AF" => "Africa",
                                "AN" => "Antarctica",
                                "AS" => "Asia",
                                "EU" => "Europe",
                                "OC" => "Australia (Oceania)",
                                "NA" => "North America",
                                "SA" => "South America"
                            );
        if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support))
        {
            $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
            if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2)
            {
                switch ($purpose)
                {
                    case "location":
                        $output = array(
                            "city"           => @$ipdat->geoplugin_city,
                            "state"          => @$ipdat->geoplugin_regionName,
                            "country"        => @$ipdat->geoplugin_countryName,
                            "country_code"   => @$ipdat->geoplugin_countryCode,
                            "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                            "continent_code" => @$ipdat->geoplugin_continentCode
                        );
                        break;
                    case "address":
                        $address = array($ipdat->geoplugin_countryName);
                        if (@strlen($ipdat->geoplugin_regionName) >= 1)
                            $address[] = $ipdat->geoplugin_regionName;
                        if (@strlen($ipdat->geoplugin_city) >= 1)
                            $address[] = $ipdat->geoplugin_city;
                        $output = implode(", ", array_reverse($address));
                        break;
                    case "city":
                        $output = @$ipdat->geoplugin_city;
                        break;
                    case "state":
                        $output = @$ipdat->geoplugin_regionName;
                        break;
                    case "region":
                        $output = @$ipdat->geoplugin_regionName;
                        break;
                    case "country":
                        $output = @$ipdat->geoplugin_countryName;
                        break;
                    case "countrycode":
                        $output = @$ipdat->geoplugin_countryCode;
                        break;
                }
            }
        }

        return $output;
    }
    
    
    # Image Resize 
    public static function imageResize($path, $frame_width, $frame_height)
    {
        $img_path = Yii::getPathOfAlias('webroot').$path;
        
        if(file_exists($img_path))
        {
            list($img_width, $img_height) = getimagesize($img_path);

            $file_extension = strtolower(pathinfo($img_path, PATHINFO_EXTENSION));
            
            if(in_array($file_extension, array('jpg', 'jpeg')))
                $imagick = imagecreatefromjpeg($img_path);
            elseif(in_array($file_extension, array('png')))
                $imagick = imagecreatefrompng($img_path); 
            elseif(in_array($file_extension, array('gif')))
                $imagick = imagecreatefromgif($img_path); 
            else
                return FALSE;

            $frame = imagecreatetruecolor($frame_width, $frame_height);
            $white_color = imagecolorallocate($frame, 255, 255, 255);
            imagefill($frame, 0, 0, $white_color);

            if($img_width>$frame_width || $img_height>$frame_height)
            {
                if($img_width>$img_height)
                {
                    $new_width = $frame_width;
                    $diff = $img_width-$frame_width;
                    $new_height = $img_height - (($diff/$img_width) * $img_height);

                    if($new_height>$frame_height)
                    {
                        $diff = $new_height-$frame_height; 
                        $new_width = $new_width - (($diff/$new_height) * $new_width);
                        $new_height = $frame_height;
                    }
                }
                else
                {
                    $new_height = $frame_height;
                    $diff = $img_height-$frame_height;
                    $new_width = $img_width - (($diff/$img_height) * $img_width);

                    if($new_width>$frame_width)
                    {
                        $diff = $new_width-$frame_width;
                        $new_height = $new_height - (($diff/$new_width) * $new_height);
                        $new_width = $frame_width;
                    }
                }

                $new_x = ($frame_width-$new_width)/2;
                $new_y = ($frame_height-$new_height)/2;

                imagecopyresampled($frame, $imagick, $new_x, $new_y, 0, 0, $new_width, $new_height, $img_width, $img_height);
                imagedestroy($imagick);
                imagejpeg($frame, $img_path,100);
                imagedestroy($frame);
            }
            else
            {
                $new_x = ($frame_width-$img_width)/2;
                $new_y = ($frame_height-$img_height)/2;
                imagecopyresampled($frame, $imagick, $new_x, $new_y, 0, 0, $img_width, $img_height, $img_width, $img_height);
                imagedestroy($imagick);
                imagejpeg($frame, $img_path,100);
                imagedestroy($frame);
            }

            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    
    
}