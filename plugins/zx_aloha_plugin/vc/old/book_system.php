<?php

// don't load directly
if (!defined('ABSPATH')) die('-1');



function book_system(){
    vc_map(
        array(
            'name'            => __('Book System', 'psky'),
            'base'            => 'book_system',
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
                   
                    "admin_label" => true,
                ),  

                array(
                    "type" => "textarea",
                    "class" => "",
                    "heading" => __( "Title Text", "my-text-domain" ),
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
                    "type" => "attach_image",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Map Image", 'psky'),
                    
                    "param_name" => "rimg",                   
                  ),      
                                                               
            )
        )
    );
}
add_action( 'vc_before_init', 'book_system' );







/*
 *  ShortCode
 *
 * */
function book_system_fun( $atts, $content = null ) {
    extract( shortcode_atts( array(
        // 'button_text' => '',
        'title'=>'',
        'subtitle'=>'',
        'content1'=>'',
       
        
        'rimg'=>''
    ), $atts ) );

  //  $content1 = rawurldecode( base64_decode($atts['content1'])); 
    $btn_link = vc_build_link( $btn_link);
    $rimg = wp_get_attachment_image_src( $rimg, 'full');

    ob_start();
    ?>
        <section  id="book_system" class="contact_section  ">            
            <div class="inner  box_width">
                <div class="top">
                    <h3><?php echo $title; ?></h3>
                    <h4><?php echo $subtitle; ?></h4>
                    <div class="content">
                        <?php  echo $content1; ?>
                    </div>
                    
                </div>
                <div class="bottom">
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
add_shortcode( 'book_system', 'book_system_fun' );
