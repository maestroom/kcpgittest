
<link href="<?php echo Yii::app()->theme->baseUrl.'/assets/css/jquery.bxslider.css'; ?>" rel="stylesheet">
<script src="<?php echo Yii::app()->theme->baseUrl.'/assets/js/jquery.bxslider.min.js'; ?>"></script>


<!-- Header bradcrumb -->
    <header class="bread_crumb">
        <div class="pag_titl_sec">
            <h1 class="pag_titl"> Property Details </h1>
            <h4 class="sub_titl">  </h4>
        </div>
        <div class="pg_links">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p class="lnk_pag"><a href="<?php echo Yii::app()->createUrl('site/index'); ?>"> Home </a> </p>
                        <p class="lnk_pag"> / </p>
                        <p class="lnk_pag"> Property Details </p>
                    </div>
                    <div class="col-md-6 text-right">
                        <p class="lnk_pag"><a href="<?php echo Yii::app()->createUrl('site/index'); ?>"> Go Back to Home </a> </p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <?php
    
    if(isset($model) && !empty($model))
    {
        $property_title = (isset($model->title) && $model->title!='') ? $model->title : '';
        $property_type = (isset($model->type) && $model->type!='') ? $model->type : '';
        $property_sqft = (isset($model->sqft) && $model->sqft!='') ? $model->sqft : '';        
        $property_path = (isset($model->path) && $model->path!='') ? $model->path : '';
        $property_master_plan = (isset($model->master_plan) && $model->master_plan!='') ? $model->master_plan : '';
        $property_map_location = (isset($model->map_location) && $model->map_location!='') ? $model->map_location : '';
        $property_overview = (isset($model->overview) && $model->overview!='') ? $model->overview : '';
        $property_specifications = (isset($model->specifications) && $model->specifications!='') ? $model->specifications : '';
        $property_builder = (isset($model->builder) && $model->builder!='') ? $model->builder : '';
        $property_amenities = (isset($model->amenities) && $model->amenities!='') ? $model->amenities : '';
    }
    
    ?>

    <div class="spacer-60"></div>
    <div class="container">
        <div class="row">
            
            <!-- Proerty Details Section -->
            <section id="prop_detal" class="col-md-8">
                <div class="row">
                    <h3 class="sec_titl"> <?php echo $property_title; ?> </h3>
                    <div class="col_labls larg_labl">
                        <p class="or_labl"> <?php echo $property_type; ?> </p>
                        <p class="blu_labl">SQFT : <?php echo $property_sqft; ?> </p>
                    </div>			
							
                    <div class="panel panel-default">
                        <?php
                            $get_property_gallery = PropertyGallery::model()->findAll(array('condition'=>'status=1 AND property_id='.$model->id, 'order'=>'view_order'));
                            if(!empty($get_property_gallery))
                            {
                        ?>
                                <!-- Proerty Slider Images -->
                                <div class="panel-image">
                                    <ul id="prop_slid">
                                        <?php
                                            foreach ($get_property_gallery as $property_gallery)
                                            {
                                                echo '<li><img class="img-responsive" src="'.Yii::app()->baseUrl.$property_gallery->path.'" alt="Property Slide Image"></li>';
                                            }
                                        ?>    
                                    </ul>
                                    <!-- Proerty Slider Thumbnails -->
                                    <div class="col-md-12 rel_img">
                                        <ul id="slid_nav">
                                            <?php
                                                $img_counter = 0;
                                                foreach ($get_property_gallery as $property_gallery)
                                                {
                                                    echo '<li><a data-slide-index="'.$img_counter++.'" href=""><img class="img-responsive img-hover" src="'.Yii::app()->baseUrl.$property_gallery->path.'" alt=""></a></li>';
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                        <?php
                            }
                        ?>
                    </div>
                    
                </div>
                <!-- /.row -->

                <div class="spacer-30"></div>
            </section>

            <!-- Sidebar Section -->
            <section id="sidebar" class="col-md-4">
                 <?php include 'contact_form.php'; ?>
            </section>
			
            <div class="spacer-30"></div>
            
            <div class="menu">
		<nav class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="navbar-header page-scroll">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#sticky-nav">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="sticky-nav">
                            <ul class="nav navbar-nav">
                                <!-- Hidden li included to remove active class from about link when scrolled up past about section -->

                                <li>
                                    <a class="page-scroll" href="#masterplan">Master Plan</a>
                                </li>
                                <li>
                                    <a class="page-scroll" href="#locationmap">Location Map</a>
                                </li>
                                <li>
                                    <a class="page-scroll" href="#overview">Overview</a>
                                </li>
                                                    <li>
                                    <a class="page-scroll" href="#amenities">Amenities</a>
                                </li>
                                <li>
                                    <a class="page-scroll" href="#neighbourhood">Neighbourhood</a>
                                </li>
                                <li>
                                    <a class="page-scroll" href="#specifications">Specifications</a>
                                </li>
                                <li>
                                    <a class="page-scroll" href="#photosection">Photos</a>
                                </li>
                                <li>
                                    <a class="page-scroll" href="#videosection">Videos</a>
                                </li>
                                <li>
                                    <a class="page-scroll" href="#builder">Builder</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                <!-- /.container -->
                </nav>
            </div>
            
            <div class="spacer-30"></div>
            
            <section id="masterplan" class="content-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4>Master Plan</h4>
                            <hr>
                            <img src="<?php echo Yii::app()->baseUrl.$property_master_plan; ?>" alt="master-plan" title="master-plan"/>
                        </div>
                    </div>
                </div>
            </section>
            
            <div class="spacer-30"></div>
            
            <section id="locationmap" class="content-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4>Location Map</h4>
                            <hr>
                            <div class="map_ara map-container">
                                  <iframe width="1000" height="350" src="https://maps.google.it/maps?q=<?php echo $property_map_location; ?>&output=embed"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

	<div class="spacer-30"></div>
        
        <section id="overview" class="content-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h4>Overview</h4>
                        <hr>
                        <?php echo $property_overview; ?>
                    </div>
                </div>
            </div>
        </section>

	<div class="spacer-30"></div>
        
        <section id="amenities" class="content-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h4>Amenities</h4>
                        <hr>
                        <?php echo $property_amenities; ?>
                    </div>
                </div>
            </div>
        </section>
	
	<div class="spacer-30"></div>
        
	<section id="neighbourhood" class="content-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h4>Neighbourhood</h4>
			<hr>
                        <?php
                            $get_property_neighbourhoods = PropertyNeighbourhoods::model()->findAll(array('condition'=>'status=1 AND property_id='.$model->id, 'order'=>'view_order'));
                            if(!empty($get_property_neighbourhoods))
                            {
                                $neighbour_counter = 0; 
                                foreach($get_property_neighbourhoods as $neighbours)
                                {
                                    if($neighbour_counter==0 || ($neighbour_counter%4)==0) { echo '<div class="row">'; }
                           ?>
                                    <div class="map_ara col-md-3">
                                        <h4 class="title"> <?php echo $neighbours->title; ?> </h4>
                                        <hr>
                                        <img width="250" height="200" class="img-responsive" src="<?php echo Yii::app()->baseUrl.$neighbours->path; ?>" alt="Property Slide Image">
                                    </div>    
                        
                        <?php
                                    $neighbour_counter++;
                                    if(($neighbour_counter%4)==0 || $neighbour_counter==count($get_property_neighbourhoods)) { echo '</div> <div class="spacer-30"></div>'; }
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="spacer-30"></div>
        </section>

	<div class="spacer-30"></div>
        
        <section id="specifications" class="content-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h4>Specifications</h4>
                        <hr>
                        <?php echo $property_specifications; ?>
                    </div>
                </div>
            </div>
        </section>
        
        <div class="spacer-30"></div>
        
        <section id="photosection" class="content-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                    <h4>Photos</h4>
                    <hr>

                    <div class="pro_gallery">
                        <ul id="lightgallery" class="list-unstyled row">
                        <?php    
                            $get_property_photos = PropertyPhotos::model()->findAll(array('condition'=>'status=1 AND property_id='.$model->id, 'order'=>'view_order'));
                            if(!empty($get_property_photos))
                            {
                                foreach($get_property_photos as $photos)
                                {
                           ?>
                                <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="<?php echo Yii::app()->baseUrl.$photos->path; ?>, <?php echo Yii::app()->baseUrl.$photos->path; ?>, <?php echo Yii::app()->baseUrl.$photos->path; ?>" data-src="<?php echo Yii::app()->baseUrl.$photos->path; ?>">
                                     <a href="" class="border_box">
                                        <img class="img-responsive" src="<?php echo Yii::app()->baseUrl.$photos->path; ?>">
                                    </a>
                                </li>
                        <?php
                                }
                            }
                            else
                            {
                                echo "No result found!";
                            }
                        ?>
                                </ul>
                    </div> 

                    </div>
                </div>
            </div>
        </section>
        
        <div class="spacer-30"></div>
        
        <section id="videosection" class="content-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                    <h4>Videos</h4>
                    <hr>

                    <div class="row pro_gallery">
                        <?php
                            $get_property_videos = PropertyVideos::model()->findAll(array('condition'=>'status=1 AND property_id='.$model->id, 'order'=>'view_order'));
                            if(!empty($get_property_videos))
                            {
                                foreach($get_property_videos as $videos)
                                {
                           ?>
                                    <div class="col-md-3 col-sm-6"><iframe width="260" height="155" style="border: 0 none;" src="<?php echo $videos->path; ?>" allowfullscreen></iframe></div>
                        <?php
                                }
                            }
                        ?>
                    </div>              


                    </div>
                </div>
            </div>
        </section>

	<div class="spacer-30"></div>
        
        <section id="builder" class="content-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h4>Builder</h4>
                        <hr>
                        <?php echo $property_builder; ?>
                    </div>
                </div>
            </div>
        </section>
	
	<div class="spacer-30"></div>
	
	
        </div>
    </div>
    
    
    
    <script>
        /* Product Slider Codes */
        $(document).ready(function () 
        {
            'use strict';

            $('#prop_slid').bxSlider({
                pagerCustom: '#slid_nav'
            });
			
			$('ul.drop_menu [data-toggle=dropdown]').on('click', function (event) {
                event.preventDefault();
                event.stopPropagation();
                $(this).parent().siblings().removeClass('open');
                $(this).parent().toggleClass('open');
            });
			$(window).scroll(function(){
				if ($(this).scrollTop() > 100) {
					$('.scrollToTop').fadeIn();
				} else {
					$('.scrollToTop').fadeOut();
				}
			});
			
			
			$('.scrollToTop').click(function(){
				$('html, body').animate({scrollTop : 0},800);
				return false;
			});
			});
    </script>
    
    <script type="text/javascript">
	$(document).ready(function () {

    var menu = $('.menu');
    var origOffsetY = menu.offset().top;

    function scroll() {
        if ($(window).scrollTop() >= origOffsetY) {
            $('.menu').addClass('sticky');
            $('.content').addClass('menu-padding');
        } else {
            $('.menu').removeClass('sticky');
            $('.content').removeClass('menu-padding');
        }


    }

    document.onscroll = scroll;

});
	</script>