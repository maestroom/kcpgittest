<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl.'/images/mlz-logo1.png'; ?>"/>
    <title>KCP Admin</title>
    
    <link href="<?php echo Yii::app()->theme->baseUrl.'/assets'; ?>/css/custom.css" rel="stylesheet">
    
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo Yii::app()->theme->baseUrl.'/assets'; ?>/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="<?php echo Yii::app()->theme->baseUrl.'/assets'; ?>/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo Yii::app()->theme->baseUrl.'/assets'; ?>/dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo Yii::app()->theme->baseUrl.'/assets'; ?>/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <?php
        Yii::app()->clientScript->registerCoreScript('jquery', CClientScript::POS_END);
        Yii::app()->clientScript->registerCoreScript('jquery.ui', CClientScript::POS_END);
    ?>
    
    <!-- jQuery -->
    <script src="<?php echo Yii::app()->theme->baseUrl.'/assets'; ?>/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo Yii::app()->theme->baseUrl.'/assets'; ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo Yii::app()->theme->baseUrl.'/assets'; ?>/bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo Yii::app()->theme->baseUrl.'/assets'; ?>/dist/js/sb-admin-2.js"></script>
    

</head>

<body>
    
    
    <div class="container">
        <?php echo $content; ?>
    </div>    

</body>

</html>




