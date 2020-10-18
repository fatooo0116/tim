<?php
/*   Home Sec4  */
// don't load directly
if (!defined('ABSPATH')) die('-1');



function home_line(){
    vc_map(
        array(
            'name'            => __('Home Project', 'psky'),
            'base'            => 'home_line',
            "category" => array('TIM'),
            'as_parent'               => array('only' => 'home_line_item'),
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
                "type" => "attach_image",
                "holder" => "div",
                "class" => "",
                "heading" => __("Background Image", 'psky'),
                "param_name" => "bkimg",
                "admin_label" => true,
              )
                          
            )
        )
    );
}
add_action( 'vc_before_init', 'home_line' );







/*
 *  ShortCode
 *
 * */
function home_line_fun( $atts, $content = null ) {
    extract( shortcode_atts( array(          
        'title' =>'',        
         'bkimg'=>''
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
    $bkimg = wp_get_attachment_image_src( $bkimg, 'full');

    ob_start();
    ?>

    <div id="home_line"  class="<?php echo $box_style; ?>"  style="background-image:url(<?php echo $bkimg[0]; ?>)">
        <h3><?php   echo $title; ?></h3>
        <div class="inner" > 
          <div class="slider">
            <?php  echo do_shortcode($content);  ?>  
          </div>                       
                          
      	</div>  
    </div>

    <?php
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}
add_shortcode( 'home_line', 'home_line_fun' );








function home_line_item(){
  vc_map(
      array(
          'name'            => __('home_line Item', ''),
          'base'            => 'home_line_item',
        //  'description'     => __( '分隔區塊', 'eslite' ),
          "category" => array('STRIGHT'),
      //  "icon" => plugins_url('../img/slider.png', __FILE__),
          'as_child'        => array('only' => 'home_line'),
          'content_element' => true,
          'params'          => array(

    
  
          array(
            "type" => "attach_image",
            "holder" => "div",
            "class" => "",
            "heading" => __("Image", 'psky'),
            "param_name" => "cimg",
            "admin_label" => true,
          )
      
 
          
          ),
      )
  );
}
add_action( 'vc_before_init', 'home_line_item' );




/**
 *  Item ShortCode
 *
 */
function home_line_item_fun( $atts, $content = null ){
  extract(
      shortcode_atts(
          array(                
              'cimg'=>'',
          ), $atts
      )
  );

  $cimg = wp_get_attachment_image_src( $cimg, 'full');
 
  $href = vc_build_link( $mlink);
  ob_start();
  ?>

      <div class="line_box">
                <?php  if($cimg[0]){ ?>
                  <img src="<?php echo $cimg[0]; ?>" />
                <?php } ?>
      </div>

  <?php
  $output = ob_get_contents();
  ob_end_clean();
  return $output;

}
add_shortcode( 'home_line_item', 'home_line_item_fun' );







// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
if(class_exists('WPBakeryShortCodesContainer')){
  class WPBakeryShortCode_home_line extends WPBakeryShortCodesContainer {
  }
}

// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode')){
  class WPBakeryShortCode_home_line_item extends WPBakeryShortCode {

  }
}
