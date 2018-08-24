<?php

class PropertyController extends Controller
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
		$model=new Property;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Property']))
		{
                    $model->attributes=$_POST['Property'];
                    
                    $model->overview = (isset($_POST['Property']['overview']) && trim($_POST['Property']['overview']!='')) ? trim($_POST['Property']['overview']) : '';
                    $model->builder = (isset($_POST['Property']['builder']) && trim($_POST['Property']['builder']!='')) ? trim($_POST['Property']['builder']) : '';
                    $model->amenities = (isset($_POST['Property']['amenities']) && trim($_POST['Property']['amenities']!='')) ? trim($_POST['Property']['amenities']) : '';
                    $model->specifications = (isset($_POST['Property']['specifications']) && trim($_POST['Property']['specifications']!='')) ? trim($_POST['Property']['specifications']) : '';
                    $model->map_location = (isset($_POST['Property']['map_location']) && trim($_POST['Property']['map_location']!='')) ? trim($_POST['Property']['map_location']) : '';
                    $model->master_plan = '';
                    
                    $attachments = CUploadedFile::getInstancesByName('coverimg');
                    if(isset($attachments) && count($attachments) > 0)
                    {
                        $model->path = '/uploads/property/default.jpg';
                    }
                    else
                    {
                        $model->path = '';
                    }
                    
                    if($model->save())
                    {
                        #upload cover image
                        $attachments = CUploadedFile::getInstancesByName('coverimg');
                        if(isset($attachments) && count($attachments) > 0)
                        {
                            if(!is_dir(Yii::getPathOfAlias('webroot').'/uploads'))
                            {
                                mkdir(Yii::getPathOfAlias('webroot').'/uploads');
                            }
                            if(!is_dir(Yii::getPathOfAlias('webroot').'/uploads/property'))
                            {
                                mkdir(Yii::getPathOfAlias('webroot').'/uploads/property');
                            }


                            foreach ($attachments as $file => $doc)
                            { 
                                $file_name = $model->id."_property_cover_".rand(1000, 9999).".".$doc->getExtensionName();
                                $path = '/uploads/property/'.$file_name;

                                if($doc->saveAs(Yii::getPathOfAlias('webroot').$path))
                                {
                                    # Resize image
                                    $frame_width = 370;
                                    $frame_height = 240;
                                    if(Utility::imageResize($path, $frame_width, $frame_height))
                                    {
                                        Property::model()->updateByPk($model->id, array('path'=>$path));
                                    }
                                }    
                            }
                        }
                        
                        #upload images
                        $attachments = '';
                        $attachments = CUploadedFile::getInstancesByName('masterplan');
                        if(isset($attachments) && count($attachments) > 0)
                        {
                            if(!is_dir(Yii::getPathOfAlias('webroot').'/uploads'))
                            {
                                mkdir(Yii::getPathOfAlias('webroot').'/uploads');
                            }
                            if(!is_dir(Yii::getPathOfAlias('webroot').'/uploads/property'))
                            {
                                mkdir(Yii::getPathOfAlias('webroot').'/uploads/property');
                            }


                            foreach ($attachments as $file => $doc)
                            { 
                                $file_name = $model->id."_masterplan.".$doc->getExtensionName();
                                $path = '/uploads/property/'.$file_name;

                                if($doc->saveAs(Yii::getPathOfAlias('webroot').$path))
                                {
                                    # Resize image
                                    $frame_width = 1150;
                                    $frame_height = 500;
                                    if(Utility::imageResize($path, $frame_width, $frame_height))
                                    {
                                        Property::model()->updateByPk($model->id, array('master_plan'=>$path));
                                    }
                                }    
                            }
                        }
                        
                        /*
                        $attachments = "";
                        $attachments = CUploadedFile::getInstancesByName('maplocation');
                        if(isset($attachments) && count($attachments) > 0)
                        {
                            if(!is_dir(Yii::getPathOfAlias('webroot').'/uploads'))
                            {
                                mkdir(Yii::getPathOfAlias('webroot').'/uploads');
                            }
                            if(!is_dir(Yii::getPathOfAlias('webroot').'/uploads/property'))
                            {
                                mkdir(Yii::getPathOfAlias('webroot').'/uploads/property');
                            }


                            foreach ($attachments as $file => $doc)
                            { 
                                $file_name = $model->id."_maplocation.".$doc->getExtensionName();
                                $path = '/uploads/property/'.$file_name;

                                if($doc->saveAs(Yii::getPathOfAlias('webroot').$path))
                                {
                                    # Resize image
                                    $frame_width = 1150;
                                    $frame_height = 500;
                                    if(Utility::imageResize($path, $frame_width, $frame_height))
                                    {
                                        Property::model()->updateByPk($model->id, array('map_location'=>$path));
                                    }
                                }    
                            }
                        }
                        */
                        
                        $success_msg = 'Successfully added';
                        Yii::app()->user->setFlash('success', $success_msg);
                        
                        $this->redirect(array('admin'));
                    }
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
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Property']))
		{
                    $model->attributes=$_POST['Property'];
                    
                    $model->overview = (isset($_POST['Property']['overview']) && trim($_POST['Property']['overview']!='')) ? trim($_POST['Property']['overview']) : '';
                    $model->builder = (isset($_POST['Property']['builder']) && trim($_POST['Property']['builder']!='')) ? trim($_POST['Property']['builder']) : '';
                    $model->amenities = (isset($_POST['Property']['amenities']) && trim($_POST['Property']['amenities']!='')) ? trim($_POST['Property']['amenities']) : '';
                    $model->specifications = (isset($_POST['Property']['specifications']) && trim($_POST['Property']['specifications']!='')) ? trim($_POST['Property']['specifications']) : '';
                    $model->map_location = (isset($_POST['Property']['map_location']) && trim($_POST['Property']['map_location']!='')) ? trim($_POST['Property']['map_location']) : '';
                    
                    if($model->save())
                    {
                        #upload cover image
                        $attachments = CUploadedFile::getInstancesByName('coverimg');
                        if(isset($attachments) && count($attachments) > 0)
                        {
                            if(!is_dir(Yii::getPathOfAlias('webroot').'/uploads'))
                            {
                                mkdir(Yii::getPathOfAlias('webroot').'/uploads');
                            }
                            if(!is_dir(Yii::getPathOfAlias('webroot').'/uploads/property'))
                            {
                                mkdir(Yii::getPathOfAlias('webroot').'/uploads/property');
                            }


                            foreach ($attachments as $file => $doc)
                            { 
                                $file_name = $model->id."_property_cover_".rand(1000, 9999).".".$doc->getExtensionName();
                                $path = '/uploads/property/'.$file_name;

                                if($doc->saveAs(Yii::getPathOfAlias('webroot').$path))
                                {
                                    # Resize image
                                    $frame_width = 370;
                                    $frame_height = 240;
                                    if(Utility::imageResize($path, $frame_width, $frame_height))
                                    {
                                        Property::model()->updateByPk($model->id, array('path'=>$path));
                                    }
                                }    
                            }
                        }
                        
                        #upload images
                        $attachments = '';
			$attachments = CUploadedFile::getInstancesByName('masterplan');
                        if(isset($attachments) && count($attachments) > 0)
                        {
                            if(!is_dir(Yii::getPathOfAlias('webroot').'/uploads'))
                            {
                                mkdir(Yii::getPathOfAlias('webroot').'/uploads');
                            }
                            if(!is_dir(Yii::getPathOfAlias('webroot').'/uploads/property'))
                            {
                                mkdir(Yii::getPathOfAlias('webroot').'/uploads/property');
                            }


                            foreach ($attachments as $file => $doc)
                            { 
                                $file_name = $model->id."_masterplan.".$doc->getExtensionName();
                                $path = '/uploads/property/'.$file_name;

                                if($doc->saveAs(Yii::getPathOfAlias('webroot').$path))
                                {
                                    # Resize image
                                    $frame_width = 1150;
                                    $frame_height = 500;
                                    if(Utility::imageResize($path, $frame_width, $frame_height))
                                    {
                                        Property::model()->updateByPk($model->id, array('master_plan'=>$path));
                                    }
                                }    
                            }
                        }
                        
                        /*
                        $attachments = "";
                        $attachments = CUploadedFile::getInstancesByName('maplocation');
                        if(isset($attachments) && count($attachments) > 0)
                        {
                            if(!is_dir(Yii::getPathOfAlias('webroot').'/uploads'))
                            {
                                mkdir(Yii::getPathOfAlias('webroot').'/uploads');
                            }
                            if(!is_dir(Yii::getPathOfAlias('webroot').'/uploads/property'))
                            {
                                mkdir(Yii::getPathOfAlias('webroot').'/uploads/property');
                            }


                            foreach ($attachments as $file => $doc)
                            { 
                                $file_name = $model->id."_maplocation.".$doc->getExtensionName();
                                $path = '/uploads/property/'.$file_name;

                                if($doc->saveAs(Yii::getPathOfAlias('webroot').$path))
                                {
                                    # Resize image
                                    $frame_width = 1150;
                                    $frame_height = 500;
                                    if(Utility::imageResize($path, $frame_width, $frame_height))
                                    {
                                        Property::model()->updateByPk($model->id, array('map_location'=>$path));
                                    }
                                }    
                            }
                        }
                        */
                        
                        $success_msg = 'Successfully updated';
                        Yii::app()->user->setFlash('success', $success_msg);
                        
                        $this->redirect(array('admin'));
                    }    
		}

		$this->render('update',array(
			'model'=>$model,
		));
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
			//$this->loadModel($id)->delete();
                        Property::model()->updateByPk($id, array('status'=>0));

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
		$dataProvider=new CActiveDataProvider('Property');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	* Manages all models.
	*/
	public function actionAdmin()
	{
		$model=new Property('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Property']))
			$model->attributes=$_GET['Property'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	* Returns the data model based on the primary key given in the GET variable.
	* If the data model is not found, an HTTP exception will be raised.
	* @param integer $id the ID of the model to be loaded
	* @return Property the loaded model
	* @throws CHttpException
	*/
	public function loadModel($id)
	{
		$model=Property::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	* Performs the AJAX validation.
	* @param Property $model the model to be validated
	*/
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='property-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}