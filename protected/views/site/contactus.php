<!-- Header bradcrumb -->
    <header class="bread_crumb">
        <div class="pag_titl_sec">
            <h1 class="pag_titl"> Contact Us </h1>
            <h4 class="sub_titl">  </h4>
        </div>
        <div class="pg_links">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p class="lnk_pag"><a href="<?php echo Yii::app()->createUrl('site/index'); ?>"> Home </a> </p>
                        <p class="lnk_pag"> / </p>
                        <p class="lnk_pag"> Contact Us </p>
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
            <!-- Contact Section -->
            <section id="contact_sec" class="col-md-4">
                <!-- Contact form -->
                <div class="row">
                    <div class="titl_sec" style="margin-bottom:0px;">
                        <div class="col-lg-12">

                            <h3 class="main_titl text-left" >
                    Send us email
                </h3>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-12">
                        <div class="cont_frm">
                            <form action="contact.php" method="POST" >
                                <div class="control-group form-group col-md-12 first">
                                    <div class="controls" style="margin-bottom:13px;">
                                        <input type="text" class="form-control" id="name" required data-validation-required-message="Please enter your name." name="name" placeholder="Your Name">
                                        <div class="in_ico">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <p class="help-block"></p>
                                    </div>

                                    <div class="controls" style="margin-bottom:13px;">
                                        <input type="email" class="form-control" id="email" required data-validation-required-message="Please enter an email address." name="email" placeholder="Email Address">
                                        <div class="in_ico">
                                            <i class="fa fa-envelope-o"></i>
                                        </div>
                                        <p class="help-block"></p>
                                    </div>

                                    <div class="controls" style="margin-bottom:13px;">
                                        <input type="number" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number." name="phone" placeholder="Your Phone/Mobile">
                                        <div class="in_ico">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <p class="help-block"></p>
                                    </div>

                                    <div class="controls last" style="margin-bottom:13px;">
                                        <input type="text" class="form-control" id="web" required data-validation-required-message="Please enter your website." name="web" placeholder="Website">
                                        <div class="in_ico">
                                            <i class="fa fa-pencil"></i>
                                        </div>
                                        <p class="help-block"></p>
                                    </div>

                                    <div class="clearfix"></div>
                                </div>

                                <div class="control-group form-group col-md-12">
                                    <div class="controls" style="margin-bottom:13px;">
                                        <textarea rows="10" cols="50" class="form-control"  id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none" name="message" placeholder="Message" style="height:100px!important;"></textarea>
                                        <div class="in_ico">
                                            <i class="fa fa-paper-plane-o"></i>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Send Message</button>
                                </div>
                                <div class="clearfix"></div>
                                <div id="success"></div>
                                <!-- For success/fail messages -->
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="spacer-30"></div>
               

            </section>

            <!-- Sidebar Section -->
           <section id="sidebar" class="col-md-4">
                <!-- Contact Information -->
                <div class="row">
                    <div class="titl_sec">
                        <div class="col-lg-12">

                            <h3 class="main_titl text-left">
                   Branch 1
                </h3>

                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="cont_info">
                        <div class="info_sec first">
                            <div class="icon_box">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <p class="infos"  style="padding-left:50px; margin-top:-42px;">Sri Sakthi Kcp Nagar, KGISL IT Park Near, Keeranatham, Saravanam patti, Coimbatore - 641035.</p>
                        </div>

                        <div class="info_sec">
                            <div class="icon_box">
                                <i class="fa fa-envelope-o"></i>
                            </div>
                            <p class="infos"><a href="mailto:kcpnish@gmail.com?Subject=template%20enquiry"> kcpnish@gmail.com </a>
                            </p>
                        </div>

                        <div class="info_sec">
                            <div class="icon_box">
                                <i class="fa fa-phone"></i>
                            </div>
                            <p class="infos"> <a href="tel:98427 44417"> +91 98427 44417 | 98438 02323 </a> </p>
                        </div>

                        <div class="info_sec">
                            <div class="icon_box">
                                <i class="fa fa-facebook"></i>
                            </div>
                            <p class="infos">facebook.com/kcppromoters</p>
                        </div>

                    </div>
                </div>
                <!-- /.row -->
            </section>
<section id="sidebar" class="col-md-4">
                <!-- Contact Information -->
                <div class="row">
                    <div class="titl_sec">
                        <div class="col-lg-12">

                            <h3 class="main_titl text-left">Branch 2</h3>

                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="cont_info">
                        <div class="info_sec first">
                            <div class="icon_box">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <p class="infos"  style="padding-left:50px; margin-top:-42px;">Axelle North Pavilion Rd, CHIL SEZ IT Park, Saravanampatty, Coimbatore, Tamil Nadu 641035</p>
                        </div>

                        <div class="info_sec">
                            <div class="icon_box">
                                <i class="fa fa-envelope-o"></i>
                            </div>
                            <p class="infos"><a href="mailto:kcpnish@gmail.com?Subject=template%20enquiry"> kcpnish@gmail.com </a>
                            </p>
                        </div>

                        <div class="info_sec">
                            <div class="icon_box">
                                <i class="fa fa-phone"></i>
                            </div>
                            <p class="infos"> <a href="tel:98427 44417"> +91 98427 44417 | 98438 02323 </a> </p>
                        </div>

                        <div class="info_sec">
                            <div class="icon_box">
                                <i class="fa fa-facebook"></i>
                            </div>
                            <p class="infos">facebook.com/kcppromoters</p>
                        </div>

                    </div>
                </div>
                <!-- /.row -->
            </section>
			 <div class="clearfix"></div>
 <!-- Location Map -->
                <div class="row">
                    <div class="titl_sec">
                        <div class="col-lg-12">

                            <h3 class="main_titl text-left">
                    Our Location
                </h3>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-12">
                        <div class="map_ara map-container">
                           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3915.209947576793!2d76.99374321480363!3d11.09772479210399!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba8f79b82628917%3A0xdf31f98525cf4a14!2sSri+Sakthi+KCP+Nagar+Phase+II!5e0!3m2!1sen!2sin!4v1486624192009" width="100%" height="350"></iframe>
                        </div>

                    </div>
                </div>
                <!-- /.row -->
            <div class="spacer-60"></div>

        </div>
    </div>