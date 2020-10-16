<?php
/*   Home Sec4  */
// don't load directly
if (!defined('ABSPATH')) die('-1');


function ribbon(){
    vc_map(
        array(
            'name'            => __('ribbon', 'psky'),
            'base'            => 'ribbon',
            "category" => array('STRIGHT'),
            'as_parent'               => array('only' => 'ribbon_item'),
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
                "heading" => __("Content"),
                "param_name" => "content1",
                "admin_label" => true,                
             ),  
                          
            )
        )
    );
}
add_action( 'vc_before_init', 'ribbon' );







/*
 *  ShortCode
 *
 * */
function ribbon_fun( $atts, $content = null ) {
    extract( shortcode_atts( array(          
        'title' =>'', 
        'content1'=>''
         
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

    <div id="ribbon"  class="">
        <div class="top_sec">
            <h3><?php   echo $title; ?></h3>
            <div class="contenet">
                <?php  echo $content1; ?>
            </div>
        </div>
        <div class="inner  logos" >                        
                <?php  echo do_shortcode($content);  ?>            
      	</div>  
    </div>

    <?php
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}
add_shortcode( 'ribbon', 'ribbon_fun' );








function ribbon_item(){
  vc_map(
      array(
          'name'            => __('ribbon Item', ''),
          'base'            => 'ribbon_item',
        //  'description'     => __( '分隔區塊', 'eslite' ),
          "category" => array('STRIGHT'),
      //  "icon" => plugins_url('../img/slider.png', __FILE__),
          'as_child'        => array('only' => 'ribbon'),
          'content_element' => true,
          'params'          => array(

            array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Introduction", ''),
              "param_name" => "seo_title",
             // "admin_label" => false,
              "value" => array(''),
              // "description" => __("Enter your content.", 'vc_extend')
            ),

           


            array(
              "type" => "vc_link",
              "holder" => "div",
              "class" => "",
              "heading" => __("Img Link", 'psky'),
              "param_name" => "img_link",
              "admin_label" => false,
              "value" => array(''),
              // "description" => __("Enter your content.", 'vc_extend')
          ),
  
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
add_action( 'vc_before_init', 'ribbon_item' );




/**
 *  Item ShortCode
 *
 */
function ribbon_item_fun( $atts, $content = null ){
  extract(
      shortcode_atts(
          array(                
              'seo_title'=>'',      
              'img_link'=>'',              
              'cimg'=>'',                          
          ), $atts
      )
  );

  $cimg = wp_get_attachment_image_src( $cimg, 'full'); 
  $href = vc_build_link( $img_link);

  ob_start();
  ?>

      <div class="leader_box">
        <?php  if($cimg[0]){ ?>
            <a href="<?php echo $href['url']; ?>" title="<?php  echo $seo_title; ?>" >
                <img src="<?php echo $cimg[0]; ?>"  alt="<?php  echo $seo_title; ?>" />
            </a>
        <?php } ?>
      </div>

  <?php
  $output = ob_get_contents();
  ob_end_clean();
  return $output;
}
add_shortcode( 'ribbon_item', 'ribbon_item_fun' );







// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
if(class_exists('WPBakeryShortCodesContainer')){
  class WPBakeryShortCode_ribbon extends WPBakeryShortCodesContainer {
  }
}

// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode')){
  class WPBakeryShortCode_ribbon_item extends WPBakeryShortCode {

  }
}
