<?php

// don't load directly
if (!defined('ABSPATH')) die('-1');



function home_testi(){
    vc_map(
        array(
            'name'            => __('Home Testimonial', 'psky'),
            'base'            => 'home_testi',
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
add_action( 'vc_before_init', 'home_testi' );







/*
 *  ShortCode
 *
 * */
function home_testi_fun( $atts, $content = null ) {
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
        <section  id="home_testi" class="contact_section  ">            
            <div class="inner  box_width">
                <h3>近期流言</h3>
                <div class="inner">
                    <article>
                        <header>
                            <div class="name">Andy</div>
                            <div class="date">2012-10-1</div>
                        </header>
                        <div class="star">
                            <span class="st"></span>
                            <span class="st"></span>
                            <span class="st"></span>
                            <span class="st"></span>
                            <span class="st"></span>
                        </div>    
                        <div class="content">
                            謝謝全台貸款中心專業團隊的協助，很快就拿到預期的款項讓我可以整合我的負債，如果有需求一定會再來找你們，真的非常推薦！
                        </div>                        
                    </article>

                    <article>
                        <header>
                            <div class="name">Andy</div>
                            <div class="date">2012-10-1</div>
                        </header>
                        <div class="star">
                            <span class="st"></span>
                            <span class="st"></span>
                            <span class="st"></span>
                            <span class="st"></span>
                            <span class="st"></span>
                        </div>      
                        <div class="content">
                            謝謝全台貸款中心專業團隊的協助，很快就拿到預期的款項讓我可以整合我的負債，如果有需求一定會再來找你們，真的非常推薦！
                        </div>                        
                    </article>                    
                </div>
            </div>
           
        </section>
    <?php
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}
add_shortcode( 'home_testi', 'home_testi_fun' );
