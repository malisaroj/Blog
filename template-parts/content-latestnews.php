<div class="col-lg-8 mb-5 mb-lg-0">
    <div class="blog_left_sidebar">
        <?php
        // Protect against arbitrary paged values
        $paged = (get_query_var ('paged')) ? absint (get_query_var ('paged')): 1;


        $args = array(
            'post_type' => 'news',
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
            <?php ea_news_navigation(); ?>


        </div>

        </nav>
    </div>
</div>