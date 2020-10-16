<?php

// don't load directly
if (!defined('ABSPATH')) die('-1');



function app_display(){
    vc_map(
        array(
            'name'            => __('App Display', 'psky'),
            'base'            => 'app_display',
            "category" => array('STRIGHT'),
            //  "icon" => plugins_url('../img/slider.png', __FILE__),
            /*
            'content_element' => true,
            'show_settings_on_create' => false,
            "js_view" => 'VcColumnView',
            */
            "params" => array(              

                array(
                    "type" => "textarea",
                    "class" => "",
                    "heading" => __( "Title", "my-text-domain" ),
                    "param_name" => "title",
                    "value" => __( "", "my-text-domain" ),
                    "group"=>"left",
                    "admin_label" => true,
                ),  

                array(
                    "type" => "textarea",
                    "class" => "",
                    "heading" => __( "Title Text", "my-text-domain" ),
                    "param_name" => "subtitle",
                    "value" => __( "", "my-text-domain" ),
                    "group"=>"left",
                    "admin_label" => true,
                ),  

                array(
                    "type" => "textarea",
                    "class" => "",
                    "heading" => __( "Content", "my-text-domain" ),
                    "param_name" => "content1",
                    "value" => __( "", "my-text-domain" ),
                    "group"=>"left",
                    "admin_label" => true,
                ),  

                array(
                    "type" => "vc_link",
                    "class" => "",
                    "heading" => __( "Button Link", "my-text-domain" ),
                    "param_name" => "btn_link",
                    "value" => __( "", "my-text-domain" ),
                    "group"=>"left",
                    "admin_label" => true,
                ),     
                array(
                    "type" => "attach_image",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Map Image", 'psky'),
                    "group"=>"right",
                    "param_name" => "rimg",                   
                  ),      
                                                               
            )
        )
    );
}
add_action( 'vc_before_init', 'app_display' );







/*
 *  ShortCode
 *
 * */
function app_display_fun( $atts, $content = null ) {
    extract( shortcode_atts( array(
        // 'button_text' => '',
        'title'=>'',
        'subtitle'=>'',
        'content1'=>'',
        'btn_link' => '',
        'btn_link'=>'',
        'rimg'=>''
    ), $atts ) );

  //  $content1 = rawurldecode( base64_decode($atts['content1'])); 
    $btn_link = vc_build_link( $btn_link);
    $rimg = wp_get_attachment_image_src( $rimg, 'full');

    ob_start();
    ?>
        <section  id="app_display" class="contact_section  ">            
            <div class="inner  box_width">
                <div class="left">
                    <h3><?php echo $title; ?></h3>
                    <h4><?php echo $subtitle; ?></h4>
                    <div class="content">
                        <?php  echo $content1; ?>
                    </div>
                    <a href="<?php  echo $btn_link['url']; ?>"  class="button" >Discover More</a>
                </div>
                <div class="right">
                    <?php if($rimg[0]){ ?>
                        <img src="<?php echo $rimg[0]; ?>" />
                    <?php } ?>   
                </div>
            </div>
           
        </section>
    <?php
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}
add_shortcode( 'app_display', 'app_display_fun' );
