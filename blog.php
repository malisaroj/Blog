<?php
//Template Name: Blog Template
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

<section class="blog_area area-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    <?php
                    // Protect against arbitrary paged values
                    $paged = (get_query_var ('paged')) ? absint (get_query_var ('paged')): 1;


                    $args = array(
                        'post_type' => 'blogs',
                        'posts_per_page' => 5,
                        'paged' => $paged,

                    );
                    $query = new WP_Query($args);
                    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                            <article class="blog_item">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="">
                                    <a href="#" class="blog_item_date">
                                        <h3><?php the_time('j'); ?></h3>
                                        <p><?php the_time('M'); ?></p>
                                    </a>
                                </div>

                                <div class="blog_details">
                                    <a class="d-inline-block" href="<?php echo esc_url(get_permalink(get_post()->ID)); ?>">
                                        <h2><?php echo get_the_title(); ?></h2>
                                    </a>
                                    <p><?php echo get_the_excerpt(); ?></p>
                                    <a id="readmore" href="<?php echo esc_url(get_permalink(get_post()->ID)); ?>">Read More</a>

                                    <ul class="blog-info-link">
                                        <li><a href="#"><i class="far fa-user"></i> <?php the_terms($post->ID, 'type',  ' '); ?></a></li>
                                        <li><a href="#"><i class="far fa-comments"></i> <?php echo get_comments_number(); ?> Comments</a></li>
                                    </ul>
                                </div>
                            </article>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>


                    <div class="pagination blog-pagination justify-content-center d-flex">
                        <?php ea_archive_navigation(); ?>

                    </div>

                    </nav>
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
<?php
get_footer();
