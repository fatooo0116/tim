<?php

// don't load directly
if (!defined('ABSPATH')) die('-1');



function home_contactus(){
    vc_map(
        array(
            'name'            => __('Home Contact Us', 'psky'),
            'base'            => 'home_contactus',
            "category" => array('TIM'),
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
                    "type" => "textarea_raw_html",
                    "class" => "",
                    "heading" => __( "Content", "my-text-domain" ),
                    "param_name" => "content1",
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

                  array(
                    "type" => "textarea",
                    "class" => "",
                    "heading" => __( "Content", "my-text-domain" ),
                    "param_name" => "content2",
                    "value" => __( "", "my-text-domain" ),
                    "group"=>"right",
                    "admin_label" => true,
                ),  

                  array(
                    "type" => "vc_link",
                    "class" => "",
                    "heading" => __( "Button Link", "my-text-domain" ),
                    "param_name" => "btn_link",
                    "value" => __( "", "my-text-domain" ),
                    "group"=>"right",
                    "admin_label" => true,
                ),   
                
                array(
                    "type" => "textfield",
                    "class" => "",
                    "heading" => __( "Button Class", "my-text-domain" ),
                    "param_name" => "btn_class",
                    "value" => __( "", "my-text-domain" ),
                    "group"=>"right",
                    "admin_label" => true,
                ),   
                                                               
            )
        )
    );
}
add_action( 'vc_before_init', 'home_contactus' );







/*
 *  ShortCode
 *
 * */
function home_contactus_fun( $atts, $content = null ) {
    extract( shortcode_atts( array(
        // 'button_text' => '',
        'title'=>'',
        'content1'=>'',
        
        'rimg'=>'',
        'content2'=>'',
        'btn_link'=>'',
        'btn_class'=>''
    ), $atts ) );

    $content1 = rawurldecode( base64_decode($atts['content1'])); 
    $btn_link = vc_build_link( $btn_link);
    $rimg = wp_get_attachment_image_src( $rimg, 'full');

    ob_start();

    global $post;

    ?>
        <section  id="home_contactus" class="contact_section  ">            
            <div class="inner  ">            
                <?php  
    
                    echo  do_shortcode('[contact-form-7 id="39" title="聯絡表單 1"]');
                    if ( comments_open() || get_comments_number() ) :
                       // comments_template();
                    endif;
                    
                    ?>
            </div>    
        </section>
    <?php
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}
add_shortcode( 'home_contactus', 'home_contactus_fun' );
