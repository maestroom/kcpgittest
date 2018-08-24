<!-- Header bradcrumb -->
    <header class="bread_crumb">
        <div class="pag_titl_sec">
            <h1 class="pag_titl"> Property Listing </h1>
            <h4 class="sub_titl">  </h4>
        </div>
        <div class="pg_links">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p class="lnk_pag"><a href="<?php echo Yii::app()->createUrl('site/index'); ?>"> Home </a> </p>
                        <p class="lnk_pag"> / </p>
                        <p class="lnk_pag"> Property Listing </p>
                    </div>
                    <div class="col-md-6 text-right">
                        <p class="lnk_pag"><a href="<?php echo Yii::app()->createUrl('site/index'); ?>"> Go Back to Home </a> </p>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div class="spacer-60"></div>
    <div class="container">
        <div class="row">
        <!-- Properties Section -->
        <section id="feat_propty">
            <div class="container">
                    
                    <?php
                    $get_properties = Property::model()->findAll(array('condition'=>'status=1', 'order'=>'view_order',));

                    if(!empty($get_properties))
                    {
                        $count = 0;
                        
                        foreach($get_properties as $property)
                        {
                            if($count==0 || ($count%3)==0) { echo '<div class="row">'; }
                            
                            $property_title = (isset($property->title) && $property->title!='') ? $property->title : '';
                            $property_type = (isset($property->type) && $property->type!='') ? $property->type : '';
                            $property_sqft = (isset($property->sqft) && $property->sqft!='') ? $property->sqft : '';
                            $property_content = (isset($property->overview) && $property->overview!='') ? strip_tags($property->overview) : '';
                            $property_path = (isset($property->path) && $property->path!='') ? $property->path : '';
                            
                ?>
                            
                            <div class="col-md-4">
                                <div class="panel panel-default">
                                    <div class="panel-image">
                                        <img class="img-responsive img-hover" src="<?php echo Yii::app()->baseUrl.$property_path; ?>" alt="">
                                        <div class="img_hov_eff">
                                            <a class="btn btn-default btn_trans"  href="<?php echo Yii::app()->createUrl('site/viewproperty', array('id'=>$property->id)); ?>"> More Details </a>
                                        </div>
                                    </div>
                                    <div class="sal_labl"> <?php echo $property_type; ?> </div>

                                    <div class="panel-body">
                                        <h3 class="sec_titl"><?php echo substr($property_title,0, 70); ?></h3>
                                        <p class="sec_desc"><?php echo substr($property_content,0,80); ?></p>
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
                            $count++;
                            if(($count%3)==0 || $count==count($get_properties)) { echo '</div> <div class="spacer-30"></div>'; }
                
                        }
                    }
                ?> 
                    
                 
                      
            </div>
            <!-- /.container -->
        </section>
        
            <div class="spacer-60"></div>

        </div>
    </div>