<!-- ================ Instargram Area Starts ================= -->

<section class="instagram">
    <div class="row no-gutters main-content">

        <div class="owl-carousel owl-theme" id="owl-carousel">
            <?php
            $test = wpabsolute_instagram_feed(); ?>
            <?php foreach ($test as $m) { ?>
                <a href="">
                    <img src="<?php echo $m->images->low_resolution->url; ?>" alt="" id="carousel-slider">
                </a>
            <?php } ?>
        </div>
        <div class="owl-theme">
            <div class="owl-controls">
                <div class="custom-nav owl-nav"></div>
            </div>
        </div>

    </div>
</section>

<!-- ================ Instargram Area End ================= -->


<!-- ================ start footer Area ================= -->

<footer class="footer-area">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
                <h4><?php echo get_theme_mod("about_title"); ?></h4>
                <p><?php echo get_theme_mod("about_description"); ?></p>
                <div class="footer-logo">
                    <img src="<?php echo wp_get_attachment_url(get_theme_mod("about_image")); ?>" alt="">

                </div>
            </div>

            <div class="col-lg-3 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
                <h4><?php echo get_theme_mod("contact_title"); ?></h4>
                <div class="footer-address">
                    <p>Address: <?php echo get_theme_mod("address_code"); ?></p>
                    <span>Phone: <?php echo get_theme_mod("phone_code"); ?></span>
                    <span>Email : <?php echo get_theme_mod("email_code"); ?></span>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
                <h4>Important Link</h4>
                <?php $args = [
                    'theme_location' => 'secondary-menu',
                ];
                wp_nav_menu($args);
                ?>

            </div>

            <div class="col-lg-3 col-sm-6 col-md-6 mb-4 mb-xl-0 single-footer-widget">
                <h4><?php echo get_theme_mod("newsletter_title"); ?></h4>
                <p><?php echo get_theme_mod("newsletter_description"); ?></p>

                <div class="form-wrap" id="mc_embed_signup">
                    <form target="_blank" action="<?php echo get_theme_mod("newsletter_action"); ?>" method="get">
                        <div class="input-group">
                            <input type="email" class="form-control" name="EMAIL" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '">
                            <div class="input-group-append">
                                <button class="btn click-btn" type="submit">
                                    <i class="fab fa-telegram-plane"></i>
                                </button>
                            </div>
                        </div>
                        <div style="position: absolute; left: -5000px;">
                            <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                        </div>

                        <div class="info"></div>
                    </form>
                </div>
            </div>
        </div>


        <div class="footer-bottom row align-items-center text-center text-lg-left no-gutters">
            <p class="footer-text m-0 col-lg-8 col-md-12">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<?php echo date('Y'); ?> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            <div class="col-lg-4 col-md-12 text-center text-lg-right footer-social">
                <?php echo do_shortcode("[socialicons location='footer' href='1,2,3,4' class='ti-facebook, ti-twitter-alt, ti-dribbble, ti-linkedin']"); ?>
            </div>
        </div>
</footer>
<!-- ================ End footer Area ================= -->
<?php wp_footer(); ?>
</body>

</html>