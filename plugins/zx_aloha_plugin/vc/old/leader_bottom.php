<?php

// don't load directly
if (!defined('ABSPATH')) die('-1');



function leader_bottom(){
    vc_map(
        array(
            'name'            => __('Leader Bottom', 'psky'),
            'base'            => 'leader_bottom',
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
                "heading" => __( "Privacy Top Title", "my-text-domain" ),
                "param_name" => "p_top_title",
                "value" => __( "", "my-text-domain" ),
              ),

              array(
                "type" => "textarea",
                "class" => "",
                "heading" => __( "Privacy Top Content", "my-text-domain" ),
                "param_name" => "p_top_content",
                "value" => __( "", "my-text-domain" ),
              ),   
              
              array(
                "type" => "attach_image",
                "holder" => "div",
                "class" => "",
                "heading" => __("Right Image", 'psky'),
                "param_name" => "rimg",
                "admin_label" => true,
              ),              
              
              array(
                "type" => "attach_image",
                "holder" => "div",
                "class" => "",
                "heading" => __("Background Image", 'psky'),
                "param_name" => "bkimg",
                "admin_label" => true,
              ),               
              
            )
        )
    );
}
add_action( 'vc_before_init', 'leader_bottom' );







/*
 *  ShortCode
 *
 * */
function leader_bottom_fun( $atts, $content = null ) {
    extract( shortcode_atts( array(
        // 'button_text' => '',
        'p_top_title'=>'',
        'p_top_content'=>'',
        'rimg'=>'',
        'bkimg'=>''
        
    ), $atts ) );

    // $contact = rawurldecode( base64_decode($atts['contact'])); 
    // $href = vc_build_link( $mlink);
    $bkimg = wp_get_attachment_image_src( $bkimg, 'full');
    $rimg = wp_get_attachment_image_src( $rimg, 'full');

    ob_start();
    ?>
      <div id="leadership_bottom">
        <div class="bkimg" style="background-image:url(<?php echo $bkimg[0]; ?>)"></div>
        <div class="inner  box_width  clearfix">

            <div class="left  infobox">
              <h3>More about SFI     <?php  echo $p_top_title; ?></h3>
              <div class="content">Talk about what kinds of people we are hiring,<br/> 
                what characteristics? what knowledge they have? and<br/> how they help
                our client’s to manage? 
                <?php  echo $p_top_content; ?>
              </div>
              <a href="#" class="button more">See More</a>
            </div>

            <div class="right  infobox">
               <h3>aa<?php  echo $p_top_title; ?></h3>
              <div class="content">a1a1
                <?php  echo $p_top_content; ?>
              </div>
              <a href="#" class="button more">See More</a>
            </div>

        </div>        
      </div>
    <?php
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}
add_shortcode( 'leader_bottom', 'leader_bottom_fun' );
