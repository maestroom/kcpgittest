<?php

class PropertygalleryController extends Controller
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
            if(!isset($_GET['propertyid']) || trim($_GET['propertyid'])<=0)
            {
                $this->redirect(array('property/admin'));
            }
            else
            {
                $property_id = trim($_GET['propertyid']);
            }
            
            
            $model=new PropertyGallery;

            if(isset($_POST['PropertyGallery']))
            {
                $model->attributes=$_POST['PropertyGallery'];
                $model->property_id = $property_id;
                
                $attachments = CUploadedFile::getInstancesByName('img');
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
                    $attachments = CUploadedFile::getInstancesByName('img');
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
                            $file_name = $model->id."_gallery.".$doc->getExtensionName();
                            $path = '/uploads/property/'.$file_name;

                            if($doc->saveAs(Yii::getPathOfAlias('webroot').$path))
                            {
                                # Resize image
                                $frame_width = 770;
                                $frame_height = 435;
                                if(Utility::imageResize($path, $frame_width, $frame_height))
                                {
                                    PropertyGallery::model()->updateByPk($model->id, array('path'=>$path));
                                }
                            }    
                        }
                    }

                    $success_msg = 'Successfully added';
                    Yii::app()->user->setFlash('success', $success_msg);

                    $this->redirect(array('admin', 'propertyid'=>$property_id));
                }
            }

            $this->render('create',array('model'=>$model, 'property_id'=>$property_id,));
	}

	/**
	* Updates a particular model.
	* If update is successful, the browser will be redirected to the 'view' page.
	* @param integer $id the ID of the model to be updated
	*/
	public function actionUpdate($id, $propertyid)
	{
		$model=$this->loadModel($id);

		if(isset($_POST['PropertyGallery']))
		{
                    $model->attributes=$_POST['PropertyGallery'];
                    if($model->save())
                    {
                        $attachments = CUploadedFile::getInstancesByName('img');
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
                                $file_name = $model->id."_gallery.".$doc->getExtensionName();
                                $path = '/uploads/property/'.$file_name;

                                if($doc->saveAs(Yii::getPathOfAlias('webroot').$path))
                                {
                                    # Resize image
                                    $frame_width = 770;
                                    $frame_height = 435;
                                    if(Utility::imageResize($path, $frame_width, $frame_height))
                                    {
                                        PropertyGallery::model()->updateByPk($model->id, array('path'=>$path));
                                    }
                                }    
                            }
                        }

                        $success_msg = 'Successfully added';
                        Yii::app()->user->setFlash('success', $success_msg);

                        $this->redirect(array('admin', 'propertyid'=>$propertyid));
                    }
		}

		$this->render('update',array('model'=>$model, 'property_id'=>$propertyid,));
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
		$dataProvider=new CActiveDataProvider('PropertyGallery');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	* Manages all models.
	*/
	public function actionAdmin()
	{
            if(!isset($_GET['propertyid']) || trim($_GET['propertyid'])<=0)
            {
                $this->redirect(array('property/admin'));
            }
            else
            {
                $property_id = trim($_GET['propertyid']);
            }
            
            $model=new PropertyGallery('search');
            $model->unsetAttributes();  // clear any default values
            if(isset($_GET['PropertyGallery']))
                    $model->attributes=$_GET['PropertyGallery'];

            $this->render('admin',array('model'=>$model, 'property_id'=>$property_id));
	}

	/**
	* Returns the data model based on the primary key given in the GET variable.
	* If the data model is not found, an HTTP exception will be raised.
	* @param integer $id the ID of the model to be loaded
	* @return PropertyGallery the loaded model
	* @throws CHttpException
	*/
	public function loadModel($id)
	{
		$model=PropertyGallery::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	* Performs the AJAX validation.
	* @param PropertyGallery $model the model to be validated
	*/
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='property-gallery-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}