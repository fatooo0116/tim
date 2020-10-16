<?php 

add_action( 'init', 'codex_job_init' );
/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function codex_job_init() {
	$labels = array(
		'name'               => _x( 'Job', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Job', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Jobs', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Job', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'Job', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Job', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Job', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Job', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Job', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Jobs', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Jobs', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Jobs:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Jobs found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Jobs found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'job' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' )
	);

    register_post_type( 'job', $args );
    


    	// Add new taxonomy, NOT hierarchical (like tags)
	$labels = array(
		'name'                       => _x( 'Job Type', 'taxonomy general name', 'textdomain' ),
		'singular_name'              => _x( 'Job Type', 'taxonomy singular name', 'textdomain' ),
		'search_items'               => __( 'Search Job Type', 'textdomain' ),
		'popular_items'              => __( 'Popular Job Type', 'textdomain' ),
		'all_items'                  => __( 'All Job Type', 'textdomain' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Job Type', 'textdomain' ),
		'update_item'                => __( 'Update Job Type', 'textdomain' ),
		'add_new_item'               => __( 'Add New Job Type', 'textdomain' ),
		'new_item_name'              => __( 'New Job Type Name', 'textdomain' ),
		'separate_items_with_commas' => __( 'Separate Job Type with commas', 'textdomain' ),
		'add_or_remove_items'        => __( 'Add or remove Job Type', 'textdomain' ),
		'choose_from_most_used'      => __( 'Choose from the most used Job Type', 'textdomain' ),
		'not_found'                  => __( 'No Job Type found.', 'textdomain' ),
		'menu_name'                  => __( 'Job Type', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'job_type' ),
	);

    register_taxonomy( 'job_type', 'job', $args );
    

        
    // Add new taxonomy, NOT hierarchical (like tags)
	$labels = array(
		'name'                       => _x( 'Job Country', 'taxonomy general name', 'textdomain' ),
		'singular_name'              => _x( 'Job Country', 'taxonomy singular name', 'textdomain' ),
		'search_items'               => __( 'Search Job Country', 'textdomain' ),
		'popular_items'              => __( 'Popular Job Country', 'textdomain' ),
		'all_items'                  => __( 'All Job Country', 'textdomain' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Job Country', 'textdomain' ),
		'update_item'                => __( 'Update Job Country', 'textdomain' ),
		'add_new_item'               => __( 'Add New Job Country', 'textdomain' ),
		'new_item_name'              => __( 'New Job Country Name', 'textdomain' ),
		'separate_items_with_commas' => __( 'Separate Job Country with commas', 'textdomain' ),
		'add_or_remove_items'        => __( 'Add or remove Job Country', 'textdomain' ),
		'choose_from_most_used'      => __( 'Choose from the most used Job Country', 'textdomain' ),
		'not_found'                  => __( 'No Job Country found.', 'textdomain' ),
		'menu_name'                  => __( 'Job Country', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'job_country' ),
	);

	register_taxonomy( 'job_country', 'job', $args );
}



function call_jobClass() {
    new jobClass();
}
 
if ( is_admin() ) {
    add_action( 'load-post.php',     'call_jobClass' );
    add_action( 'load-post-new.php', 'call_jobClass' );
}
 
/**
 * The Class.
 */
class jobClass {
 
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
        $post_types = array( 'job' );
 
        if ( in_array( $post_type, $post_types ) ) {
            add_meta_box(
                'job_link_url_name',
                __( 'Job Apply  URL', 'textdomain' ),
                array( $this, 'render_meta_box_content' ),
                $post_type,
                'advanced',
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
 
        // Update the meta field.
        update_post_meta( $post_id, '_my_meta_value_key', $mydata );
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
 
        // Display the form, using the current value.
        ?>
        <label for="myplugin_new_field">
            <?php _e( '', 'textdomain' ); ?>
        </label>
        <input type="text" style="width:100%;" id="myplugin_new_field" name="myplugin_new_field" value="<?php echo esc_attr( $value ); ?>" size="25" />
        <?php
    }
}