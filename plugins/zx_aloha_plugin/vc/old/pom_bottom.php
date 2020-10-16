<?php

// don't load directly
if (!defined('ABSPATH')) die('-1');



function pom_bottom(){
    vc_map(
        array(
            'name'            => __('POM Bottom', 'psky'),
            'base'            => 'pom_bottom',
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
                    "type" => "textfield",
                    "class" => "",
                    "heading" => __( "SubTitle", "my-text-domain" ),
                    "param_name" => "subtitle",
                    "value" => __( "", "my-text-domain" ),
                    "admin_label" => true,
                ), 

                array(
                    "type" => "textarea",
                    "class" => "",
                    "heading" => __( "Content", "my-text-domain" ),
                    "param_name" => "content1",
                    "value" => __( "", "my-text-domain" ),
                    "admin_label" => true,
                ),  

                array(
                    "type" => "vc_link",
                    "class" => "",
                    "heading" => __( "Button Link", "my-text-domain" ),
                    "param_name" => "all_link",
                    "value" => __( "", "my-text-domain" ),
                    "admin_label" => true,
                ),      
                
                array(
                    "type" => "attach_image",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Right Image", 'psky'),
                    "param_name" => "rimg",
                    "admin_label" => true,
                  ),   
                                                               
            )
        )
    );
}
add_action( 'vc_before_init', 'pom_bottom' );







/*
 *  ShortCode
 *
 * */
function pom_bottom_fun( $atts, $content = null ) {
    extract( shortcode_atts( array(
        // 'button_text' => '',
        'title'=>'',
        'subtitle'=>'',
        'content1'=>'',
        'all_link' => '',
        'rimg'=>''
    ), $atts ) );

   
    $all_link = vc_build_link( $all_link);
    $rimg = wp_get_attachment_image_src( $rimg, 'full');

    ob_start();
    ?>
        <section  id="pom_bottom" class="">            
            <div class="inner  contact_section  box_width">
                <div class="left">
                    <h3><?php echo $title; ?></h3>
                    <h4><?php echo $subtitle; ?></h4>
                    <div class="content">
                        <?php echo $content1; ?>
                    </div>
                </div>
                <div class="right">
                    <?php 
                        if($rimg[0]){
                            echo '<img src="'.$rimg[0].'" />';
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
add_shortcode( 'pom_bottom', 'pom_bottom_fun' );
