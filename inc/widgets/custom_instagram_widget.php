<?php
// Register and load the widget
function instagram_load_widget()
{
    register_widget('instagram_widget');
}
add_action('widgets_init', 'instagram_load_widget');

// Creating the widget 
class instagram_widget extends WP_Widget
{
    public function __construct()
    {

        $options = array(
            'classname' => 'instagram_feeds',
            'description' => 'instagram widget',
        );

        parent::__construct(
            'instagram_widget',
            'Instagram Widget',
            $options
        );
    }

    // Creating widget front-end

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);
        $info = isset($instance['info']) ? $instance['info'] : __('', 'instagram_widget_domain');


        // before and after widget arguments are defined by themes
        //        echo '<aside class="single_sidebar_widget tag_cloud_widget">' . $before_widget;


        echo $args['before_widget'];
        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_title'];

        // This is where you run the code and display the output
        echo '<ul class="instagram_row flex-wrap">';
        //Display
        $test = wpabsolute_instagram_feed(6);
        foreach ($test as $m) {
            echo '<li><a href="' . $m->images->standard_resolution->url . '">
            <img class="img-fluid" src="' . $m->images->thumbnail->url . '" alt=" ">
        </a></li>';
        }
        wp_reset_query();
        echo '</ul>';
        echo $args['after_widget'];
    }

    // Widget Backend
    public function form($instance)
    {
        $title = isset($instance['title']) ? $instance['title'] : __('', 'instagram_widget_domain');

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
