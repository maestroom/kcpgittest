<?php

class SiteController extends Controller
{
	
	public $seo_text;
	
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	} 
        
                        
        public function actionIndex()
        {
            echo "rtyrty";
            Yii::app()->session['menuid'] = 1;
            
            $get_meta_tags = MetaTag::model()->find(array('condition'=>'status=1 AND page="Home"'));
            if(!empty($get_meta_tags) && $get_meta_tags->page!='')
            {
            	$this->pageTitle = $get_meta_tags->title;
            	Yii::app()->clientScript->registerMetaTag($get_meta_tags->key_words, 'keywords');
            	Yii::app()->clientScript->registerMetaTag($get_meta_tags->description, 'description');
            	$this->seo_text = $get_meta_tags->seo_script; //SEO script from admin panel
            }
            
            $this->render('index');
        }
        
        public function actionProperty()
        {
            Yii::app()->session['menuid'] = 2;
            
            $get_meta_tags = MetaTag::model()->find(array('condition'=>'status=1 AND page="Property"'));
            if(!empty($get_meta_tags) && $get_meta_tags->page!='')
            {
            	$this->pageTitle = $get_meta_tags->title;
            	Yii::app()->clientScript->registerMetaTag($get_meta_tags->key_words, 'keywords');
            	Yii::app()->clientScript->registerMetaTag($get_meta_tags->description, 'description');
            	$this->seo_text = $get_meta_tags->seo_script; //SEO script from admin panel
            }
            
            $this->render('property');
        }
        
        public function actionViewproperty($id)
        {
            Yii::app()->session['menuid'] = 2; 
            
            $get_meta_tags = MetaTag::model()->find(array('condition'=>'status=1 AND page="Property"'));
            if(!empty($get_meta_tags) && $get_meta_tags->page!='')
            {
            	$this->pageTitle = $get_meta_tags->title;
            	Yii::app()->clientScript->registerMetaTag($get_meta_tags->key_words, 'keywords');
            	Yii::app()->clientScript->registerMetaTag($get_meta_tags->description, 'description');
            	$this->seo_text = $get_meta_tags->seo_script; //SEO script from admin panel
            }
            
            $model = Property::model()->findByPk($id, 'status=1');
            if(empty($model))
            {
                $this->redirect(array('site/property'));
            }
            $this->pageTitle = $model->meta_title;
            Yii::app()->clientScript->registerMetaTag($model->meta_keywords, 'keywords');
            Yii::app()->clientScript->registerMetaTag($model->meta_description, 'description');
            $this->seo_text = $model->seo_script; //SEO script from admin panel
            
            $this->render('view_property', array('model'=>$model));
        }
                
        public function actionAboutus()
	{
            Yii::app()->session['menuid'] = 3;
            
            $get_meta_tags = MetaTag::model()->find(array('condition'=>'status=1 AND page="About Us"'));
            if(!empty($get_meta_tags) && $get_meta_tags->page!='')
            {
            	$this->pageTitle = $get_meta_tags->title;
            	Yii::app()->clientScript->registerMetaTag($get_meta_tags->key_words, 'keywords');
            	Yii::app()->clientScript->registerMetaTag($get_meta_tags->description, 'description');
            	$this->seo_text = $get_meta_tags->seo_script; //SEO script from admin panel
            }
            
            $this->render('aboutus');
	}
        
        public function actionServices()
	{
            Yii::app()->session['menuid'] = 4;
            
            $get_meta_tags = MetaTag::model()->find(array('condition'=>'status=1 AND page="Services"'));
            if(!empty($get_meta_tags) && $get_meta_tags->page!='')
            {
            	$this->pageTitle = $get_meta_tags->title;
            	Yii::app()->clientScript->registerMetaTag($get_meta_tags->key_words, 'keywords');
            	Yii::app()->clientScript->registerMetaTag($get_meta_tags->description, 'description');
            	$this->seo_text = $get_meta_tags->seo_script; //SEO script from admin panel
            }
            
            $this->render('services');
	}
        
        public function actionGallery()
	{
            Yii::app()->session['menuid'] = 5;
            
            $get_meta_tags = MetaTag::model()->find(array('condition'=>'status=1 AND page="Gallery"'));
            if(!empty($get_meta_tags) && $get_meta_tags->page!='')
            {
            	$this->pageTitle = $get_meta_tags->title;
            	Yii::app()->clientScript->registerMetaTag($get_meta_tags->key_words, 'keywords');
            	Yii::app()->clientScript->registerMetaTag($get_meta_tags->description, 'description');
            	$this->seo_text = $get_meta_tags->seo_script; //SEO script from admin panel
            }
            
            $this->render('gallery');
	}
        
        public function actionViewgallery()
        {
            Yii::app()->session['menuid'] = 5; 
            $id = isset($_GET['id']) && $_GET['id']!='' ? $_GET['id'] : '';
            if($id!='')
            {
            $model = Property::model()->findByPk($id);
            $get_property_photos = PropertyGallery::model()->findAll(array('condition'=>'status=1 and property_id="'.$id.'"', 'order'=>'view_order'));
            
            $get_meta_tags = MetaTag::model()->find(array('condition'=>'status=1 AND page="Gallery"'));
            if(!empty($get_meta_tags) && $get_meta_tags->page!='')
            {
            	$this->pageTitle = $get_meta_tags->title;
            	Yii::app()->clientScript->registerMetaTag($get_meta_tags->key_words, 'keywords');
            	Yii::app()->clientScript->registerMetaTag($get_meta_tags->description, 'description');
            	$this->seo_text = $get_meta_tags->seo_script; //SEO script from admin panel
            }
            
            $this->render('view_gallery', array('model'=>$model,'get_property_photos'=>$get_property_photos));
            }
            else
            {
                $this->redirect(array('site/gallery'));
            }
        }
        
        public function actionContactus()
	{
            Yii::app()->session['menuid'] = 6;
            
            $get_meta_tags = MetaTag::model()->find(array('condition'=>'status=1 AND page="Contact Us"'));
            if(!empty($get_meta_tags) && $get_meta_tags->page!='')
            {
            	$this->pageTitle = $get_meta_tags->title;
            	Yii::app()->clientScript->registerMetaTag($get_meta_tags->key_words, 'keywords');
            	Yii::app()->clientScript->registerMetaTag($get_meta_tags->description, 'description');
            	$this->seo_text = $get_meta_tags->seo_script; //SEO script from admin panel
            }
            
            $this->render('contactus');
	}
        
        public function actionSubmitproperty()
	{
            $result = array();
            
            if(isset($_POST['plname']) && trim($_POST['plname'])!='')
            {
                $name = (isset($_POST['plname']) && trim($_POST['plname'])!='') ? trim($_POST['plname']) : '';
                $address = (isset($_POST['pladdress']) && trim($_POST['pladdress'])!='') ? trim($_POST['pladdress']) : '';
                $type = (isset($_POST['pltype']) && trim($_POST['pltype'])!='') ? trim($_POST['pltype']) : '';
                $action = (isset($_POST['plactions']) && trim($_POST['plactions'])!='') ? trim($_POST['plactions']) : '';
                $area = (isset($_POST['plsqft']) && trim($_POST['plsqft'])!='') ? trim($_POST['plsqft']) : '';
                $rate = (isset($_POST['plrate']) && trim($_POST['plrate'])!='') ? trim($_POST['plrate']) : '';
                $agentname = (isset($_POST['plagent_name']) && trim($_POST['plagent_name'])!='') ? trim($_POST['plagent_name']) : '';
                $contactnumber = (isset($_POST['plagent_number']) && trim($_POST['plagent_number'])!='') ? trim($_POST['plagent_number']) : '';
                $description = (isset($_POST['plmessage']) && trim($_POST['plmessage'])!='') ? trim($_POST['plmessage']) : '';
                
                $msg = '<table width="100%" border="1">
                        <tr>
                            <th width="60%" align="left"> Listing Name </th>
                            <td width="40%" align="left">'.$name.'</td>
                        </tr>
                        <tr>
                            <th width="60%" align="left"> Address </th>
                            <td width="40%" align="left">'.$address.'</td>
                        </tr>
                        <tr>
                            <th width="60%" align="left"> Lisiting Type </th>
                            <td width="40%" align="left">'.$type.'</td>
                        </tr>
                        <tr>
                            <th width="60%" align="left"> Action </th>
                            <td width="40%" align="left">'.$action.'</td>
                        </tr>
                        <tr>
                            <th width="60%" align="left"> Area (sq.ft)</th>
                            <td width="40%" align="left">'.$area.'</td>
                        </tr>
                        <tr>
                            <th width="60%" align="left"> Rate</th>
                            <td width="40%" align="left">'.$rate.'</td>
                        </tr>
                        <tr>
                            <th width="60%" align="left"> Agent Name </th>
                            <td width="40%" align="left">'.$agentname.'</td>
                        </tr>
                        <tr>
                            <th width="60%" align="left"> Agent Contact Number </th>
                            <td width="40%" align="left">'.$contactnumber.'</td>
                        </tr>
                        <tr>
                            <th width="60%" align="left"> Property Description </th>
                            <td width="40%" align="left">'.$description.'</td>
                        </tr>
                    </table>';  
                
                
                    $subject = "New property submit request received from ".$name;
                    $message = 'New property from '.$name;
                    $message.= '<br /><br />'.$msg;

                    require_once(Yii::app()->basePath.'/../phpmail/class.phpmailer.php');  
                    require_once(Yii::app()->basePath.'/../phpmail/class.smtp.php');  
                    $mail_obj = new PHPMailer();
                    $mail_obj->IsSMTP();
                    //$mail_obj->SMTPDebug = 3;
                    $mail_obj->CharSet = 'UTF-8';
                    $mail_obj->Host = "";
                    $mail_obj->SMTPAuth= true;
                    $mail_obj->Port = 587; // 587 or 465
                    $mail_obj->Username= '';
                    $mail_obj->Password= '';
                    $mail_obj->SMTPSecure = 'tls';
                    $mail_obj->isHTML(true);
                    $mail_obj->From = 'noreply@themaestro.in';
                    $mail_obj->FromName= 'KCP Property Submit';        
                    $mail_obj->Subject = $subject;
                    $mail_obj->Body = $message;
                    $mail_obj->addAddress('om@themaestro.in');
                    if($mail_obj->send())
                    {
                        $result =  array("success"=>1, "msg"=>'Thank you for your intrest. we will contact you soon!');
                    }
                    else
                    {
                        $result =  array("success"=>0, "msg"=>'Mail sending failed. please try again!');
                    }
            }
            else
            {
                $result =  array("success"=>0, "msg"=>'please fill all the fields');
            }
            
            echo json_encode($result);
	
	}        
        
        public function actionSubmitcontact()
	{
            $result = array();
            
            if(isset($_POST['contactname']) && trim($_POST['contactname'])!='')
            {
                $name = (isset($_POST['contactname']) && trim($_POST['contactname'])!='') ? trim($_POST['contactname']) : '';
                $email = (isset($_POST['contactemail']) && trim($_POST['contactemail'])!='') ? trim($_POST['contactemail']) : '';
                $phone = (isset($_POST['contactphone']) && trim($_POST['contactphone'])!='') ? trim($_POST['contactphone']) : '';
                $msg = (isset($_POST['contactmessage']) && trim($_POST['contactmessage'])!='') ? trim($_POST['contactmessage']) : '';
                
                
                $msg = '<table width="100%" border="1">
                        <tr>
                            <th width="60%" align="left"> Name </th>
                            <td width="40%" align="left">'.$name.'</td>
                        </tr>
                        <tr>
                            <th width="60%" align="left"> Email id </th>
                            <td width="40%" align="left">'.$email.'</td>
                        </tr>
                        <tr>
                            <th width="60%" align="left"> Contact Number </th>
                            <td width="40%" align="left">'.$phone.'</td>
                        </tr>
                        <tr>
                            <th width="60%" align="left"> Message </th>
                            <td width="40%" align="left">'.$msg.'</td>
                        </tr>                        
                    </table>';  
                
                
                    $subject = "New enquiry received from ".$name;
                    $message = 'New enquiry received from '.$name;
                    $message.= '<br /><br />'.$msg;

                    require_once(Yii::app()->basePath.'/../phpmail/class.phpmailer.php');  
                    require_once(Yii::app()->basePath.'/../phpmail/class.smtp.php');  
                    $mail_obj = new PHPMailer();
                    $mail_obj->IsSMTP();
                    //$mail_obj->SMTPDebug = 3;
                    $mail_obj->CharSet = 'UTF-8';
                    $mail_obj->Host = "";
                    $mail_obj->SMTPAuth= true;
                    $mail_obj->Port = 587; // 587 or 465
                    $mail_obj->Username= '';
                    $mail_obj->Password= '';
                    $mail_obj->SMTPSecure = 'tls';
                    $mail_obj->isHTML(true);
                    $mail_obj->From = 'noreply@themaestro.in';
                    $mail_obj->FromName= 'KCP Property Submit';        
                    $mail_obj->Subject = $subject;
                    $mail_obj->Body = $message;
                    $mail_obj->addAddress('om@themaestro.in');
                    if($mail_obj->send())
                    {
                        $result =  array("success"=>1, "msg"=>'Thank you for contacting us. we will contact you soon!');
                    }
                    else
                    {
                        $result =  array("success"=>0, "msg"=>'Mail sending failed. please try again!');
                    }
            }
            else
            {
                $result =  array("success"=>0, "msg"=>'please fill all the fields');
            }
            
            echo json_encode($result);
	
	} 

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
            if($error=Yii::app()->errorHandler->error)
            {
                    if(Yii::app()->request->isAjaxRequest)
                            echo $error['message'];
                    else
                            $this->render('error', $error);
            }
	}
        
	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
            $model=new ContactForm;
            if(isset($_POST['ContactForm']))
            {
                $model->attributes=$_POST['ContactForm'];
                if($model->validate())
                {
                    $mail_content = array();
                    
                    $msg = 'Name : '.$model->name.'<br />';
                    $msg.= 'Email ID : '.$model->email.'<br /><br />';
                    $msg.= 'Subject : '.$model->subject.'<br /><br/>';
                    $msg.= 'Message : <br />'.$model->body;
            
                    $email1 = array('from_name'=>'', 'to_emailid'=>'admin@myluckyzone.com', 'subject'=>'New enquiry received from '.$model->name, 'message'=>$msg);

                    array_push($mail_content, $email1);
                    $reponse = Utility::sendEmail2($mail_content); 
                
                    if($reponse['success']==1)
                    {
                       Yii::app()->user->setFlash('success','Thank you for contacting us. We will respond to you soon.');
                       $this->refresh();  
                    }
                    else
                    {
                        Yii::app()->user->setFlash('error','Mail sending failed. please try again later');
                        $this->refresh();
                    }
                }
            }
            $this->render('contact',array('model'=>$model));
	}

	        
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		//$this->redirect(Yii::app()->homeUrl);
                $this->redirect(array('site/index'));
	}
        
           
}