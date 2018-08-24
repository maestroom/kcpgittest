

<!-- Header Stat Banner -->
    <header id="banner" class="stat_bann">
        <?php
            $get_banner = HomeBannerImage::model()->find();
            $banner_title = (isset($get_banner->title) && $get_banner->title!='') ? $get_banner->title : '';
            $banner_content = (isset($get_banner->content) && $get_banner->content!='') ? $get_banner->content : '';
            $banner_path = (isset($get_banner->path) && $get_banner->path!='') ? $get_banner->path : '';
        ?>    
        <div class="bannr_sec">
            <img src="<?php echo Yii::app()->baseUrl.$banner_path; ?>" alt="Banner">
            <h1 class="main_titl"> <?php echo substr($banner_title,0,50); ?> </h1>
            <h4 class="sub_titl" > <?php echo substr($banner_content, 0,600); ?> </h4>
        </div>
    </header>

    <!-- Page Content -->
    <section id="srch_slide">

        <div class="container">

            <!-- Search & Slider -->
            <div class="row">
                <!-- Search Form -->
                <div class="col-md-4">
                    <?php include Yii::app()->basePath.'/components/contact_form.php'; ?>
                </div>
                <!-- Slider -->
                <div class="col-md-8 slide_sec">
                    <div id="slider" class="silde_img flexslider">
                        
                        <ul class="slides">
                            <?php
                                $get_gallery = HomeGallery::model()->findAll(array('condition'=>'status=1', 'order'=>'view_order'));

                                if(!empty($get_gallery))
                                {
                                    foreach($get_gallery as $gal)
                                    {
                                        $gallery_title = (isset($gal->title) && $gal->title!='') ? $gal->title : '';
                                        $gallery_content = (isset($gal->content) && $gal->content!='') ? $gal->content : '';
                                        $gallery_path = (isset($gal->path) && $gal->path!='') ? $gal->path : '';
                            ?>
                                        <li>
                                            <img src="<?php echo Yii::app()->baseUrl.$gallery_path; ?>" alt="Slider image" />
                                            <div class="slide-info">                                   
                                                <p class="sli_titl"> <?php echo substr($gallery_title,0,80); ?> </p>
                                                <p class="sli_desc" style="text-align: justify;"> <?php echo substr($gallery_content,0,350); ?> </p>
                                            </div>
                                        </li>
                            <?php
                                    }
                                }
                            ?> 
                        </ul>
                        
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </section>

    <div class="spacer-60"></div>

    <!-- Featured Properties Section -->
    <section id="feat_propty">
        <div class="container">
            <div class="row">
                <div class="titl_sec">
                    <div class="col-xs-6">
                        <h3 class="main_titl text-left">Properties</h3>
                    </div>
                    <div class="col-xs-6">
                        <h3 class="link_titl text-right"> <a href="<?php echo Yii::app()->createUrl('site/property'); ?>"> View All Properties </a> </h3>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <?php
                    $get_properties = Property::model()->findAll(array('condition'=>'status=1', 'order'=>'view_order', 'limit'=>3, 'offset'=>0));

                    if(!empty($get_properties))
                    {
                        foreach($get_properties as $property)
                        {
                            $property_title = (isset($property->title) && $property->title!='') ? $property->title : '';
                            $property_type = (isset($property->type) && $property->type!='') ? $property->type : '';
                            $property_sqft = (isset($property->sqft) && $property->sqft!='') ? $property->sqft : '';
                            $property_content = (isset($property->overview) && $property->overview!='') ? strip_tags($property->overview) : '';
                            $property_path = (isset($property->path) && $property->path!='') ? $property->path : '';
                            
                ?>
                            
                            <div class="col-md-4 grid">
                                <div class="panel panel-default">
                                    <div class="panel-image">
                                        <img class="img-responsive img-hover" src="<?php echo Yii::app()->baseUrl.$property_path; ?>" alt="">
                                        <div class="img_hov_eff">
                                            <a class="btn btn-default btn_trans"  href="<?php echo Yii::app()->createUrl('site/viewproperty', array('id'=>$property->id)); ?>"> More Details </a>
                                        </div>
                                    </div>
                                    <div class="sal_labl"> <?php echo $property_type; ?> </div>

                                    <div class="panel-body">
                                        <div class="h3txt">
                                        <h3 class="sec_titl"><?php echo substr($property_title,0, 70); ?></h3>
                                        </div>
                                        <div class="ptxt">
                                            <p class="sec_desc"><?php echo substr($property_content,0,80); ?></p>
                                        </div>
                                        <div class="panel_bottom">
                                            <div class="col-md-6">
                                                <p class="price text-left">SQFT : <?php echo $property_sqft; ?></p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="readmore text-right"> <a  href="<?php echo Yii::app()->createUrl('site/viewproperty', array('id'=>$property->id)); ?>"> Read More </a> </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <?php
                        }
                    }
                ?> 

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

  
    <div class="spacer-60"></div>

        <!-- Testimonial Section -->
        <section id="testim">
            <div class="container">
                <div class="row testim_sec m0">
                    
                    <?php
                        $get_testimonials = Testimonials::model()->findAll(array('condition'=>'status=1', 'order'=>'view_order'));

                        if(!empty($get_testimonials))
                        {
                            foreach($get_testimonials as $testimonials)
                            {
                                $testimonial_name = (isset($testimonials->name) && $testimonials->name!='') ? $testimonials->name : '';
                                $testimonial_content = (isset($testimonials->content) && $testimonials->content!='') ? $testimonials->content : '';
                                $testimonial_path = (isset($testimonials->path) && $testimonials->path!='') ? $testimonials->path : '';
                    ?>
                                <div class="testim_box">
                                    <blockquote style="text-align: justify;">
                                        <?php echo substr($testimonial_content,0,200); ?>
                                    </blockquote>
                                    <div class="auth_sec">
                                        <img src="<?php echo Yii::app()->baseUrl.$testimonial_path; ?>" alt="">
                                        <h6 class="auth_nam">
                                            <?php echo substr($testimonial_name,0,30); ?>
                                        </h6>
                                    </div>
                                </div>
                    <?php
                            }
                        }
                    ?> 

                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>

    <div class="spacer-60"></div>

    <!-- Latest News Section -->
<section id="lates_news">
        <div class="container">
            <div class="row">
                <div class="titl_sec">
                    <div class="col-xs-12">
                        <h3 class="main_titl text-left"> Latest News & Events </h3>
                    </div>                   
                    <div class="clearfix"></div>
                </div>
                
                    <?php
                        $get_news = NewsEvents::model()->findAll(array('condition'=>'status=1', 'order'=>'view_order'));

                        if(!empty($get_news))
                        {
                            $count = 0;
                            foreach($get_news as $news)
                            {
                                if($count==0 || ($count%3)==0) { echo '<div class="row">'; }
                                
                                $news_title = (isset($news->title) && $news->title!='') ? $news->title : '';
                                $news_content = (isset($news->content) && $news->content!='') ? $news->content : '';
                                $news_date = (isset($news->date) && $news->date!='') ? date('F d, Y', strtotime($news->date)) : '';
                    ?>
                                <div class="col-md-4 latest-news">
                                    <div class="panel panel-default">
                                        <div id="slide_pan<?php echo $news->id; ?>" class="panel-image">
                                            <?php
                                                if($news->path!='')
                                                {
                                                    ?>
                                                            <img class="img-responsive img-hover" src="<?php echo Yii::app()->baseUrl.$news->path; ?>" alt="">
                                            <?php                
                                                }
                                                
                                                if(isset($news->newsEventsImages) && !empty($news->newsEventsImages))
                                                {
                                                    foreach ($news->newsEventsImages as $img)
                                                    {
                                                        ?>
                                                            <img class="img-responsive img-hover" src="<?php echo Yii::app()->baseUrl.$img->path; ?>" alt="">
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </div>

                                        <div class="panel-body">
                                            <div class="news_dtd">
                                                <p> <?php echo $news_date ?> </p>
                                            </div>
                                            <h3 class="sec_titl"> <?php echo substr($news_title,0,70); ?> </h3>
                                            <p class="sec_desc" style="text-align: justify;"> <?php echo substr($news_content,0,170); ?> </p>
                                            
                                            <p class="readmore text-left"> 
                                                <?php if(strlen($news_content)>170) { ?>
                                                <a href="#" data-toggle="modal" data-target="#newsModal<?php echo $news->id; ?>"> Read More </a> 
                                                <?php } ?>
                                            </p>
                                            
                                        </div>
                                    </div>
                                </div>
                
                                    <script type="text/javascript">
                                        $(document).ready(function ()
                                        {
                                            $("#slide_pan<?php echo $news->id; ?>").owlCarousel({
                                                    items: 1,
                                                    itemsDesktop: [1199, 1],
                                                    itemsDesktopSmall: [979, 1],
                                                    itemsTablet: [768, 1],
                                                    itemsMobile: [479, 1],
                                                    navigation: true,
                                                    navigationText: [
                                                                        "<i class='fa fa-chevron-left icon-white'></i>",
                                                                        "<i class='fa fa-chevron-right icon-white'></i>"
                                                                    ],
                                                    autoPlay: false,
                                                    pagination: false
                                                });

                                                         
                                         });
                                    </script>
                                    
                                    <!-- News view modal-->
                                    <?php if(strlen($news_content)>170) { ?>
                                        <div class="modal fade" id="newsModal<?php echo $news->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                          <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                    <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                      <center><h4 class="modal-title"><?php echo $news_title; ?></h4></center>
                                                    </div>
                                                   <div class="modal-body">
                                                       <p style="text-align:justify;"><?php echo $news_content; ?></p>
                                                   </div>
                                                   <div class="modal-footer">
                                                       <button type="button" class="btn btn-xs btn-default" data-dismiss="modal">Close</button>
                                                   </div>
                                              </div>
                                            </div>
                                        </div>                                        
                                    <?php } ?>
                                    <!-- view modal end -->    
                    <?php
                                $count++;
                                if(($count%3)==0 || $count==count($get_news)) { echo '</div> <div class="spacer-30"></div>'; }
                            }
                        }
                    ?>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <div class="spacer-60"></div>

    <!-- Subscribe Section -->
    <section id="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-right subs_info">
<!--                    <h5>
                    For Subscribers Only
                </h5>-->

                    <h2>
                   SUBSCRIBE OUR NEWSLETTER
                </h2>
                </div>
                <!-- Subscribe Form -->
                <div class="col-md-6 text-left subs_form">
                    <form name="sentMessage" id="contactForm2" novalidate>
                        <div class="control-group form-group">
                            <div class="controls">
                                <input type="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address." placeholder="Put your email address">
                                <button type="submit" class="btn btn-primary">Subscribe</button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <div class="spacer-60"></div>

    <!-- Our clients -->
    <section id="clients">
        <div class="container">
            <div id="owl-carousel" class="row">
                <h2 class="hide"> Our Clients </h2>
                
                <?php
                    $get_clients = Clients::model()->findAll(array('condition'=>'status=1', 'order'=>'view_order'));

                    if(!empty($get_clients))
                    {
                        foreach($get_clients as $client)
                        {
                            $client_path = (isset($client->path) && $client->path!='') ? $client->path : '';
                ?>
                            <div class="owl_col">
                                <div class="mid_img"> <img class="img-responsive customer-img" src="<?php echo Yii::app()->baseUrl.$client_path; ?>" alt=""> </div>
                            </div>
                <?php
                        }
                    }
                ?>
 
            </div>
            <!-- /.row -->
        </div>

    </section>