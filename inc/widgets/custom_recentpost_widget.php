<?php
// Register and load the widget
function recentpost_load_widget()
{
    register_widget('recentpost_widget');
}
add_action('widgets_init', 'recentpost_load_widget');

// Creating the widget 
class recentpost_widget extends WP_Widget
{
    public function __construct()
    {

        $options = array(
            'classname' => 'popular_post_widget',
            'description' => 'Recent post widget',
        );

        parent::__construct(
            'recentpost_widget',
            'Recentpost Widget',
            $options
        );
    }

    // Creating widget front-end

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);


        // before and after widget arguments are defined by themes


        echo $args['before_widget'];
        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_title'];

        // This is where you run the code and display the output
        //Display

        $recent_posts = wp_get_recent_posts(array(
            'numberposts' => 4,
            'post_type' => 'blogs',
        ));
        foreach ($recent_posts as $recent) {
            echo '<div class="media post_item"><img width="90" height="90" alt="post" src="' . get_the_post_thumbnail($recent["ID"]) . '<div class="media-body"><a href="' . get_permalink($recent["ID"]) . '"><h3>' . $recent["post_title"] . '</h3></a><p>' . get_the_date() . '</p></div></div> ';
        }
        wp_reset_query();


        echo '</aside>';


        echo $args['after_widget'];
    }

    // Widget Backend
    public function form($instance)
    {
        $title = isset($instance['title']) ? $instance['title'] : __('', 'recentpost_widget_domain');

        // Widget admin form
        ?>
    <p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
    </p>


<?php
}

// Updating widget replacing old instances with new
public function update($new_instance, $old_instance)
{
    $instance = array();
    $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';

    return $instance;
}
} // Class wpb_widget ends here
