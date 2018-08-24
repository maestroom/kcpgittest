<?php

class AdminModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
                
		$this->setImport(array(
			'admin.models.*',
			'admin.components.*',
		));
                
                $this->setComponents(array(
                            'errorHandler' => array(
                                'errorAction' => 'admin/default/error'),
                            'user' => array(
                                'class' => 'CWebUser',             
                                'loginUrl' => Yii::app()->createUrl('admin/default/index'),
                            )
                        ));

                Yii::app()->user->setStateKeyPrefix('_admin');   
                
                Yii::app()->theme = 'admin';
                
                $this->layoutPath = Yii::getPathOfAlias('webroot.themes.admin.views.layouts');
                $this->layout = 'column2';
                
     
              
	}

	public function beforeControllerAction($controller, $action)
	{
            if(parent::beforeControllerAction($controller, $action))
            {
                    // this method is called before any module controller action is performed
                    // you may place customized code here
                $controller->layout = 'column2';
                $route = $controller->id . '/' . $action->id;
               // echo $route;
                $publicPages = array(
                    'default/index',
                    'default/error',
                );
                if(Yii::app()->user->isGuest && !in_array($route, $publicPages))
                 {            
                    Yii::app()->getModule('admin')->user->loginRequired();                
                  }
                else
                {
                    return true;  
                 }   
            }
            else
            {
                 return false;
            }
	}
}
