

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>KCP Admin</title>
    <!--<link rel="shortcut icon" href="<?php //echo Yii::app()->baseUrl.'/images/logo.png'; ?>"/>-->    
    
    <link href="<?php echo Yii::app()->theme->baseUrl.'/assets'; ?>/css/custom.css" rel="stylesheet">
    
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo Yii::app()->theme->baseUrl.'/assets'; ?>/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="<?php echo Yii::app()->theme->baseUrl.'/assets'; ?>/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
       <!-- Social Buttons CSS -->
    <link href="<?php echo Yii::app()->theme->baseUrl.'/assets'; ?>/bower_components/bootstrap-social/bootstrap-social.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo Yii::app()->theme->baseUrl.'/assets'; ?>/dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo Yii::app()->theme->baseUrl.'/assets'; ?>/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Timeline CSS 
    <link href="<?php //echo Yii::app()->theme->baseUrl.'/assets'; ?>/css/timeline.css" rel="stylesheet">
    -->
    <!-- Morris Charts CSS -->
    <link href="<?php echo Yii::app()->theme->baseUrl.'/assets'; ?>/bower_components/morrisjs/morris.css" rel="stylesheet">
    
    <!-- DataTables CSS -->
    <link href="<?php echo Yii::app()->theme->baseUrl.'/assets'; ?>/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo Yii::app()->theme->baseUrl.'/assets'; ?>/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">


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
    
    
    <!-- jQuery 
    <script src="<?php //echo Yii::app()->theme->baseUrl.'/assets'; ?>/bower_components/jquery/dist/jquery.min.js"></script> --> 
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo Yii::app()->theme->baseUrl.'/assets'; ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo Yii::app()->theme->baseUrl.'/assets'; ?>/bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo Yii::app()->theme->baseUrl.'/assets'; ?>/dist/js/sb-admin-2.js"></script>
    
     <!-- Flot Charts JavaScript 
    <script src="<?php //echo Yii::app()->theme->baseUrl.'/assets'; ?>/bower_components/flot/excanvas.min.js"></script>
    <script src="<?php //echo Yii::app()->theme->baseUrl.'/assets'; ?>/bower_components/flot/jquery.flot.js"></script>
    <script src="<?php //echo Yii::app()->theme->baseUrl.'/assets'; ?>/bower_components/flot/jquery.flot.pie.js"></script>
    <script src="<?php //echo Yii::app()->theme->baseUrl.'/assets'; ?>/bower_components/flot/jquery.flot.resize.js"></script>
    <script src="<?php //echo Yii::app()->theme->baseUrl.'/assets'; ?>/bower_components/flot/jquery.flot.time.js"></script>
    <script src="<?php //echo Yii::app()->theme->baseUrl.'/assets'; ?>/bower_components/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="<?php //echo Yii::app()->theme->baseUrl.'/assets'; ?>/js/flot-data.js"></script>
    -->
    
    <!-- Morris Charts JavaScript 
    <script src="<?php //echo Yii::app()->theme->baseUrl.'/assets'; ?>/bower_components/raphael/raphael-min.js"></script>
    <script src="<?php //echo Yii::app()->theme->baseUrl.'/assets'; ?>/bower_components/morrisjs/morris.min.js"></script>
    <script src="<?php //echo Yii::app()->theme->baseUrl.'/assets'; ?>/js/morris-data.js"></script>
    -->
        <!-- DataTables JavaScript 
    <script src="<?php //echo Yii::app()->theme->baseUrl.'/assets'; ?>/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php //echo Yii::app()->theme->baseUrl.'/assets'; ?>/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    -->
    
    <!-- Page-Level Demo Scripts - Notifications - Use for reference 
    <script>
    // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })

    // popover demo
    $("[data-toggle=popover]")
        .popover()
    </script>
    -->
    <!-- Page-Level Demo Scripts - Tables - Use for reference 
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
    -->
    
    
    <!-- jquery-ui multiselect dropdown --> 
    <link href="<?php echo Yii::app()->theme->baseUrl.'/assets'; ?>/css/jquery.multiselect.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl.'/assets'; ?>/css/jquery.multiselect.filter.css" rel="stylesheet">
    <script src="<?php echo Yii::app()->theme->baseUrl.'/assets'; ?>/js/jquery.multiselect.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl.'/assets'; ?>/js/jquery.multiselect.filter.min.js"></script>
                
    <!-- on key press numbers only function -->
    <script src="<?php echo Yii::app()->theme->baseUrl.'/assets'; ?>/js/custom.js"></script>
    
</head>

<body>

    <div id="wrapper">
               

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                   
                <div class="col-md-3 col-lg-4 col-sm-4 col-xs-12 " >
                    <a class="navbar-brand" href="<?php echo Yii::app()->createUrl('/admin/default/dashboard'); ?>">KCP</a>
                 </div>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                             
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php echo 'Welcome '.Yii::app()->user->name; ?>
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <!--<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a></li>-->
                        <li><a href="<?php echo Yii::app()->createUrl('/admin/default/changepassword'); ?>"><i class="fa fa-gear fa-fw"></i> Change Password</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo Yii::app()->createUrl('/admin/default/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse" style="height: 600px; overflow-y: scroll;">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="<?php echo Yii::app()->createUrl('/admin/default/dashboard'); ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-home"></i> Home Page <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo Yii::app()->createUrl('/admin/homebannerimage/update'); ?>">Banner</a>
                                </li>
                                <li>
                                    <a href="<?php echo Yii::app()->createUrl('/admin/homegallery/admin'); ?>">Gallery</a>
                                </li>
                                <li>
                                    <a href="<?php echo Yii::app()->createUrl('/admin/testimonials/admin'); ?>">Testimonials</a>
                                </li>
                                <li>
                                    <a href="<?php echo Yii::app()->createUrl('/admin/newsevents/admin'); ?>">News & Events</a>
                                </li>                                
                                <li>
                                    <a href="<?php echo Yii::app()->createUrl('/admin/clients/admin'); ?>">Clients</a>
                                </li>
                            </ul>
                        </li>
                        
                        <li>
                            <a href="<?php echo Yii::app()->createUrl('/admin/property/admin'); ?>"><i class="fa fa-building"></i> Property Page</a>
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-newspaper-o"></i> About us Page <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo Yii::app()->createUrl('/admin/aboutus/update'); ?>">About us</a>
                                </li>
                                <li>
                                    <a href="<?php echo Yii::app()->createUrl('/admin/aboutusgallery/admin'); ?>">Gallery</a>
                                </li>
                                <li>
                                    <a href="<?php echo Yii::app()->createUrl('/admin/whatwedo/admin'); ?>">What we do</a>
                                </li>                                
                            </ul>
                        </li>
                        
                        <li>
                            <a href="<?php echo Yii::app()->createUrl('/admin/metatag/admin'); ?>"><i class="fa fa-flash"></i> Manage Meta Details</a>
                        </li>
                                    
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <?php echo $content; ?>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
</body>

</html>

