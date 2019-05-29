<?php
//Template Name: Blog Details Template

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

<!--================Blog Area =================-->
<section class="blog_area single-post-area area-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <?php


                $args = array(
                    'post_type' => 'blogs',
                    'posts_per_page' => 1,


                );
                $query = new WP_Query($args);
                if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>

                        <div class="single-post">

                            <div class="feature-img">
                                <img class="img-fluid" src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="">
                            </div>

                            <div class="blog_details">
                                <h2><?php echo get_the_title(); ?></h2>
                                <ul class="blog-info-link mt-3 mb-4">
                                    <li><a href="#"><i class="far fa-user"></i> <?php the_terms($post->ID, 'type',  ' '); ?></a></li>
                                    <li><a href="#"><i class="far fa-comments"></i> <?php echo get_comments_number(); ?> Comments</a></li>
                                </ul>
                                <p class="excert"><?php echo get_the_excerpt(); ?></p>
                                <p>
                                    <?php echo  get_the_content(); ?>
                                </p>
                                <div class="quote-wrapper">
                                    <div class="quotes">
                                        <?php echo get_the_excerpt(); ?>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="navigation-top">


                            <div class="navigation-area">

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                        <div class="thumb">
                                            <a href="<?php echo esc_url(get_permalink(get_previous_post()->ID)); ?>">
                                                <img width="90" height="90" class="img-fluid" src="<?php echo esc_url(get_the_post_thumbnail_url(get_previous_post()->ID)) ?>" alt="">
                                            </a>
                                        </div>

                                        <div class="arrow">
                                            <a href="<?php echo esc_url(get_permalink(get_previous_post()->ID)); ?>">
                                                <span class="lnr text-white lnr-arrow-left"></span>
                                            </a>
                                        </div>
                                        <div class="detials">
                                            <p>Prev Post</p>
                                            <a href="<?php echo esc_url(get_permalink(get_previous_post()->ID)); ?>">
                                                <h4><?php echo esc_attr(get_previous_post()->post_title); ?></h4>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                        <div class="detials">
                                            <p>Next Post</p>
                                            <a href="<?php echo esc_url(get_permalink(get_next_post()->ID)); ?>">
                                                <h4><?php echo esc_attr(get_next_post()->post_title); ?></h4>
                                            </a>
                                        </div>
                                        <div class="arrow">
                                            <a href="<?php echo esc_url(get_permalink(get_next_post()->ID)); ?>">
                                                <span class="lnr text-white lnr-arrow-right"></span>
                                            </a>
                                        </div>
                                        <?php if (get_the_post_thumbnail_url(get_next_post()->ID) == get_the_post_thumbnail_url(get_post()->ID)) { ?>

                                        <?php } else { ?>
                                            <div class="thumb">
                                                <a href="<?php echo esc_url(get_permalink(get_next_post()->ID)); ?>">
                                                    <img width="90" height="90" class="img-fluid" src="<?php echo esc_url(get_the_post_thumbnail_url(get_next_post()->ID)) ?>" alt="">
                                                </a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="blog-author">
                            <div class="media align-items-center">
                                <img src="<? echo get_avatar(get_the_author_meta('user_email')); ?>" alt="">
                                <div class="media-body">
                                    <a href="#">
                                        <h4><?php echo get_the_author(); ?></h4>
                                    </a>
                                    <p><?php echo get_the_author_meta('description'); ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="comments-area">
                            <h4><?php echo get_comments_number(); ?> Comments</h4>
                            <?php
                            $comments = get_comments(array('post_id' => get_the_ID()));
                            foreach ($comments as $comment) { ?>
                                <div class="comment-list">
                                    <div class="single-comment justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                            <div class="thumb">
                                                <img src="<? echo get_avatar(get_the_author_meta('user_email')); ?>" alt="">
                                            </div>
                                            <div class="desc">
                                                <p class="comment">
                                                    <?php echo $comment->comment_content; ?> </p>
                                                </p>

                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        <h5>
                                                            <a href="#"><?php echo $comment->comment_author; ?></a>
                                                        </h5>


                                                        <p class="date"><?php comment_date($d, $comment); ?> at <?php comment_time($d); ?> </p>
                                                    </div>

                                                    <div class="reply-btn">
                                                        <a href="#" class="btn-reply text-uppercase">reply</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
                <div class="comment-form">
                    <h4>Leave a Reply</h4>
                    <?php comments_template(); ?>
                    <?php if (is_user_logged_in()) {
                        echo '</div>';
                    } ?>
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
