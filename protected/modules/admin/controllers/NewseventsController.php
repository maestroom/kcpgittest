<?php

class NewseventsController extends Controller
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
				'actions'=>array('index','view','create','update','admin','delete','deleteimg',
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
		$model=new NewsEvents;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['NewsEvents']))
		{
                    $model->attributes=$_POST['NewsEvents'];
                    
                    $attachments = CUploadedFile::getInstancesByName('coverimg');
                    if(isset($attachments) && count($attachments) > 0)
                    {
                        $model->path = '/uploads/newsevents/default.jpg';
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
                            if(!is_dir(Yii::getPathOfAlias('webroot').'/uploads/newsevents'))
                            {
                                mkdir(Yii::getPathOfAlias('webroot').'/uploads/newsevents');
                            }


                            foreach ($attachments as $file => $doc)
                            { 
                                $file_name = $model->id."_newsevents_cover_".rand(1000, 9999).".".$doc->getExtensionName();
                                $path = '/uploads/newsevents/'.$file_name;

                                if($doc->saveAs(Yii::getPathOfAlias('webroot').$path))
                                {
                                    # Resize image
                                    $frame_width = 370;
                                    $frame_height = 240;
                                    if(Utility::imageResize($path, $frame_width, $frame_height))
                                    {
                                        NewsEvents::model()->updateByPk($model->id, array('path'=>$path));
                                    }
                                }    
                            }
                        }
                        
                        #upload images
                        $attachments = '';
                        $attachments = CUploadedFile::getInstancesByName('img');
                        if(isset($attachments) && count($attachments) > 0)
                        {
                            if(!is_dir(Yii::getPathOfAlias('webroot').'/uploads'))
                            {
                                mkdir(Yii::getPathOfAlias('webroot').'/uploads');
                            }
                            if(!is_dir(Yii::getPathOfAlias('webroot').'/uploads/newsevents'))
                            {
                                mkdir(Yii::getPathOfAlias('webroot').'/uploads/newsevents');
                            }


                            foreach ($attachments as $file => $doc)
                            { 
                                $file_name = $model->id."_newsevents_".rand(1000, 9999).".".$doc->getExtensionName();
                                $path = '/uploads/newsevents/'.$file_name;

                                if($doc->saveAs(Yii::getPathOfAlias('webroot').$path))
                                {
                                    # Resize image
                                    $frame_width = 370;
                                    $frame_height = 240;
                                    if(Utility::imageResize($path, $frame_width, $frame_height))
                                    {
                                        $image_model = new NewsEventsImages();
                                        $image_model->news_event_id = $model->id;
                                        $image_model->path = $path;
                                        $image_model->view_order = 1;
                                        $image_model->status = 1;
                                        $image_model->save();
                                    }
                                }    
                            }
                        }
                        
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

		if(isset($_POST['NewsEvents']))
		{
                    $model->attributes=$_POST['NewsEvents'];
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
                            if(!is_dir(Yii::getPathOfAlias('webroot').'/uploads/newsevents'))
                            {
                                mkdir(Yii::getPathOfAlias('webroot').'/uploads/newsevents');
                            }


                            foreach ($attachments as $file => $doc)
                            { 
                                $file_name = $model->id."_newsevents_cover_".rand(1000, 9999).".".$doc->getExtensionName();
                                $path = '/uploads/newsevents/'.$file_name;

                                if($doc->saveAs(Yii::getPathOfAlias('webroot').$path))
                                {
                                    # Resize image
                                    $frame_width = 370;
                                    $frame_height = 240;
                                    if(Utility::imageResize($path, $frame_width, $frame_height))
                                    {
                                        NewsEvents::model()->updateByPk($model->id, array('path'=>$path));
                                    }
                                }    
                            }
                        }
                        
                        #upload images
                        $attachments = '';
                        $attachments = CUploadedFile::getInstancesByName('img');
                        if(isset($attachments) && count($attachments) > 0)
                        {
                            if(!is_dir(Yii::getPathOfAlias('webroot').'/uploads'))
                            {
                                mkdir(Yii::getPathOfAlias('webroot').'/uploads');
                            }
                            if(!is_dir(Yii::getPathOfAlias('webroot').'/uploads/newsevents'))
                            {
                                mkdir(Yii::getPathOfAlias('webroot').'/uploads/newsevents');
                            }


                            foreach ($attachments as $file => $doc)
                            { 
                                $file_name = $model->id."_newsevents_".rand(1000, 9999).".".$doc->getExtensionName();
                                $path = '/uploads/newsevents/'.$file_name;

                                if($doc->saveAs(Yii::getPathOfAlias('webroot').$path))
                                {
                                    # Resize image
                                    $frame_width = 370;
                                    $frame_height = 240;
                                    if(Utility::imageResize($path, $frame_width, $frame_height))
                                    {
                                        $image_model = new NewsEventsImages();
                                        $image_model->news_event_id = $model->id;
                                        $image_model->path = $path;
                                        $image_model->view_order = 1;
                                        $image_model->status = 1;
                                        $image_model->save();
                                    }
                                }    
                            }
                        }
                        
			$success_msg = 'Successfully updated';
                        Yii::app()->user->setFlash('success', $success_msg);
                            
                        $this->redirect(array('admin'));
                    }    
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
        
        public function actionDeleteimg()
	{
            $get_path = NewsEventsImages::model()->findByPk($_POST['id'])->path;            
            NewsEventsImages::model()->deleteByPk($_POST['id']);
            echo 1;
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
                        NewsEvents::model()->updateByPk($id, array('status'=>0));

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
		$dataProvider=new CActiveDataProvider('NewsEvents');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	* Manages all models.
	*/
	public function actionAdmin()
	{
		$model=new NewsEvents('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['NewsEvents']))
			$model->attributes=$_GET['NewsEvents'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	* Returns the data model based on the primary key given in the GET variable.
	* If the data model is not found, an HTTP exception will be raised.
	* @param integer $id the ID of the model to be loaded
	* @return NewsEvents the loaded model
	* @throws CHttpException
	*/
	public function loadModel($id)
	{
		$model=NewsEvents::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	* Performs the AJAX validation.
	* @param NewsEvents $model the model to be validated
	*/
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='news-events-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}