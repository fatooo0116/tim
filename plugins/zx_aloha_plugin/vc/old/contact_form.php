<?php

// don't load directly
if (!defined('ABSPATH')) die('-1');



function contact_form(){
    vc_map(
        array(
            'name'            => __('Contact From', 'psky'),
            'base'            => 'contact_form',
            "category" => array('STRIGHT'),
            //  "icon" => plugins_url('../img/slider.png', __FILE__),
            /*
            'content_element' => true,
            'show_settings_on_create' => false,
            "js_view" => 'VcColumnView',
            */
            "params" => array(              

                array(
                    "type" => "textarea_raw_html",
                    "class" => "",
                    "heading" => __( "Content", "my-text-domain" ),
                    "param_name" => "content1",
                    "value" => __( "", "my-text-domain" ),
                    "admin_label" => true,
                ),                
                                                               
            )
        )
    );
}
add_action( 'vc_before_init', 'contact_form' );







/*
 *  ShortCode
 *
 * */
function contact_form_fun( $atts, $content = null ) {
    extract( shortcode_atts( array(
        // 'button_text' => '',
       
        'content1' => ''
    ), $atts ) );

    $content1 = rawurldecode( base64_decode($atts['content1'])); 
    $href = vc_build_link( $mlink);

    ob_start();
    ?>
        <section class="contact_section  box_width">            
            <div class="content"><?php echo do_shortcode($content1); ?></div>      
        </section>
    <?php
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}
add_shortcode( 'contact_form', 'contact_form_fun' );
