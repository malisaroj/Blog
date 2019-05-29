<?php
//Template Name: About Template
get_header();
?>
<?php while (have_posts()) : the_post(); ?>

    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content d-md-flex justify-content-between align-items-center">
                    <div class="mb-3 mb-md-0">
                        <h2><?php the_title(); ?></h2>
                    </div>
                    <div class="page_link">
                        <a href="<?php echo esc_url(home_url()); ?>">Home</a>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->
<?php endwhile; ?>

<section class="blog_area single-post-area area-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post">
                    <?php
                    global $post;
                    $post_slug = $post->post_name;
                    ?>
                    <?php if (have_posts()) : ?>
                        <?php /* The loop */ ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <?php if ($post_slug == 'about') : ?>
                                <?php get_template_part('template-parts/content', 'about'); ?>
                            <?php endif; ?>
                            <?php if ($post_slug == 'subscribe') : ?>
                                <?php get_template_part('template-parts/content', 'subscribe'); ?>
                            <?php endif ?>
                            <?php if ($post_slug == 'latest-news') : ?>
                                <?php get_template_part('template-parts/content', 'latestnews'); ?>
                            <?php endif ?>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <?php get_template_part('template-parts/content', 'none'); ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>
</section>



<?php get_footer();
