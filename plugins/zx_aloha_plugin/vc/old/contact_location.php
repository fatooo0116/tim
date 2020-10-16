<?php

// don't load directly
if (!defined('ABSPATH')) die('-1');



function contact_location(){
    vc_map(
        array(
            'name'            => __('Contact Location', 'psky'),
            'base'            => 'contact_location',
            "category" => array('STRIGHT'),
            //  "icon" => plugins_url('../img/slider.png', __FILE__),
            /*
            'content_element' => true,
            'show_settings_on_create' => false,
            "js_view" => 'VcColumnView',
            */
            "params" => array(
              
                array(
                    "type" => "attach_image",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Map Image", 'psky'),
                    "param_name" => "rimg",                   
                  ),  
                  
                array(
                    "type" => "vc_link",
                    "class" => "",
                    "heading" => __( "Map Link", "my-text-domain" ),
                    "param_name" => "map_link",
                    "value" => __( "", "my-text-domain" ),
                ),                  

                array(
                    "type" => "textfield",
                    "class" => "",
                    "heading" => __( "Title", "my-text-domain" ),
                    "param_name" => "title",
                    "value" => __( "", "my-text-domain" ),
                    "admin_label" => true,
                ),

                array(
                    "type" => "textarea",
                    "class" => "",
                    "heading" => __( "Contact info", "my-text-domain" ),
                    "param_name" => "content_info",
                    "value" => __( "", "my-text-domain" ),
                ),                
                                                               
            )
        )
    );
}
add_action( 'vc_before_init', 'contact_location' );







/*
 *  ShortCode
 *
 * */
function contact_location_fun( $atts, $content = null ) {
    extract( shortcode_atts( array(
        // 'button_text' => '',
        'title'=>'',
        'rimg'=>'',
        'map_link'=>'',
        'content_info' => ''
    ), $atts ) );

    // $contact = rawurldecode( base64_decode($atts['contact'])); 
    $href = vc_build_link( $mlink);
    $rimg = wp_get_attachment_image_src( $rimg, 'full');

    ob_start();
    ?>
        <section id="contact_location" class="  box_width">           
            <div class="inner">
                <?php 
                    if($rimg){
                        echo '<a href="'.$href['url'].'" target="_blank" class="left_img" ><img src="'.$rimg[0].'"></a>';
                    }
                ?>
                <div class="info_board">
                    <h3><?php echo $title; ?></h3>
                    <div class="contact_info">
                        <?php echo $content_info; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}
add_shortcode( 'contact_location', 'contact_location_fun' );
