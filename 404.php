<?php get_header(); ?>

<section class="error-404 clearfix">

    <div class="left-col">
        <p><?php _e('404', 'ns0014'); ?></p>
    </div>
    <div class="right-col">
        <h1><?php _e('Page not found...', 'ns0014'); ?></h1>
        <p><?php _e("In the meantime, try one of this options:", 'ns0014'); ?></p>
        <ul class="arrow-list">
            <li><a href="javascript: history.go(-1);"><?php _e('Go back to previous page', 'ns0014'); ?></a></li>
            <li><a href="<?php echo esc_url(home_url()); ?>"><?php _e('Go to homepage', 'ns0014'); ?></a></li>
        </ul>
    </div>

</section>

<?php
get_footer();