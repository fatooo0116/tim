<?php
/**
 * Created by PhpStorm.
 * User: jeihsienhsu
 * Date: 15/5/12
 * Time: 下午9:59
 */

// Callback function to insert 'styleselect' into the $buttons array
function my_mce_buttons_3( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}
// Register our callback to the appropriate filter
add_filter('mce_buttons_3', 'my_mce_buttons_3');


// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats( $init_array ) {
    // Define the style_formats array
    $style_formats = array(
        // Each array child is a format with it's own settings
        array(
            'title' => '.translation',
            'block' => 'blockquote',
            'classes' => 'translation',
            'wrapper' => true,

        ),
        array(
            'title' => '⇠.rtl',
            'block' => 'blockquote',
            'classes' => 'rtl',
            'wrapper' => true,
        ),
        array(
            'title' => '.ltr⇢',
            'block' => 'blockquote',
            'classes' => 'ltr',
            'wrapper' => true,
        ),
    );
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode( $style_formats );

    return $init_array;

}
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );