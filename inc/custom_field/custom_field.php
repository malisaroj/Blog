<?php 
//Adding the custom meta boxes

function test_register_meta_boxes()
{
    $screens = ['post'];
    foreach ($screens as $screen) {
        add_meta_box(
            'test-1', //Unique ID
            __( 'Author Details', 'test' ), //Box Title
            'test_custom_box_html', //Content callback, must be of type callable
            $screen, //Post Type
            'normal'
        );
    }
}

add_action('add_meta_boxes', 'test_register_meta_boxes');

//Getting the values from the metaboxes

function test_custom_box_html($post)
{
    wp_nonce_field( basename( __FILE__ ), 'test_nonce' );

    ?>
        <p class="meta-options test_field">
        <label for="test_author">Author</label>
        <input id="test_author" type="text" name="test_author"  value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'test_author', true ) ); ?>">
    </p>
    <p class="meta-options test_field">
        <label for="test_published_date">Published Date</label>
        <input id="test_published_date" type="date" name="test_published_date" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'test_published_date', true ) ); ?>">
    </p>
    <p class="meta-options test_field">
        <label for="test_price">Price</label>
        <input id="test_price" type="number" name="test_price" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'test_price', true ) ); ?>">
    </p>

    
    <?php

}

//Saving the meta boxes values
function test_save_meta_box($post_id)
{

        // Checks NONCE status

        $is_valid_nonce = ( isset( $_POST[ 'test_nonce' ] ) && wp_verify_nonce( $_POST[ 'test_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
     
        // Exits script depending on save status
        if ( !$is_valid_nonce ) {
            return;
        }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( $parent_id = wp_is_post_revision( $post_id ) ) {
        $post_id = $parent_id;
    }
    $fields = [
        'test_author',
        'test_published_date',
        'test_price',
    ];
    foreach ( $fields as $field ) {
        if ( array_key_exists( $field, $_POST ) ) {
            update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
        }
     }
}

add_action('save_post', 'test_save_meta_box');