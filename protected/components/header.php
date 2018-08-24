<section class="top_sec">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6 top_lft">
                    <div class="soc_ico">
                        <ul>
                            <li class="tweet">
                                <a href="https://twitter.com/" target="_blank">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li class="fb">
                                <a href="https://www.facebook.com/" target="_blank">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li class="insta">
                                <a href="https://www.instagram.com/?hl=en" target="_blank">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>
                            <li class="linkd">
                                <a href="https://www.linkedin.com/uas/login" target="_blank">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </li>
                            <li class="ytube">
                                <a href="https://www.youtube.com/" target="_blank">
                                    <i class="fa fa-youtube"></i>
                                </a>
                            </li>
                            <li class="rss">
                                <a href="https://www.rss.com/" target="_blank">
                                    <i class="fa fa-rss"></i>
                                </a>
                            </li>


                        </ul>

                    </div>
                    <div class="inf_txt">
                        <p>Keeranatham, Saravanam patti, Coimbatore - 641035.</p>
                    </div>

                </div>
                <!-- /.top-left -->
                <div class="col-xs-12 col-md-6 top_rgt">
<!--                    <div class="sig_in">
                        <p><i class="fa fa-user"></i>
                            <a href="index.php#login_box" class="log_btn" data-toggle="modal"> Sign in </a> or <a class="reg_btn" href="index.php#reg_box" data-toggle="modal"> create account </a> </p>
                    </div>-->
                    <div class="submit_prop">
                        <h3 class="subm_btn"><a href="index.php#prop_box" data-toggle="modal">
                            <i class="fa fa-bars"></i>
                            <span> Submit Property </span></a>
                        </h3>
                    </div>

                </div>
                <!-- /.top-right -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Navigation -->
    <nav class="navbar" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Logo --> 
                <a class="navbar-brand" href="<?php echo Yii::app()->createUrl('site/index'); ?>"> <img src="<?php echo Yii::app()->theme->baseUrl.'/assets/images/logo.png'; ?>" alt="logo"> </a>
            </div>
            <!-- Navigation -->
            <div class="collapse navbar-collapse" id="menu">
                <ul class="nav navbar-nav navbar-right">                
                    <li><a class="<?php echo (isset(Yii::app()->session['menuid']) && Yii::app()->session['menuid']==1) ? 'active1' : ''; ?>" href="<?php echo Yii::app()->createUrl('site/index'); ?>">Home</a><li>
                    <li><a class="<?php echo (isset(Yii::app()->session['menuid']) && Yii::app()->session['menuid']==2) ? 'active1' : ''; ?>" href="<?php echo Yii::app()->createUrl('site/property'); ?>">Property </a></li>
                    <li><a class="<?php echo (isset(Yii::app()->session['menuid']) && Yii::app()->session['menuid']==3) ? 'active1' : ''; ?>" href="<?php echo Yii::app()->createUrl('site/aboutus'); ?>"> About Us </a></li>
                    <!-- <li><a class="<?php echo (isset(Yii::app()->session['menuid']) && Yii::app()->session['menuid']==4) ? 'active1' : ''; ?>" href="<?php echo Yii::app()->createUrl('site/services'); ?>">Services</a><li> -->
                    <li><a class="<?php echo (isset(Yii::app()->session['menuid']) && Yii::app()->session['menuid']==5) ? 'active1' : ''; ?>" href="<?php echo Yii::app()->createUrl('site/gallery'); ?>">Gallery</a><li>
                    <li><a class="<?php echo (isset(Yii::app()->session['menuid']) && Yii::app()->session['menuid']==6) ? 'active1' : ''; ?>" href="<?php echo Yii::app()->createUrl('site/contactus'); ?>">Contact Us</a><li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<a href="#" class="scrollToTop"></a>