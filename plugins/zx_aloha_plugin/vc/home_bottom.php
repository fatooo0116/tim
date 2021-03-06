<?php

// don't load directly
if (!defined('ABSPATH')) die('-1');



function home_bottom(){
    vc_map(
        array(
            'name'            => __('Home Bottom', 'psky'),
            'base'            => 'home_bottom',
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
add_action( 'vc_before_init', 'home_bottom' );







/*
 *  ShortCode
 *
 * */
function home_bottom_fun( $atts, $content = null ) {
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
    ?>
        <section  id="home_bottom" class="contact_section  ">            
            <div class="inner  box_width">
                <div class="left">
                    <div class="ibox">
                        <h3><?php  echo $title; ?></h3>
                        <?php 
                            echo $content1;
                        ?>
                    </div>
                </div>
                <div class="right">
                    <?php if($rimg[0]){ ?>
                        <img src="<?php echo $rimg[0]; ?>" />
                    <?php } ?>   
                    <div class="content2">
                        <?php echo $content2; ?>
                    </div>
                    <a href="<?php echo $$btn_link; ?>"  class="btn   <?php echo $btn_class; ?>">立即預約諮詢</a>
                </div>
            </div>
           
        </section>
    <?php
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}
add_shortcode( 'home_bottom', 'home_bottom_fun' );
