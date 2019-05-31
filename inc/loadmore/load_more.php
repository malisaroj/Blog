<?php

function load_more_scripts()
{

	global $wp_query;
	$published_posts = wp_count_posts('blogs')->publish;
	$posts_per_page = 3;
	$total = ceil($published_posts / $posts_per_page);

	// register our main script but do not enqueue it yet
	wp_register_script('loadmore', get_template_directory_uri() . '/js/load-more.js', array('jquery'));

	// now the most interesting part
	// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script('loadmore', 'loadmore_params', array(
		'ajaxurl' => admin_url('admin-ajax.php'), // WordPress AJAX
		'posts' => json_encode($wp_query->query_vars), // everything about your loop is here
		'current_page' => get_query_var('paged') ? get_query_var('paged') : 1,
		'max_page' => $total
	));

	wp_enqueue_script('loadmore');
}

add_action('wp_enqueue_scripts', 'load_more_scripts');




function load_posts_by_ajax_callback()
{
	//check_ajax_referer('load_more_posts', 'security');
	$paged = $_POST['page'] + 1;
	$args = array(
		'post_type' => 'blogs',
		'post_status' => 'publish',
		'posts_per_page' => '3',
		'paged' => $paged,
	);
	$my_posts = new WP_Query($args);
	if ($my_posts->have_posts()) :
		?>
		<?php while ($my_posts->have_posts()) : $my_posts->the_post(); ?>
		<div class="col-md-6 col-lg-4">
		  <div class="single-category">
			<div class="thumb">
			  <img class="img-fluid" src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="">
			</div>
			<div class="short_details">
			  <div class="meta-top d-flex">
				<a href="#"> <?php echo get_the_date(); ?></a>
			  </div>
			  <a class="d-block" href="<?php echo esc_url(get_permalink(get_post()->ID)); ?>">
				<h4><?php echo get_the_title(); ?></h4>
			  </a>

			</div>
		  </div>
		</div>
		<?php endwhile; ?>
	<?php
endif;

wp_die();
}

add_action('wp_ajax_load_posts_by_ajax', 'load_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax', 'load_posts_by_ajax_callback');
