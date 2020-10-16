<?php

// don't load directly
if (!defined('ABSPATH')) die('-1');



function privacy_top(){
    vc_map(
        array(
            'name'            => __('Privacy Top', 'psky'),
            'base'            => 'privacy_top',
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
                "heading" => __("Privacy Right Image", 'psky'),
                "param_name" => "rimg",
                "admin_label" => true,
              ),              
                                                       
            )
        )
    );
}
add_action( 'vc_before_init', 'privacy_top' );







/*
 *  ShortCode
 *
 * */
function privacy_top_fun( $atts, $content = null ) {
    extract( shortcode_atts( array(
        // 'button_text' => '',
        'p_top_title'=>'',
        'p_top_content'=>'',
        'rimg'=>''
        
    ), $atts ) );

    // $contact = rawurldecode( base64_decode($atts['contact'])); 
    // $href = vc_build_link( $mlink);
   
    $rimg = wp_get_attachment_image_src( $rimg, 'full');

    ob_start();
    ?>
      <div id="privacy_top">
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
add_shortcode( 'privacy_top', 'privacy_top_fun' );
