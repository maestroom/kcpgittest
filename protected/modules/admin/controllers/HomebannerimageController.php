<?php

class HomebannerimageController extends Controller
{
	/**
	* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	* using two-column layout. See 'protected/views/layouts/column2.php'.
	*/
	public $layout='//layouts/column2';

	/**
	* @return array action filters
	*/
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	* Specifies the access control rules.
	* This method is used by the 'accessControl' filter.
	* @return array access control rules
	*/
	        
        public function accessRules()
	{
		return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','view','create','update','admin','delete',
                                    ),
				'users'=>array('@'),
                                'expression' => array($this,'allowOnlyAdmin'),  
			),
			array('deny',  // deny all users
				'users'=>array('*'),
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
         
         
        

	/**
	* Displays a particular model.
	* @param integer $id the ID of the model to be displayed
	*/
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	* Creates a new model.
	* If creation is successful, the browser will be redirected to the 'view' page.
	*/
	public function actionCreate()
	{
		$model=new HomeBannerImage;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['HomeBannerImage']))
		{
			$model->attributes=$_POST['HomeBannerImage'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
		'model'=>$model,
		));
	}

	/**
	* Updates a particular model.
	* If update is successful, the browser will be redirected to the 'view' page.
	* @param integer $id the ID of the model to be updated
	*/
	public function actionUpdate()
        {
            $model = HomeBannerImage::model()->find();
            if(empty($model))
            {
                $model = new HomeBannerImage();
            }

            if(isset($_POST['HomeBannerImage']))
            {
                $model->attributes = $_POST['HomeBannerImage'];
                if($model->save())
                {
                    $attachments = CUploadedFile::getInstancesByName('bannerimage');
                    if(isset($attachments) && count($attachments) > 0)
                    {
                        if(!is_dir(Yii::getPathOfAlias('webroot').'/uploads'))
                        {
                            mkdir(Yii::getPathOfAlias('webroot').'/uploads');
                        }
                        if(!is_dir(Yii::getPathOfAlias('webroot').'/uploads/banner'))
                        {
                            mkdir(Yii::getPathOfAlias('webroot').'/uploads/banner');
                        }
                        
                        if($model->path!='' && $model->path!='/uploads/banner/default.jpg')
                        {
                            unlink(Yii::getPathOfAlias('webroot').$model->path);
                        }
                        
                        foreach ($attachments as $file => $doc)
                        { 
                            $file_name = $model->id."_banner.".$doc->getExtensionName();
                            $path = '/uploads/banner/'.$file_name;

                            if($doc->saveAs(Yii::getPathOfAlias('webroot').$path))
                            {
                                # Resize image
                                $frame_width = 1250;
                                $frame_height = 330;
                                if(Utility::imageResize($path, $frame_width, $frame_height))
                                {
                                    HomeBannerImage::model()->updateByPk($model->id, array('path'=>$path));
                                    
                                    #reload model
                                    $model = HomeBannerImage::model()->find();
                                }
                            }    
                        }
                    }
                    
                    $success_msg = 'Successfully Updated';
                    Yii::app()->user->setFlash('success', $success_msg);
                }    
            }        

            $this->render('update', array('model'=>$model));
        }

	/**
	* Deletes a particular model.
	* If deletion is successful, the browser will be redirected to the 'admin' page.
	* @param integer $id the ID of the model to be deleted
	*/
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	* Lists all models.
	*/
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('HomeBannerImage');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	* Manages all models.
	*/
	public function actionAdmin()
	{
		$model=new HomeBannerImage('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['HomeBannerImage']))
			$model->attributes=$_GET['HomeBannerImage'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	* Returns the data model based on the primary key given in the GET variable.
	* If the data model is not found, an HTTP exception will be raised.
	* @param integer $id the ID of the model to be loaded
	* @return HomeBannerImage the loaded model
	* @throws CHttpException
	*/
	public function loadModel($id)
	{
		$model=HomeBannerImage::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	* Performs the AJAX validation.
	* @param HomeBannerImage $model the model to be validated
	*/
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='home-banner-image-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}