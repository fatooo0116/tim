<?php
/*   Home Sec4  */
// don't load directly
if (!defined('ABSPATH')) die('-1');



function career_benefit(){
    vc_map(
        array(
            'name'            => __('Career Benefit', 'psky'),
            'base'            => 'career_benefit',
            "category" => array('STRIGHT'),
            'as_parent'               => array('only' => 'career_benefit_item'),
            //  "icon" => plugins_url('../img/slider.png', __FILE__),
            /*
            'content_element' => true,
            'show_settings_on_create' => false,
            "js_view" => 'VcColumnView',
            */
            'content_element' => true,
            'show_settings_on_create' => false,
            "js_view" => 'VcColumnView',
            "params" => array(              

              array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => __("Title"),
                "param_name" => "title",
                "admin_label" => true,                
             ),       

             array(
                "type" => "textarea",
                "holder" => "div",
                "class" => "",
                "heading" => __("Title Text"),
                "param_name" => "subtitle",
                // "admin_label" => true,                
             ),  
                          
            )
        )
    );
}
add_action( 'vc_before_init', 'career_benefit' );







/*
 *  ShortCode
 *
 * */
function career_benefit_fun( $atts, $content = null ) {
    extract( shortcode_atts( array(          
        'title' =>'', 
        'subtitle'=>''
         
    ), $atts ) );

    // $contact = rawurldecode( base64_decode($atts['contact'])); 
    // $ipc_bk_img = wp_get_attachment_image_src( $pc_bk_img, 'full');    
    // $pic = wp_get_attachment_image_src( $bkimg, 'full');
    // $pic  = wp_get_attachment_image( $bkimg, 'full');
    // $pcimg  = wp_get_attachment_image( $pcimg, 'full');
    // $btn_link = vc_build_link( $btn_link);
    // $bkimg1 = wp_get_attachment_image_src( $bkimg1, 'full');    
    // $xlink = vc_build_link( $xlink);
    // $pic = wp_get_attachment_image_src( $bkimg, 'full');
    // $picx = wp_get_attachment_image( $bkimg, 'full');
    // $picmb = wp_get_attachment_image_src( $bkmbimg, 'full');
    // $picmbx = wp_get_attachment_image( $bkmbimg, 'full');


    ob_start();
    ?>

    <div id="career_benefit"  >  
        <div class="inner">    
            <div class="left">
                <h3><?php   echo $title; ?></h3>
                <div class="subtitle">
                        <?php  echo $subtitle; ?>
                </div>
            </div>
            <div class="right"  id="benefit_list">
                <div class="inner" >                        
                        <?php  echo do_shortcode($content);  ?>            
                </div>  
            </div>
        </div>  
    </div>

    <?php
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}
add_shortcode( 'career_benefit', 'career_benefit_fun' );








function career_benefit_item(){
  vc_map(
      array(
          'name'            => __('Career Benefit List', ''),
          'base'            => 'career_benefit_item',
        //  'description'     => __( '分隔區塊', 'eslite' ),
          "category" => array('STRIGHT'),
      //  "icon" => plugins_url('../img/slider.png', __FILE__),
          'as_child'        => array('only' => 'career_benefit'),
          'content_element' => true,
          'params'          => array(

            array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Title", ''),
              "param_name" => "title",
             // "admin_label" => false,
              "value" => array(''),
              // "description" => __("Enter your content.", 'vc_extend')
            ),

            array(
              "type" => "textarea",
              "holder" => "div",
              "class" => "",
              "heading" => __("Content", 'psky'),
              "param_name" => "content1",
              "admin_label" => false,
              "value" => array(''),
              // "description" => __("Enter your content.", 'vc_extend')
            ),            
    
          
          ),
      )
  );
}
add_action( 'vc_before_init', 'career_benefit_item' );




/**
 *  Item ShortCode
 *
 */
function career_benefit_item_fun( $atts, $content = null ){
  extract(
      shortcode_atts(
          array(                
              'title'=>'',      
              'content1'=>'',
            
          ), $atts
      )
  );

  // $cimg = wp_get_attachment_image_src( $cimg, 'full');
 
  // $href = vc_build_link( $mlink);
  ob_start();
  ?>

      <div class="benefit_box">
          <div class="inner">                        
              <h4><?php  echo $title; ?></h4>
              <div class="my_benefit">
                  <?php  echo $content1; ?>
              </div>
          </div>
      </div>

  <?php
  $output = ob_get_contents();
  ob_end_clean();
  return $output;

}
add_shortcode( 'career_benefit_item', 'career_benefit_item_fun' );







// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
if(class_exists('WPBakeryShortCodesContainer')){
  class WPBakeryShortCode_career_benefit extends WPBakeryShortCodesContainer {
  }
}

// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode')){
  class WPBakeryShortCode_career_benefit_item extends WPBakeryShortCode {

  }
}
