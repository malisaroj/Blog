<?php
//Template Name: Category Template
get_header();
?>


<!--================Fullwidth block Area =================-->


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

<!--================Category  Area Start =================-->
<section class="category-page area-padding">
    <div class="container">
        <div class="row">
            <?php
            $args = array(
                'post_type' => 'blogs',
                'posts_per_page' => 9
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>


                    <div class="col-md-6 col-lg-4">
                        <div class="single-category">
                            <div class="thumb">
                                <img class="img-fluid" src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="">
                            </div>
                            <div class="short_details">
                                <div class="meta-top d-flex">
                                    <a href="#"> <?php echo get_the_date(); ?></a>
                                </div>
                                <a class="d-block" href="single-blog.html">
                                    <h4><?php echo get_the_title(); ?></h4>
                                </a>

                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>

            <?php endif; ?>
            <div class="col-12 text-center">
                    <a href="" class="main_btn">Load More <span class="ti-angle-double-right"></span></a>
                </div>
        </div>
    </div>
</section>
<?php
get_footer();
