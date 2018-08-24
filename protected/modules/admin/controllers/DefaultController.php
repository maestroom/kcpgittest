<?php

class DefaultController extends Controller
{
//    public function init()
//    {
//       Yii::app()->theme = 'admin';
//       parent::init();
//       
//    }
    
    public function filters()
    {
        return array(
                'accessControl', // perform access control for CRUD operations
        );
    }    
    
    public function accessRules()
    {
        return array(
                array('allow', // 
                      'actions'=>array('dashboard', 'changepassword'),
                      'users'=>array('@'),
                      'expression' => array($this,'allowOnlyAdmin'),  
                ),
        );
    }
    
    public function allowOnlyAdmin()
     {
        if(isset(Yii::app()->user->id) && (Yii::app()->user->usertype==1)) // if admin
        {
            return TRUE;
        }
     }    
    
    public function actionIndex()
    {
        $this->layout = 'column1';
        
        $login_model = new LoginFormAdmin;

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
        {
            echo CActiveForm::validate($login_model);
            Yii::app()->end();
        }

        // collect user input data
        if(isset($_POST['LoginFormAdmin']))
        {
            $login_model->attributes = $_POST['LoginFormAdmin'];
            // validate user input and redirect to the previous page if valid
            if($login_model->validate() && $login_model->login())
            {
               $this->redirect(array('dashboard'));
            }
        }
            
        $this->render('index', array('login_model'=>$login_model));
     }
     
     public function actionLogout()
     {
         Yii::app()->user->logout(false);
         $this->redirect(Yii::app()->getModule('admin')->user->loginUrl);
     }


    public function actionDashboard()
    {
         $this->render('dashboard', array());
    }
    
    public function actionChangepassword()
    {
        $model=new ChangePasswordForm();
        if(isset($_POST['ChangePasswordForm']))
        {
            $model->attributes=$_POST['ChangePasswordForm'];
            if($model->validate())
            {
                if(User::model()->updateByPk(Yii::app()->user->id,array('password'=>sha1($model->NewPassword))))
                {
                  Yii::app()->user->setFlash('success','Password updated successfully.');
                }
                else
                {
                   Yii::app()->user->setFlash('error','Password update failed. please try again'); 
                }
            }
        }
        $this->render('change_password',array('model'=>$model));
    }
}