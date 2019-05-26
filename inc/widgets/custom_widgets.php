<?php
// Register and load the widget
function wpb_load_widget()
{
    register_widget('wpb_widget');
}
add_action('widgets_init', 'wpb_load_widget');

// Creating the widget 
class wpb_widget extends WP_Widget
{
    public function __construct()
    {

        $options = array(
            'classname' => 'custom_contact_widget',
            'description' => 'Contact widget',
        );

        parent::__construct(
            'wpb_widget',
            'Contact Widget',
            $options
        );
    }

    // Creating widget front-end

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);
        $icon = isset($instance['icon']) ? $instance['icon'] : __('', 'wpb_widget_domain');
        $address = isset($instance['address']) ? '1' : '0';
        $email = isset($instance['email']) ? '1' : '0';
        $phone = isset($instance['phone']) ? '1' : '0';
        $info = isset($instance['info']) ? $instance['info'] : __('', 'wpb_widget_domain');
        $description = isset($instance['description']) ? $instance['description'] : __('', 'wpb_widget_domain');




        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_title'];

        // This is where you run the code and display the output

        //Display
        if ($address)
            echo __('<span class="contact-info__icon"><i class="' . $icon . '"></i></span>
        <div class="media-body">
          <h3>' . $info . '</h3>
          <p>' . $description . '</p>
      </div>', 'wpb_widget_domain');

        if ($email)
            echo __('<span class="contact-info__icon"><i class="' . $icon . '"></i></span>
  <div class="media-body">
    <h3><a href="mailto:' . $info . '">' . $info . '</a></h3>
    <p>' . $description . '</p>
</div>', 'wpb_widget_domain');
        if ($phone)
            echo __('<span class="contact-info__icon"><i class="' . $icon . '"></i></span>
<div class="media-body">
<h3><a href="tel:' . $info . '">' . $info . '</a></h3>
<p>' . $description . '</p>
</div>', 'wpb_widget_domain');


        echo $args['after_widget'];
    }

    // Widget Backend 
    public function form($instance)
    {
        $title = isset($instance['title']) ? $instance['title'] : __('', 'wpb_widget_domain');
        $icon = isset($instance['icon']) ? $instance['icon'] : __('', 'wpb_widget_domain');
        $address = isset($instance['address']) ? '1' : '0';
        $email = isset($instance['email']) ? '1' : '0';
        $phone = isset($instance['phone']) ? '1' : '0';
        $info = isset($instance['info']) ? $instance['info'] : __('', 'wpb_widget_domain');
        $description = isset($instance['description']) ? $instance['description'] : __('', 'wpb_widget_domain');


        // Widget admin form
        ?>
    <p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('icon'); ?>"><?php _e('Icon:'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('icon'); ?>" name="<?php echo $this->get_field_name('icon'); ?>" type="text" value="<?php echo esc_attr($icon); ?>" />
    </p>

    <p>
        <input type="radio" name="<?php echo $this->get_field_name('address'); ?>" value="<?php echo esc_attr($address); ?>"> Address
        <input type="radio" name="<?php echo $this->get_field_name('email'); ?>" value="<?php echo esc_attr($email); ?>"> Email
        <input type="radio" name="<?php echo $this->get_field_name('phone'); ?>" value="<?php echo esc_attr($phone); ?>"> Phone
    </p>

    <p>
        <label for="<?php echo $this->get_field_id('info'); ?>"><?php _e('Address/Phone/Email:'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('info'); ?>" name="<?php echo $this->get_field_name('info'); ?>" type="text" value="<?php echo esc_attr($info); ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('description'); ?>"><?php _e('Description:'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>" type="text" value="<?php echo esc_attr($description); ?>" />
    </p>
<?php
}

// Updating widget replacing old instances with new
public function update($new_instance, $old_instance)
{
    $instance = array();
    $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
    $instance['icon'] = strip_tags($new_instance['icon']);
    $instance['address'] = ($new_instance['address']);
    $instance['email'] = ($new_instance['email']);
    $instance['phone'] = ($new_instance['phone']);
    $instance['info'] = strip_tags($new_instance['info']);
    $instance['description'] = strip_tags($new_instance['description']);

    return $instance;
}
} // Class wpb_widget ends here
