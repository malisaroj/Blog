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
                        <a href="index.html">Home</a>
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
                    'posts_per_page' => 1
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
                                <p>
                                    <?php echo get_the_content(); ?>
                                </p>
                            </div>
                        </div>
                        <div class="navigation-top">


                            <div class="navigation-area">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                        <div class="thumb">
                                            <a href="#">
                                                <img class="img-fluid" src="img/blog/prev.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="arrow">
                                            <a href="#">
                                                <span class="lnr text-white lnr-arrow-left"></span>
                                            </a>
                                        </div>
                                        <div class="detials">
                                            <p>Prev Post</p>
                                            <a href="#">
                                                <h4>Space The Final Frontier</h4>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                        <div class="detials">
                                            <p>Next Post</p>
                                            <a href="#">
                                                <h4>Telescopes 101</h4>
                                            </a>
                                        </div>
                                        <div class="arrow">
                                            <a href="#">
                                                <span class="lnr text-white lnr-arrow-right"></span>
                                            </a>
                                        </div>
                                        <div class="thumb">
                                            <a href="#">
                                                <img class="img-fluid" src="img/blog/next.jpg" alt="">
                                            </a>
                                        </div>
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

                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="<? echo get_avatar(get_the_author_meta('user_email')); ?>" alt="">
                                        </div>
                                        <div class="desc">
                                            <p class="comment">
                                                <?php get_comment($my_id); ?>
                                            </p>

                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <h5>
                                                        <a href="#"><?php echo get_comment_author(); ?></a>
                                                    </h5>
                                                    <p class="date"><?php get_comment_date($d, $comment_ID); ?></p>
                                                </div>

                                                <div class="reply-btn">
                                                    <a href="#" class="btn-reply text-uppercase">reply</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
                <div class="comment-form">
                    <h4>Leave a Reply</h4>
                    <form class="form-contact comment_form" action="#" id="commentForm">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="name" id="name" type="text" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="email" id="email" type="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="website" id="website" type="text" placeholder="Website">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="button button-contactForm">Send Message</button>
                        </div>
                    </form>
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
