<?php
/**
 * Calls the class on the post edit screen.
 */
function call_someClass() {
    new someClass();
}
 
if ( is_admin() ) {
    add_action( 'load-post.php',     'call_someClass' );
    add_action( 'load-post-new.php', 'call_someClass' );
}
 
/**
 * The Class.
 */
class someClass {
 
    /**
     * Hook into the appropriate actions when the class is constructed.
     */
    public function __construct() {
        add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
        add_action( 'save_post',      array( $this, 'save'         ) );
    }
 
    /**
     * Adds the meta box container.
     */
    public function add_meta_box( $post_type ) {
        // Limit meta box to certain post types.
        $post_types = array( 'post');
 
        if ( in_array( $post_type, $post_types ) ) {
            add_meta_box(
                'some_meta_box_name',
                __( '相關文章', 'textdomain' ),
                array( $this, 'render_meta_box_content' ),
                $post_type,
                'side',
                'high'
            );
        }
    }
 
    /**
     * Save the meta when the post is saved.
     *
     * @param int $post_id The ID of the post being saved.
     */
    public function save( $post_id ) {
 
        /*
         * We need to verify this came from the our screen and with proper authorization,
         * because save_post can be triggered at other times.
         */
 
        // Check if our nonce is set.
        if ( ! isset( $_POST['myplugin_inner_custom_box_nonce'] ) ) {
            return $post_id;
        }
 
        $nonce = $_POST['myplugin_inner_custom_box_nonce'];
 
        // Verify that the nonce is valid.
        if ( ! wp_verify_nonce( $nonce, 'myplugin_inner_custom_box' ) ) {
            return $post_id;
        }
 
        /*
         * If this is an autosave, our form has not been submitted,
         * so we don't want to do anything.
         */
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return $post_id;
        }
 
        // Check the user's permissions.
        if ( 'page' == $_POST['post_type'] ) {
            if ( ! current_user_can( 'edit_page', $post_id ) ) {
                return $post_id;
            }
        } else {
            if ( ! current_user_can( 'edit_post', $post_id ) ) {
                return $post_id;
            }
        }
 
        /* OK, it's safe for us to save the data now. */
 
        // Sanitize the user input.
        $mydata = sanitize_text_field( $_POST['myplugin_new_field'] );
        $mydata2 = sanitize_text_field( $_POST['myplugin_new_field2'] );
        $mydata3 = sanitize_text_field( $_POST['myplugin_new_field3'] );
 
        // Update the meta field.
        update_post_meta( $post_id, '_my_meta_value_key', $mydata );
        update_post_meta( $post_id, '_my_meta_value_key2', $mydata2 );
        update_post_meta( $post_id, '_my_meta_value_key3', $mydata3 );
    }
 
 
    /**
     * Render Meta Box content.
     *
     * @param WP_Post $post The post object.
     */
    public function render_meta_box_content( $post ) {
 
        // Add an nonce field so we can check for it later.
        wp_nonce_field( 'myplugin_inner_custom_box', 'myplugin_inner_custom_box_nonce' );
 
        // Use get_post_meta to retrieve an existing value from the database.
        $value = get_post_meta( $post->ID, '_my_meta_value_key', true );
        $value2 = get_post_meta( $post->ID, '_my_meta_value_key2', true );
        $value3 = get_post_meta( $post->ID, '_my_meta_value_key3', true );
        // Display the form, using the current value.
        ?>
        <style>
        #mpx{ display:flex; padding:5px 0 0;}
        #mpx input{display:block;margin:0 3px;width: 33.3%;}
        </style>
        <small>請輸入文章 id</small>
        <div id="mpx">
        <input type="text" id="myplugin_new_field" name="myplugin_new_field" value="<?php echo esc_attr( $value ); ?>" size="25" />
        <input type="text" id="myplugin_new_field2" name="myplugin_new_field2" value="<?php echo esc_attr( $value2 ); ?>" size="25" />
        <input type="text" id="myplugin_new_field3" name="myplugin_new_field3" value="<?php echo esc_attr( $value3 ); ?>" size="25" />
        </div>
        <?php
    }
}