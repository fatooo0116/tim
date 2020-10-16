<?php
/**
 * Created by PhpStorm.
 * User: jeihsienhsu
 * Date: 15/5/12
 * Time: 下午11:09
 */




add_action( 'init', 'codex_ruibian_init' );
/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function codex_ruibian_init() {
    $labels = array(
        'name'               => _x( 'Ruibian', 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'      => _x( 'Ruibian', 'post type singular name', 'your-plugin-textdomain' ),
        'menu_name'          => _x( 'Ruibian', 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'     => _x( 'Ruibian', 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'            => _x( 'Add New', 'Work', 'your-plugin-textdomain' ),
        'add_new_item'       => __( 'Add New Ruibian', 'your-plugin-textdomain' ),
        'new_item'           => __( 'New Ruibian', 'your-plugin-textdomain' ),
        'edit_item'          => __( 'Edit Ruibian', 'your-plugin-textdomain' ),
        'view_item'          => __( 'View Ruibian', 'your-plugin-textdomain' ),
        'all_items'          => __( 'All Ruibian', 'your-plugin-textdomain' ),
        'search_items'       => __( 'Search Ruibian', 'your-plugin-textdomain' ),
        'parent_item_colon'  => __( 'Parent Ruibian:', 'your-plugin-textdomain' ),
        'not_found'          => __( 'No Ruibian found.', 'your-plugin-textdomain' ),
        'not_found_in_trash' => __( 'No Ruibian found in Trash.', 'your-plugin-textdomain' )
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'ruibian-casestudy' ,'with_front' => FALSE),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt')
    );

    register_post_type( 'ruibian', $args );
}














add_action( 'init', 'codex_work_init' );
/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function codex_work_init() {
    $labels = array(
        'name'               => _x( 'Work', 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'      => _x( 'Work', 'post type singular name', 'your-plugin-textdomain' ),
        'menu_name'          => _x( 'Work', 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'     => _x( 'Work', 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'            => _x( 'Add New', 'Work', 'your-plugin-textdomain' ),
        'add_new_item'       => __( 'Add New Work', 'your-plugin-textdomain' ),
        'new_item'           => __( 'New Work', 'your-plugin-textdomain' ),
        'edit_item'          => __( 'Edit Work', 'your-plugin-textdomain' ),
        'view_item'          => __( 'View Work', 'your-plugin-textdomain' ),
        'all_items'          => __( 'All Works', 'your-plugin-textdomain' ),
        'search_items'       => __( 'Search Works', 'your-plugin-textdomain' ),
        'parent_item_colon'  => __( 'Parent Works:', 'your-plugin-textdomain' ),
        'not_found'          => __( 'No Works found.', 'your-plugin-textdomain' ),
        'not_found_in_trash' => __( 'No Works found in Trash.', 'your-plugin-textdomain' )
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        /*  'rewrite'            => array( 'slug' => 'work' ,'with_front' => FALSE), */
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    );

    register_post_type( 'work', $args );
}




// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_work_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_work_taxonomies() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x( 'Work Category', 'taxonomy general name' ),
        'singular_name'     => _x( 'Work Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Work Category' ),
        'all_items'         => __( 'All Work Category' ),
        'parent_item'       => __( 'Parent Work Category' ),
        'parent_item_colon' => __( 'Parent Work Category' ),
        'edit_item'         => __( 'Edit Work Category' ),
        'update_item'       => __( 'Update Work Category' ),
        'add_new_item'      => __( 'Add New Work Category' ),
        'new_item_name'     => __( 'New Work Category Name' ),
        'menu_name'         => __( 'Work Category' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
       /*  'rewrite'           => array( 'slug' => 'work','with_front' => FALSE  ), */
    );

    register_taxonomy( 'work_category', array( 'work' ), $args );
}












add_action( 'init', 'codex_journal_init' );
/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function codex_journal_init() {
    $labels = array(
        'name'               => _x( 'Journal', 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'      => _x( 'Journal', 'post type singular name', 'your-plugin-textdomain' ),
        'menu_name'          => _x( 'Journal', 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'     => _x( 'Journal', 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'            => _x( 'Add New', 'Journal', 'your-plugin-textdomain' ),
        'add_new_item'       => __( 'Add New Journal', 'your-plugin-textdomain' ),
        'new_item'           => __( 'New Journal', 'your-plugin-textdomain' ),
        'edit_item'          => __( 'Edit Journal', 'your-plugin-textdomain' ),
        'view_item'          => __( 'View Journal', 'your-plugin-textdomain' ),
        'all_items'          => __( 'All Journals', 'your-plugin-textdomain' ),
        'search_items'       => __( 'Search Journals', 'your-plugin-textdomain' ),
        'parent_item_colon'  => __( 'Parent Journals:', 'your-plugin-textdomain' ),
        'not_found'          => __( 'No Journals found.', 'your-plugin-textdomain' ),
        'not_found_in_trash' => __( 'No Journals found in Trash.', 'your-plugin-textdomain' )
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        /* 'rewrite'            => array( 'slug' => 'journal' ,'with_front' => FALSE ), */
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    );

    register_post_type( 'journal', $args );
}





// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_journal_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_journal_taxonomies() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x( 'Journal Category', 'taxonomy general name' ),
        'singular_name'     => _x( 'Journal Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Journal Category' ),
        'all_items'         => __( 'All Journal Category' ),
        'parent_item'       => __( 'Parent Journal Category' ),
        'parent_item_colon' => __( 'Parent Journal Category' ),
        'edit_item'         => __( 'Edit Journal Category' ),
        'update_item'       => __( 'Update Journal Category' ),
        'add_new_item'      => __( 'Add New Journal Category' ),
        'new_item_name'     => __( 'New Journal Category Name' ),
        'menu_name'         => __( 'Journal Category' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        /* 'rewrite'           => array( 'slug' => 'journal' ,'with_front' => FALSE ), */
    );

    register_taxonomy( 'journal_category', array( 'journal' ), $args );
}





add_action( 'init', 'codex_us_init' );
/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function codex_us_init() {
    $labels = array(
        'name'               => _x( 'Us', 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'      => _x( 'Us', 'post type singular name', 'your-plugin-textdomain' ),
        'menu_name'          => _x( 'Us', 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'     => _x( 'Us', 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'            => _x( 'Add New', 'Us', 'your-plugin-textdomain' ),
        'add_new_item'       => __( 'Add New Us', 'your-plugin-textdomain' ),
        'new_item'           => __( 'New Us', 'your-plugin-textdomain' ),
        'edit_item'          => __( 'Edit Us', 'your-plugin-textdomain' ),
        'view_item'          => __( 'View Us', 'your-plugin-textdomain' ),
        'all_items'          => __( 'All Us', 'your-plugin-textdomain' ),
        'search_items'       => __( 'Search Us', 'your-plugin-textdomain' ),
        'parent_item_colon'  => __( 'Parent Us:', 'your-plugin-textdomain' ),
        'not_found'          => __( 'No Us found.', 'your-plugin-textdomain' ),
        'not_found_in_trash' => __( 'No Us found in Trash.', 'your-plugin-textdomain' )
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
      /*  'rewrite'            => array( 'slug' => 'us','with_front' => FALSE  ), */
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    );

    register_post_type( 'us', $args );
}





// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_us_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_us_taxonomies() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x( 'Us Category', 'taxonomy general name' ),
        'singular_name'     => _x( 'Us Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Us Category' ),
        'all_items'         => __( 'All Us Category' ),
        'parent_item'       => __( 'Parent Us Category' ),
        'parent_item_colon' => __( 'Parent Us Category' ),
        'edit_item'         => __( 'Edit Us Category' ),
        'update_item'       => __( 'Update Us Category' ),
        'add_new_item'      => __( 'Add New Us Category' ),
        'new_item_name'     => __( 'New Us Category Name' ),
        'menu_name'         => __( 'Us Category' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        /* 'rewrite'           => array( 'slug' => 'Us' ), */
    );

    register_taxonomy( 'Us_category', array( 'us' ), $args );
}







add_action( 'init', 'codex_member_init' );
/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function codex_member_init() {
    $labels = array(
        'name'               => _x( 'Member', 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'      => _x( 'Member', 'post type singular name', 'your-plugin-textdomain' ),
        'menu_name'          => _x( 'Member', 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'     => _x( 'Member', 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'            => _x( 'Add New', 'Member', 'your-plugin-textdomain' ),
        'add_new_item'       => __( 'Add New Member', 'your-plugin-textdomain' ),
        'new_item'           => __( 'New Member', 'your-plugin-textdomain' ),
        'edit_item'          => __( 'Edit Member', 'your-plugin-textdomain' ),
        'view_item'          => __( 'View Member', 'your-plugin-textdomain' ),
        'all_items'          => __( 'All Members', 'your-plugin-textdomain' ),
        'search_items'       => __( 'Search Members', 'your-plugin-textdomain' ),
        'parent_item_colon'  => __( 'Parent Members:', 'your-plugin-textdomain' ),
        'not_found'          => __( 'No Members found.', 'your-plugin-textdomain' ),
        'not_found_in_trash' => __( 'No Members found in Trash.', 'your-plugin-textdomain' )
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        /*  'rewrite'            => array( 'slug' => 'work' ,'with_front' => FALSE), */
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    );

    register_post_type( 'member', $args );
}




// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_member_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_member_taxonomies() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x( 'Member Category', 'taxonomy general name' ),
        'singular_name'     => _x( 'Member Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Member Category' ),
        'all_items'         => __( 'All Member Category' ),
        'parent_item'       => __( 'Parent Member Category' ),
        'parent_item_colon' => __( 'Parent Member Category' ),
        'edit_item'         => __( 'Edit Member Category' ),
        'update_item'       => __( 'Update Member Category' ),
        'add_new_item'      => __( 'Add New Member Category' ),
        'new_item_name'     => __( 'New Member Category Name' ),
        'menu_name'         => __( 'Member Category' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        /*  'rewrite'           => array( 'slug' => 'work','with_front' => FALSE  ), */
    );

    register_taxonomy( 'member_category', array( 'member' ), $args );
}
