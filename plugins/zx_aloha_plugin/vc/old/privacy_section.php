<?php

// don't load directly
if (!defined('ABSPATH')) die('-1');



function privacy_section(){
    vc_map(
        array(
            'name'            => __('Privacy Section', 'psky'),
            'base'            => 'privacy_section',
            "category" => array('STRIGHT'),
            //  "icon" => plugins_url('../img/slider.png', __FILE__),
            /*
            'content_element' => true,
            'show_settings_on_create' => false,
            "js_view" => 'VcColumnView',
            */
            "params" => array(
              
                array(
                    "type" => "textfield",
                    "class" => "",
                    "heading" => __( "Title", "my-text-domain" ),
                    "param_name" => "title",
                    "value" => __( "", "my-text-domain" ),
                ),

                array(
                    "type" => "textarea",
                    "class" => "",
                    "heading" => __( "Content", "my-text-domain" ),
                    "param_name" => "content1",
                    "value" => __( "", "my-text-domain" ),
                ),                
                                                               
            )
        )
    );
}
add_action( 'vc_before_init', 'privacy_section' );







/*
 *  ShortCode
 *
 * */
function privacy_section_fun( $atts, $content = null ) {
    extract( shortcode_atts( array(
        // 'button_text' => '',
        'title'=>'',
        'content1' => ''
    ), $atts ) );

    // $contact = rawurldecode( base64_decode($atts['contact'])); 
    $href = vc_build_link( $mlink);

    ob_start();
    ?>
        <section class="privact_section  box_width">
            <h3><?php echo $title; ?></h3>
            <div class="content"><?php echo $content1; ?></div>        
        </section>
    <?php
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}
add_shortcode( 'privacy_section', 'privacy_section_fun' );
