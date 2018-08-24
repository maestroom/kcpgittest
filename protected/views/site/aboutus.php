<!-- Header bradcrumb -->
    <header class="bread_crumb">
        <div class="pag_titl_sec">
            <h1 class="pag_titl"> about us </h1>
            <h4 class="sub_titl">  </h4>
        </div>
        <div class="pg_links">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p class="lnk_pag"><a href="<?php echo Yii::app()->createUrl('site/index'); ?>"> Home </a> </p>
                        <p class="lnk_pag"> / </p>
                        <p class="lnk_pag"> about us </p>
                    </div>
                    <div class="col-md-6 text-right">
                        <p class="lnk_pag"><a href="<?php echo Yii::app()->createUrl('site/index'); ?>"> Go Back to Home </a> </p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <?php
        
        $aboutus_content = '';
        $fun_facts = '';
        
        $get_aboutus = Aboutus::model()->find(array('condition'=>'status=1'));
        if(!empty($get_aboutus))
        {
            $aboutus_content = ($get_aboutus->content!='') ? $get_aboutus->content : '';
            $fun_facts = ($get_aboutus->fun_facts!='') ? $get_aboutus->fun_facts : '';
        }
    ?>


    <div class="spacer-60"></div>
    <div class="container">
        <div class="row">
            <!-- About Section -->
            <section id="abt_sec" class="col-md-8">
                <!-- Progressbars -->
                <div class="row skill_sec">
                    <div class="titl_sec">
                        <div class="col-lg-12">
                            <h3 class="main_titl text-left"> About Us </h3>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-xs-12 skill_ara">
                        <div class="col-sm-12 p0">
                            <p class="m0"> <?php echo $aboutus_content; ?> </p>
                        </div>
                        
                    </div>
                </div>
                <!-- /.row -->

                <div class="spacer-30"></div>
                <!-- Fun Facts -->
                <div class="row skill_sec">
                    <div class="titl_sec">
                        <div class="col-lg-12">
                            <h3 class="main_titl text-left"> fun facts </h3>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-xs-12 fun_fac">
                        <?php echo $fun_facts; ?>
                    </div>
                </div>
                <!-- /.row -->

                <div class="spacer-30"></div>
                <!-- What we do  -->
                <div class="row skill_sec">
                    <div class="titl_sec">
                        <div class="col-lg-12">
                            <h3 class="main_titl text-left"> what we do </h3>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-xs-12 serv_col">
                        
                        <?php
                            $get_whatwedo = WhatWeDo::model()->findAll(array('condition'=>'status=1', 'order'=>'view_order', 'limit'=>3, 'offset'=>0));

                            if(!empty($get_whatwedo))
                            {
                                foreach($get_whatwedo as $what)
                                {
                                    $what_title = (isset($what->title) && $what->title!='') ? $what->title : '';
                                    $what_content = (isset($what->content) && $what->content!='') ? $what->content : '';
                                    $what_path = (isset($what->path) && $what->path!='') ? $what->path : '';
                        ?>
                                    <div class="col-xs-4 text-center">
                                        <div class="nor_ico">
                                            <img class="img-responsive" src="<?php echo Yii::app()->baseUrl.$what_path; ?>" alt="">
                                        </div>
                                        <h3 class="fun_num"><?php echo substr($what_title, 0, 30); ?></h3>
                                        <p class="desc" style="text-align: justify;"> <?php echo substr($what_content,0, 55); ?> </p>
                                        <p class="readmore text-left"> 
                                            <?php if(strlen($what_content)>55) { ?>
                                            <a href="#" data-toggle="modal" data-target="#whatwedoModal<?php echo $what->id; ?>"> Read More </a> 
                                            <?php } ?>
                                        </p>
                                    </div>     
                                    <?php if(strlen($what_content)>55) { ?>
                                        <div class="modal fade" id="whatwedoModal<?php echo $what->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                          <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                    <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                      <center><h4 class="modal-title"><?php echo $what_title; ?></h4></center>
                                                    </div>
                                                   <div class="modal-body">
                                                       <p style="text-align:justify;"><?php echo $what_content; ?></p>
                                                   </div>
                                                   <div class="modal-footer">
                                                       <button type="button" class="btn btn-xs btn-default" data-dismiss="modal">Close</button>
                                                   </div>
                                              </div>
                                            </div>
                                        </div>                                        
                                    <?php } ?>
                        <?php
                                }
                            }
                        ?>
                        
                    </div>
                </div>
                <!-- /.row -->

                <div class="spacer-30"></div>

                <!-- Our clients -->
                <div id="clients" class="row skill_sec">
                    <div class="titl_sec">
                        <div class="col-lg-12">
                            <h3 class="main_titl text-left"> our clients </h3>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div id="pag-carousel" class="row">
                        
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

            <!-- Sidebar Section -->
            <section id="sidebar" class="col-md-4">
                <!-- Search Form -->
                <div class="row">
                    <div class="col-md-12">
<!--                        <img class="img-thumbnail img-responsive" src="<?php echo Yii::app()->baseUrl.'/images/about_img.jpg'; ?>" />-->
                        
                        <div id="slider" class="silde_img flexslider">
                        
                        <ul class="slides">
                            <?php
                                $get_gallery = AboutusGallery::model()->findAll(array('condition'=>'status=1', 'order'=>'created asc'));

                                if(!empty($get_gallery))
                                {
                                    foreach($get_gallery as $gal)
                                    {
                                        $gallery_path = (isset($gal->path) && $gal->path!='') ? $gal->path : '';
                            ?>
                                        <li>
                                            <img src="<?php echo Yii::app()->baseUrl.$gallery_path; ?>" alt="Slider image" />
<!--                                            <div class="slide-info">                                   
                                                <p class="sli_titl"> <?php //echo substr($gallery_title,0,80); ?> </p>
                                                <p class="sli_desc" style="text-align: justify;"> <?php //echo substr($gallery_content,0,350); ?> </p>
                                            </div>-->
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

                <div class="spacer-30"></div>
                <!-- Categories -->
                <div class="row">
                    <div class="col-md-12">
                        <?php include Yii::app()->basePath.'/components/contact_form.php'; ?>
                    </div>
                </div>
                <!-- /.row -->
             
            </section>
            
        </div>
    </div>    
    
    
    
    <!-- Script to Activate the Carousel -->
    <script>
        $(document).ready(function () 
        {
            'use strict';
                $("#pag-carousel").owlCarousel({
                    items: 4,
                    itemsDesktop: [1199, 4],
                    itemsDesktopSmall: [979, 3],
                    itemsTablet: [768, 2],
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