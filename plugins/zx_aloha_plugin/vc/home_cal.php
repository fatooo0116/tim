<?php

// don't load directly
if (!defined('ABSPATH')) die('-1');



function home_cal(){
    vc_map(
        array(
            'name'            => __('Home Cal', 'psky'),
            'base'            => 'home_cal',
            "category" => array('TIM'),
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
                    "heading" => __("Left Image", 'psky'),                   
                    "param_name" => "limg",                   
                  ),      

                                                          
            )
        )
    );
}
add_action( 'vc_before_init', 'home_cal' );







/*
 *  ShortCode
 *
 * */
function home_cal_fun( $atts, $content = null ) {
    extract( shortcode_atts( array(
        // 'button_text' => '',        
        'limg'=>'',
    ), $atts ));
    

  //  $content1 = rawurldecode( base64_decode($atts['content1'])); 
  //  $btn_link = vc_build_link( $btn_link);
    $limg = wp_get_attachment_image_src( $limg, 'full');

    ob_start();
    ?>
        <section  id="home_cal" class="">            
            <div class="inner  ">
                <div class="left"  style="background-image:url(<?php echo $limg[0]; ?>)">                                        
                        <?php  if($limg[0]){ ?>
                            <img src="<?php  echo $limg[0]; ?>" />
                        <?php } ?>                
                </div>
                <div class="right">              
                    <div class="my_form">
                       <h3>貸款試算</h3>
                        <div class="form">
                            <div class="item">
                                <label for="">貸款金額</label>
                                <input type="text"  /><span class="tx">元</span>
                            </div>

                            <div class="item">
                                <label for="">年利率</label>
                                <input type="text"  /><span class="tx">%</span>
                            </div>         
                            
                            <div class="item">
                                <label for="">貸款期數</label>
                                <input type="text"  /><span class="tx">月</span>
                            </div>                    

                            <button class="btn_wht">免費試算</button>                             
                        </div>
                    </div>                    
                </div>
            </div>
           
        </section>
    <?php
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}
add_shortcode( 'home_cal', 'home_cal_fun' );
