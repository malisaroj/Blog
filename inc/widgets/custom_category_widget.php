<?php
// Register and load the widget
function post_load_widget()
{
  register_widget('post_widget');
}
add_action('widgets_init', 'post_load_widget');

// Creating the widget 
class post_widget extends WP_Widget
{
  public function __construct()
  {

    $options = array(
      'classname' => 'post_category_widget',
      'description' => 'Post widget',
    );

    parent::__construct(
      'post_widget',
      'Post Widget',
      $options
    );
  }

  // Creating widget front-end

  public function widget($args, $instance)
  {
    $title = apply_filters('widget_title', $instance['title']);

    // before and after widget arguments are defined by themes
    //        echo '<aside class="single_sidebar_widget tag_cloud_widget">' . $before_widget;


    echo $args['before_widget'];
    if (!empty($title))
      echo $args['before_title'] . $title . $args['after_title'];

    // This is where you run the code and display the output
    // Get the category list, and tweak the output of the markup.
    //$pattern = '#<li([^>]*)><a([^>]*)>(.*?)<\/a>\s*\(([0-9]*)\)\s*<\/li>#i';  // removed ( and )

    // $replacement = '<li$1><a$2>$3</a><span class="cat-count">$4</span>'; // no link on span
    // $replacement = '<li$1><a$2>$3</a><span class="cat-count"><a$2>$4</a></span>'; // wrap link in span
    //$replacement = '<li$1><a$2><span class="cat-name">$3</span><span class="cat-count">$4</span></a>'; // give cat name and count a span, wrap it all in a link

   
    //echo preg_replace( $pattern, $replacement, $subject );
    //Display
    echo __('<ul class="list cat-list">' .  $subject = wp_list_categories('echo=0&orderby=name&exclude=&title_li=&depth=1&show_count=1') . '</ul>', 'post_widget_domain');



    echo $args['after_widget'];
  }

  // Widget Backend
  public function form($instance)
  {
    $title = isset($instance['title']) ? $instance['title'] : __('', 'post_widget_domain');



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
