<?php

// don't load directly
if (!defined('ABSPATH')) die('-1');



function contact_us_bottom(){
    vc_map(
        array(
            'name'            => __('Contact Us Bottom', 'psky'),
            'base'            => 'contact_us_bottom',
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
                    "admin_label" => true,
                ),

                array(
                    "type" => "textarea",
                    "class" => "",
                    "heading" => __( "Content", "my-text-domain" ),
                    "param_name" => "content1",
                    "value" => __( "", "my-text-domain" ),
                ),  


                array(
                    "type" => "vc_link",
                    "class" => "",
                    "heading" => __( "Book a Call Back Link", "my-text-domain" ),
                    "param_name" => "blink1",
                    "value" => __( "", "my-text-domain" ),
                ),  

                array(
                    "type" => "vc_link",
                    "class" => "",
                    "heading" => __( "Leave a Message Link", "my-text-domain" ),
                    "param_name" => "blink2",
                    "value" => __( "", "my-text-domain" ),
                ),   

                
                array(
                    "type" => "attach_image",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("right Image", 'psky'),
                    "param_name" => "rimg",                   
                  ), 
                                                               
            )
        )
    );
}
add_action( 'vc_before_init', 'contact_us_bottom' );







/*
 *  ShortCode
 *
 * */
function contact_us_bottom_fun( $atts, $content = null ) {
    extract( shortcode_atts( array(
        // 'button_text' => '',
        'title'=>'',
        'content1'=>'',            
        'blink1' => '',
        'blink2' => '',
        'rimg'=>''   
    ), $atts ) );

    // $contact = rawurldecode( base64_decode($atts['contact'])); 
    $blink1 = vc_build_link( $blink1);
    $blink2 = vc_build_link( $blink2);

    $rimg = wp_get_attachment_image_src( $rimg, 'full');



    ob_start();
    ?>
        <section id="contact_us_bottom" class="  box_width">           
            <div class="inner">
                <div class="left">
                    <h3><?php echo $title; ?></h3>
                    <div class="content">
                        <?php echo $content1; ?>
                    </div>  
                    <div class="control">
                        <a href=""  class="button">Book a Call Back</a>
                        <a href=""  class="button  reverse">Leave a Message</a>
                    </div>
                </div>
                <div class="right">
                    <?php 
                        if($rimg){
                            echo '<img src="'.$rimg[0].'"/>';
                        }
                    ?>
                </div>
            </div>
        </section>
    <?php
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}
add_shortcode( 'contact_us_bottom', 'contact_us_bottom_fun' );
