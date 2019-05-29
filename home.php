<?php
//Template Name: Home Page Template

get_header(); ?>

<!--================Fullwidth block Area =================-->

<section class="fullwidth-block area-padding-bottom">
    <div class="container-fluid">
        <div class="row">
            <?php
            $count = 0;
            $args = array(
                'post_type' => 'blogs',
                'posts_per_page' => 4
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                    <?php if ($count == 2) { ?>
                        <div class="col-lg-12 col-xl-3">
                            <div class="row">
                            <?php } ?>

                            <div class="<?php if ($count == 0) {
                                            echo 'col-md-6 col-lg-6 col-xl-5';
                                        } elseif ($count == 1) {
                                            echo 'col-md-6 col-lg-6 col-xl-4';
                                        } elseif ($count == 2) {
                                            echo 'col-12 col-md-6 col-lg-6 col-xl-12';
                                        } elseif ($count == 3) {
                                            echo 'col-12 col-md-6 col-lg-6 col-xl-12';
                                        }

                                        ?>">
                                <div class="<?php if ($count == 0) {
                                                echo 'single-blog';
                                            } elseif ($count == 1) {
                                                echo 'single-blog style_two';
                                            } elseif ($count == 2) {
                                                echo 'single-blog style-three m_b_30';
                                            } elseif ($count == 3) {
                                                echo 'single-blog style-three';
                                            }

                                            ?>">
                                    <div class="thumb">
                                        <img class="img-fluid" src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="">
                                    </div>
                                    <div class="short_details">
                                        <div class="<?php if ($count == 0) {
                                                        echo 'meta-top d-flex';
                                                    } else {
                                                        echo 'meta-top d-flex justify-content-center';
                                                    }

                                                    ?>">
                                            <a href="#"><?php the_terms($post->ID, 'type',  ' '); ?></a>
                                        </div>
                                        <a class="d-block" href="<?php echo esc_url(get_permalink(get_post()->ID)); ?>">
                                            <h4><?php echo get_the_title(); ?></h4>
                                        </a>

                                        <?php if ($count == 0 || $count == 1) { ?>
                                            <div class="<?php if ($count == 0) {
                                                            echo 'meta-bottom d-flex';
                                                        } elseif ($count == 1) {
                                                            echo 'meta-bottom d-flex justify-content-center';
                                                        }
                                                        ?>">
                                                <a href="#"><?php echo get_the_date(); ?>. </a>
                                                <a class="<?php if ($count == 0) {
                                                                echo 'dark_font';
                                                            } elseif ($count == 1) {
                                                                echo '';
                                                            }
                                                            ?>" href="#">By <?php echo get_the_author(); ?></a>
                                            </div>
                                        <?php }
                                    $count++; ?>
                                    </div>
                                </div>
                            </div>

                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>

                    <?php endif; ?>
                </div>
            </div>
</section>

<!--================Fullwidth block Area end =================-->

<!--================ First block section start =================-->


<section class="first_block">
    <div class="container">
        <div class="row">
            <?php
            $count = 0;
            $args = array(
                'post_type' => 'blogs',
                'posts_per_page' => 3
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="<?php if ($count == 0) {
                                    echo 'col-lg-8 col-xl-6';
                                } else {
                                    echo 'col-lg-4 col-xl-3';
                                }
                                ?>">
                        <div class="<?php if ($count == 0) {
                                        echo 'single-blog row no-gutters style-four border_one';
                                    } else {
                                        echo 'single-blog style_five';
                                    }
                                    ?>">
                            <?php if ($count == 0) { ?>
                                <div class="col-12 col-sm-5">
                                <?php } ?>
                                <div class="thumb">
                                    <img class="img-fluid" src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="">
                                </div>
                                <?php if ($count == 0) { ?>
                                </div>
                            <?php } ?>
                            <?php if ($count == 0) { ?>
                                <div class="col-12 col-sm-7">

                                <?php } ?>
                                <div class="short_details">
                                    <div class="meta-top d-flex">
                                        <a href="#"><?php the_terms($post->ID, 'type',  ' '); ?></a>
                                    </div>
                                    <a class="d-block" href="<?php echo esc_url(get_permalink(get_post()->ID)); ?>">
                                        <h4><?php echo get_the_title(); ?></h4>
                                    </a>
                                    <?php if ($count == 0) { ?>
                                        <div class="meta-bottom d-flex">
                                            <a href="#"><?php echo get_the_date(); ?>. </a>
                                            <a class="dark_font" href="#">By <?php echo get_the_author(); ?></a>
                                        </div>
                                    <?php } ?>
                                </div>
                                <?php if ($count == 0) { ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php $count++; ?>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>

        </div>
    </div>
</section>
<!--================ First block section end =================-->

<!--================ Editors Picks section start =================-->
<section class="editors_pick area-padding">
    <div class="container">
        <div class="row">
            <div class="area-heading">
                <h3><?php echo get_cat_name(13); ?></h3>
                <p> <?php echo category_description(13); ?> </p>
            </div>
        </div>
        <div class="row">
            <?php
            $count = 0;
            $args = array(
                'post_type' => 'blogs',
                'posts_per_page' => 3,
                'cat' => 13
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                    <?php if ($count == 0) { ?>
                        <div class="col-lg-5 col-xl-6">
                        <?php } ?>

                        <?php if ($count == 1) { ?>
                            <div class="col-lg-7 col-xl-6">
                                <div class="single-blog row no-gutters style-four m_b_30">
                                <?php } ?>

                                <div class="<?php if ($count == 0) {
                                                echo 'single-blog';
                                            } elseif ($count == 1) {
                                                echo 'single-blog row no-gutters style-four';
                                            } elseif ($count == 2) {
                                                echo 'single-blog row no-gutters style-four m_b_30';
                                            }
                                            ?>">
                                    <?php if ($count == 2) { ?>
                                        <div class="col-12 col-sm-5">
                                        <?php } ?>
                                        <?php if ($count == 0 || $count == 2) { ?>
                                            <div class="thumb">
                                                <img class="img-fluid" src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="">
                                            </div>
                                        <?php } ?>
                                        <?php if ($count == 2) { ?>
                                        </div>
                                    <?php } ?>

                                    <?php if ($count == 1 || $count == 2) { ?>
                                        <div class="col-12 col-sm-7">
                                        <?php } ?>

                                        <div class="<?php
                                                    if ($count == 0) {
                                                        echo 'short_details pad_25 ';
                                                    } elseif ($count == 1) {
                                                        echo 'short_details padd_left_0';
                                                    } elseif ($count == 2) {
                                                        echo 'short_details padd_right_0';
                                                    }
                                                    ?>">
                                            <div class="meta-top d-flex">
                                                <a href="#"><?php the_terms($post->ID, 'type',  ' '); ?></a>
                                            </div>
                                            <a class="d-block" href="<?php echo esc_url(get_permalink(get_post()->ID)); ?>">
                                                <h4 class="<?php if ($count == 1 || $count == 2) {
                                                                echo 'font-20';
                                                            } ?>"><?php echo get_the_title(); ?></h4>
                                            </a>
                                            <?php if ($count == 1 || $count == 2) { ?>
                                                <p><?php echo get_the_excerpt(); ?></p>
                                            <?php } ?>

                                            <?php if ($count == 0) { ?>
                                                <div class="meta-bottom d-flex">
                                                    <a href="#"><?php echo get_the_date(); ?>. </a>
                                                    <a class="dark_font" href="#">By <?php echo get_the_author(); ?></a>
                                                </div>
                                            <?php } ?>
                                        </div>

                                        <?php if ($count == 1 || $count == 2) { ?>
                                        </div>
                                    <?php } ?>

                                    <?php if ($count == 1) { ?>
                                        <div class="col-12 col-sm-5">
                                        <?php } ?>
                                        <?php if ($count == 1) { ?>
                                            <div class="thumb">
                                                <img class="img-fluid" src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="">
                                            </div>
                                        <?php } ?>
                                        <?php if ($count == 1) { ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <?php $count++; ?>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>

                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="addvertise">
                            <a href=""><img src="img/banner/add.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
</section>
<!--================ Editors Picks section end =================-->


<!--================ Video section start =================-->


<div class="video-area background_one area-padding">
    <div class="container">
        <div class="row">
            <div class="area-heading">
                <h3><?php echo get_cat_name(14); ?></h3>
                <p> <?php echo category_description(14); ?> </p>
            </div>

        </div>
        <div class="row">
            <?php
            $count = 0;
            $args = array(
                'post_type' => 'blogs',
                'posts_per_page' => 4,
                'cat' => 14
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>

                    <?php if ($count == 1) { ?>
                        <div class="col-lg-5">
                        <?php } ?>

                        <div class="<?php if ($count == 0) {
                                        echo 'col-lg-7 single-blog video-style';
                                    } elseif ($count == 1) {
                                        echo 'single-blog video-style small row m_b_30';
                                    } elseif ($count == 2) {
                                        echo 'single-blog video-style small row m_b_30';
                                    } elseif ($count == 3) {
                                        echo 'single-blog video-style small row';
                                    }

                                    ?>">
                            <div class="<?php if ($count == 0) {
                                            echo 'thumb';
                                        } else {
                                            echo 'thumb col-12 col-sm-5';
                                        }

                                        ?>">
                                <img class="img-fluid" src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="">
                                <div class="play_btn">
                                    <a class="play-video" href="https://www.youtube.com/watch?v=MrRvX5I8PyY" data-animate="zoomIn" data-duration="1.5s" data-delay="0.1s"><span class="ti-control-play"></span></a>
                                </div>
                            </div>
                            <div class="<?php if ($count == 0) {
                                            echo 'short_details';
                                        } else {
                                            echo 'short_details col-12 col-sm-7';
                                        }

                                        ?>">
                                <div class="meta-top d-flex">
                                    <a href="#"><?php echo get_the_date(); ?></a>
                                </div>
                                <a class="d-block" href="<?php echo esc_url(get_permalink(get_post()->ID)); ?>">
                                    <h4><?php echo get_the_title(); ?></h4>
                                </a>

                            </div>
                            <?php $count++; ?>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<!--================ Video section end =================-->


<!--================ three-block section start =================-->

<div class="three-block  area-padding">
    <div class="container">
        <div class="row">
            <div class="area-heading">
                <h3><?php echo get_cat_name(15); ?></h3>
                <p> <?php echo category_description(15); ?> </p>
            </div>

        </div>
        <div class="row">
            <?php
            $args = array(
                'post_type' => 'blogs',
                'posts_per_page' => 3,
                'cat' => 15
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="col-lg-4">
                        <div class="single-blog style-five">
                            <div class="thumb">
                                <img class="img-fluid" src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="">
                            </div>
                            <div class="short_details">
                                <div class="meta-top d-flex">
                                    <a href="#"><?php echo get_the_date(); ?></a>
                                </div>
                                <a class="d-block" href="<?php echo esc_url(get_permalink(get_post()->ID)); ?>">
                                    <h4><?php echo get_the_title(); ?></h4>
                                </a>

                            </div>
                        </div>

                    </div>

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>

            <?php endif; ?>

        </div>
    </div>
</div>


<!--================ three-block section end =================-->

<!--================ Latest news section start =================-->

<section class="latest-news  area-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="area-heading">
                <h3><?php echo get_cat_name(15); ?></h3>
                <p> <?php echo category_description(15); ?> </p>
            </div>
        </div>

        <div class="row">
            <?php
            $i = 0;
            $args = array(
                'post_type' => 'blogs',
                'posts_per_page' => 5,
                'cat' => 15

            );
            $query = new WP_Query($args); ?>

            <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                    <?php if ($i == 1) { ?>
                        <div class="col-lg-6">
                            <div class="row">
                            <?php } ?>

                            <div class="col-lg-6">
                                <div class="<?php if ($i == 0) {
                                                echo 'single-blog style-five';
                                            } else {
                                                echo 'single-blog style-five small';
                                            }
                                            ?>">
                                    <div class="thumb">
                                        <img class="img-fluid" src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="">
                                    </div>
                                    <div class="short_details">
                                        <div class="meta-top d-flex">
                                            <a href="#"><?php echo get_the_date(); ?></a>
                                        </div>
                                        <a class="d-block" href="<?php echo esc_url(get_permalink(get_post()->ID)); ?>">
                                            <h4><?php echo get_the_title(); ?></h4>
                                        </a>
                                        <div class="meta-bottom d-flex">
                                            <a href="#"><?php echo get_the_date(); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php $i++; ?>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
            </div>
</section>
<!--================ Latest news section end =================-->
<?php
get_footer();
