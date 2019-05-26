<?php
// Register and load the widget
function tag_load_widget()
{
    register_widget('tag_widget');
}
add_action('widgets_init', 'tag_load_widget');

// Creating the widget 
class tag_widget extends WP_Widget
{
    public function __construct()
    {

        $options = array(
            'classname' => 'tag_cloud_widget',
            'description' => 'Tag widget',
        );

        parent::__construct(
            'tag_widget',
            'Tag Widget',
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
        /*         echo __('<ul class="list">' .
            $tags = wp_tag_cloud(array(
                'taxonomy' => 'type',
            )) . '</ul>', 'tag_widget_domain'); */
        echo '<ul class="list">';
        $tags = get_terms('type');
        foreach ($tags as $tag) {
            $tag_link = get_tag_link($tag->term_id);

            $html .= "<li><a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
            $html .= "{$tag->name}</a></li>";
        }
        echo $html;
        echo '</ul>';





        echo $args['after_widget'];
    }

    // Widget Backend
    public function form($instance)
    {
        $title = isset($instance['title']) ? $instance['title'] : __('', 'tag_widget_domain');



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
