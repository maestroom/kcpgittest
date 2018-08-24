<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'KCP Promoters',

        'theme' => 'bootstraptheme',
    
        'timeZone' => 'Asia/Kolkata',
    
        'aliases' => array('bootstrap' => 'ext.bootstrap',
                           'chartjs'=>'ext.yii-chartjs',
                         ),
    
    
	// preloading 'log' component
	'preload'=>array('log','chartjs'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
                'bootstrap.behaviors.*',
                'bootstrap.helpers.*',
                'bootstrap.widgets.*',
	),

	'modules'=>array(
            
                'admin',
		// uncomment the following to enable the Gii tool
		/*
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'xxxx',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			//'ipFilters'=>array('127.0.0.1','::1'),
                        'ipFilters'=>array('192.168.1.*','::1'),
                        'generatorPaths' => array('bootstrap.gii'),
		),
		*/
            
                'forum'=>array('class'=>'application.modules.yii-forum.YiiForumModule',),
	    ),

	// application components
	'components'=>array(
            
            'chartjs' => array('class' => 'chartjs.components.ChartJs'),
            
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
                    
                        //'stateKeyPrefix' => 'some_shared_prefix',
		),
            
                 'bootstrap' => array('class' => 'bootstrap.components.BsApi'),
            
            
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
                        'showScriptName'=>false,
                        'caseSensitive'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		/* 'db'=>array('connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db'), */
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=kcp',
			'emulatePrepare' => true,
			'username' => 'kcp',
			'password' => 'kcp',
			'charset' => 'utf8',
		),
           
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
            
                'image'=>array('class'=>'application.extensions.image.CImageComponent','driver'=>'GD'),
  	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',             
            
                'defaultPageSize' => 10,
                'pageSizeOptions'=>array(10=>10,20=>20,50=>50,100=>100),
	),
);