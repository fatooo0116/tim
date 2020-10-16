<?php

// don't load directly
if (!defined('ABSPATH')) die('-1');



function career_sec1(){
    vc_map(
        array(
            'name'            => __('Career Section1', 'psky'),
            'base'            => 'career_sec1',
            "category" => array('STRIGHT'),
            //  "icon" => plugins_url('../img/slider.png', __FILE__),
            /*
            'content_element' => true,
            'show_settings_on_create' => false,
            "js_view" => 'VcColumnView',
            */
            "params" => array(              

                array(
                    "type" => "attach_image",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Image", 'psky'),
                    "param_name" => "img1",
                    "admin_label" => true,
                    "group" => "top"
                  ),  
                array(
                    "type" => "textfield",
                    "class" => "",
                    "heading" => __( "Title", "my-text-domain" ),
                    "param_name" => "title1",
                    "value" => __( "", "my-text-domain" ),
                    "admin_label" => true,
                    "group" => "top"
                ),      
                array(
                    "type" => "textarea",
                    "class" => "",
                    "heading" => __( "Content", "my-text-domain" ),
                    "param_name" => "content1",
                    "value" => __( "", "my-text-domain" ),
                    "admin_label" => true,
                    "group" => "top"
                ),     
                


                array(
                    "type" => "attach_image",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Image", 'psky'),
                    "param_name" => "img21",
                    "admin_label" => true,
                    "group" => "Box1"
                  ),                 
                array(
                    "type" => "textfield",
                    "class" => "",
                    "heading" => __( "Title", "my-text-domain" ),
                    "param_name" => "title21",
                    "value" => __( "", "my-text-domain" ),
                    "admin_label" => true,
                    "group" => "Box1"
                ),      
                array(
                    "type" => "textarea",
                    "class" => "",
                    "heading" => __( "Content", "my-text-domain" ),
                    "param_name" => "content21",
                    "value" => __( "", "my-text-domain" ),
                    "admin_label" => true,
                    "group" => "Box1"
                ),




                array(
                    "type" => "attach_image",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Image", 'psky'),
                    "param_name" => "img22",
                    "admin_label" => true,
                    "group" => "Box2"
                  ),                 
                array(
                    "type" => "textfield",
                    "class" => "",
                    "heading" => __( "Title", "my-text-domain" ),
                    "param_name" => "title22",
                    "value" => __( "", "my-text-domain" ),
                    "admin_label" => true,
                    "group" => "Box2"
                ),      
                array(
                    "type" => "textarea",
                    "class" => "",
                    "heading" => __( "Content", "my-text-domain" ),
                    "param_name" => "content22",
                    "value" => __( "", "my-text-domain" ),
                    "admin_label" => true,
                    "group" => "Box2"
                ),
                



                array(
                    "type" => "attach_image",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Image", 'psky'),
                    "param_name" => "img23",
                    "admin_label" => true,
                    "group" => "Box3"
                  ),                 
                array(
                    "type" => "textfield",
                    "class" => "",
                    "heading" => __( "Title", "my-text-domain" ),
                    "param_name" => "title23",
                    "value" => __( "", "my-text-domain" ),
                    "admin_label" => true,
                    "group" => "Box3"
                ),      
                array(
                    "type" => "textarea",
                    "class" => "",
                    "heading" => __( "Content", "my-text-domain" ),
                    "param_name" => "content23",
                    "value" => __( "", "my-text-domain" ),
                    "admin_label" => true,
                    "group" => "Box3"
                ),                
                                                               
            )
        )
    );
}
add_action( 'vc_before_init', 'career_sec1' );







/*
 *  ShortCode
 *
 * */
function career_sec1_fun( $atts, $content = null ) {
    extract( shortcode_atts( array(
        // 'button_text' => '',
        'img1'=>'',
        'title1'=>'',
        'content1'=>'',

        'img21'=>'',
        'title21'=>'',
        'content21'=>'',


        'img22'=>'',
        'title22'=>'',
        'content22'=>'',

        'img23'=>'',
        'title23'=>'',
        'content23'=>'',        
    ), $atts ) );

    
    $img1  = wp_get_attachment_image_src( $img1, 'full');

    $img21  = wp_get_attachment_image_src( $img21, 'full');
    $img22  = wp_get_attachment_image_src( $img22, 'full');
    $img23  = wp_get_attachment_image_src( $img23, 'full');

    $href = vc_build_link( $mlink);

    ob_start();
    ?>
        <?php if($title1){ ?>
        <section id="career_sec1_layer1">
            <div class="box_width inner  <?php if(!$img1[0]){ echo "text_center"; } ?>">
                
                    <?php if($img1[0]){ ?>
                        <div class="pic">
                            <img src="<?php  echo $img1[0]; ?>" />
                        </div>
                    <?php } ?>
                
                <div class="text">
                    <h3><?php echo $title1; ?></h3>
                    <div class="content"><?php echo $content1; ?></div>
                </div>
            </div>
        </section>
        <?php } ?>
        
        <section id="career_sec1_box3">
            <div class="box_width inner">
                <?php if($img21[0]){ ?>
                    <div class="infobox">
                        <div class="pic">
                            <img src="<?php  echo $img21[0]; ?>" />
                        </div>
                        <div class="text">
                            <h3><?php echo $title21; ?></h3>
                            <div class="content"><?php echo $content21; ?></div>
                        </div>
                    </div>
                <?php } ?>

                <?php if($img22[0]){ ?>
                    <div class="infobox">
                        <div class="pic">
                            <img src="<?php  echo $img22[0]; ?>" />
                        </div>
                        <div class="text">
                            <h3><?php echo $title22; ?></h3>
                            <div class="content"><?php echo $content22; ?></div>
                        </div>
                    </div>
                <?php } ?>
                
                <?php if($img23[0]){ ?>
                    <div class="infobox">
                        <div class="pic">
                            <img src="<?php  echo $img23[0]; ?>" />
                        </div>
                        <div class="text">
                            <h3><?php echo $title23; ?></h3>
                            <div class="content"><?php echo $content23; ?></div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </section>
    <?php
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}
add_shortcode( 'career_sec1', 'career_sec1_fun' );
