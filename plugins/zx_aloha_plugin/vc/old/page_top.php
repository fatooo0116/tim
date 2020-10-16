<?php

// don't load directly
if (!defined('ABSPATH')) die('-1');



function page_top(){
    vc_map(
        array(
            'name'            => __('Page Top', 'psky'),
            'base'            => 'page_top',
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
add_action( 'vc_before_init', 'page_top' );







/*
 *  ShortCode
 *
 * */
function page_top_fun( $atts, $content = null ) {
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
      <div id="page_top">
        <div class="bkimg" style="background-image:url(<?php echo $bkimg[0]; ?>)"></div>
        <div class="inner  box_width">
            <div class="left">
              <h3><?php  echo $p_top_title; ?></h3>
              <div class="content">
                <?php  echo $p_top_content; ?>
              </div>
            </div>
            <div class="right">
                <?php  if($rimg){  ?>
                  <img src="<?php echo $rimg[0]; ?>" />
                <?php } ?>
            </div>
        </div>        
      </div>
    <?php
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}
add_shortcode( 'page_top', 'page_top_fun' );
