<?php
/*   Home Sec4  */
// don't load directly
if (!defined('ABSPATH')) die('-1');



function leadership(){
    vc_map(
        array(
            'name'            => __('Leadership', 'psky'),
            'base'            => 'leadership',
            "category" => array('STRIGHT'),
            'as_parent'               => array('only' => 'leadership_item'),
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
              'type'        => 'dropdown',
              'heading'     => __('Style'),
              'param_name'  => 'box_style',
              'admin_label' => true,
              'value'       => array(
                'Light Blue'   => 'b1',
                'Dark Blue'   => 'b2',              
              ),
              'std'         => 'two', // Your default value
              'description' => __('The description')
              )
                          
            )
        )
    );
}
add_action( 'vc_before_init', 'leadership' );







/*
 *  ShortCode
 *
 * */
function leadership_fun( $atts, $content = null ) {
    extract( shortcode_atts( array(          
        'title' =>'', 
        'box_style'=>'b1'
         
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

    <div id="leadership"  class="<?php echo $box_style; ?>">
        <h3><?php   echo $title; ?></h3>
        <div class="inner" >                        
                <?php  echo do_shortcode($content);  ?>            
      	</div>  
    </div>

    <?php
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}
add_shortcode( 'leadership', 'leadership_fun' );








function leadership_item(){
  vc_map(
      array(
          'name'            => __('Leadership Item', ''),
          'base'            => 'leadership_item',
        //  'description'     => __( '分隔區塊', 'eslite' ),
          "category" => array('STRIGHT'),
      //  "icon" => plugins_url('../img/slider.png', __FILE__),
          'as_child'        => array('only' => 'leadership'),
          'content_element' => true,
          'params'          => array(

            array(
              "type" => "textarea",
              "holder" => "div",
              "class" => "",
              "heading" => __("Introduction", ''),
              "param_name" => "intro_text",
             // "admin_label" => false,
              "value" => array(''),
              // "description" => __("Enter your content.", 'vc_extend')
            ),

            array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Name", 'psky'),
              "param_name" => "cname",
              "admin_label" => false,
              "value" => array(''),
              // "description" => __("Enter your content.", 'vc_extend')
            ),            


            array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Position", 'psky'),
              "param_name" => "cposition",
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
add_action( 'vc_before_init', 'leadership_item' );




/**
 *  Item ShortCode
 *
 */
function leadership_item_fun( $atts, $content = null ){
  extract(
      shortcode_atts(
          array(                
              'intro_text'=>'',      
              'cname'=>'',
              'cposition'=>'',
              'cimg'=>'',
              'box_style'=>''
              
          ), $atts
      )
  );

  $cimg = wp_get_attachment_image_src( $cimg, 'full');
 
  $href = vc_build_link( $mlink);
  ob_start();
  ?>

      <div class="leader_box">
          <div class="inner">                        
              <div class="pic">
                <div class="mask_text"><?php echo $intro_text;; ?></div>
                <?php  if($cimg[0]){ ?>
                  <img src="<?php echo $cimg[0]; ?>" />
                <?php } ?>
              </div>
              <h3>
                <div class="name"><?php echo $cname; ?></div>
                <span class="position"><?php echo $cposition; ?></span>
              </h3>
          </div>
      </div>

  <?php
  $output = ob_get_contents();
  ob_end_clean();
  return $output;

}
add_shortcode( 'leadership_item', 'leadership_item_fun' );







// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
if(class_exists('WPBakeryShortCodesContainer')){
  class WPBakeryShortCode_leadership extends WPBakeryShortCodesContainer {
  }
}

// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode')){
  class WPBakeryShortCode_leadership_item extends WPBakeryShortCode {

  }
}
