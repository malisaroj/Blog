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
            <?php
        }
        ?>
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
            <?php get_footer('splash'); ?>

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
    </div>
</footer>
<!-- ================ End footer Area ================= -->
<?php wp_footer(); ?>
</body>

</html>