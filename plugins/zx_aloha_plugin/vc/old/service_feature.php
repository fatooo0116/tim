<?php
/*   Home Sec4  */
// don't load directly
if (!defined('ABSPATH')) die('-1');



function service_feature(){
    vc_map(
        array(
            'name'            => __('Service_feature', 'psky'),
            'base'            => 'service_feature',
            "category" => array('STRIGHT'),
            'as_parent'               => array(
                                            'only' => 'service_feature_item, service_feature_item2'                                          
                                          ),
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
                  "heading" => __("Image", 'psky'),
                  "param_name" => "cimg",
                  "admin_label" => true,
                )        
                          
            )
        )
    );
}
add_action( 'vc_before_init', 'service_feature' );







/*
 *  ShortCode
 *
 * */
function service_feature_fun( $atts, $content = null ) {
    extract( shortcode_atts( array(          
        'title' =>'', 
        'cimg'=>''
         
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

    
    $cimg = wp_get_attachment_image_src( $cimg, 'full');

    ob_start();
    ?>

    <div id="service_feature"  >
        <h3><?php   echo $title; ?></h3>
        
        <div class="inner box_width" >                        
            <div class="left">
              <?php if($cimg[0]){ ?>
                <img src="<?php echo $cimg[0]; ?>" />
              <?php } ?>
            </div>
            <div class="right">
              <?php  echo do_shortcode($content);  ?>      
            </div>                      
      	</div>  
    </div>

    <?php
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}
add_shortcode( 'service_feature', 'service_feature_fun' );








function service_feature_item(){
  vc_map(
      array(
          'name'            => __('service_feature Item', ''),
          'base'            => 'service_feature_item',
        //  'description'     => __( '分隔區塊', 'eslite' ),
          "category" => array('STRIGHT'),
      //  "icon" => plugins_url('../img/slider.png', __FILE__),
          'as_child'        => array('only' => 'service_feature'),
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
              "heading" => __("content1", 'psky'),
              "param_name" => "cname",
              "admin_label" => false,
              "value" => array(''),
              // "description" => __("Enter your content.", 'vc_extend')
            )
          
          ),
      )
  );
}
add_action( 'vc_before_init', 'service_feature_item' );




/**
 *  Item ShortCode
 *
 */
function service_feature_item_fun( $atts, $content = null ){
  extract(
      shortcode_atts(
          array(                
              'title'=>'',      
              'cname'=>'',
              
          ), $atts
      )
  );

  $cimg = wp_get_attachment_image_src( $cimg, 'full');
 
  $href = vc_build_link( $mlink);
  ob_start();
  ?>

      <div class="sf_item1">
          <div class="inner">                        
              <div class="title">
                <h3><?php echo $title; ?></h3>
              </div>
              <div class="content">
                <?php echo $cname; ?>
              </div>              
          </div>
      </div>

  <?php
  $output = ob_get_contents();
  ob_end_clean();
  return $output;

}
add_shortcode( 'service_feature_item', 'service_feature_item_fun' );











function service_feature_item2(){
  vc_map(
      array(
          'name'            => __('service_feature Item with Link', ''),
          'base'            => 'service_feature_item2',
        //  'description'     => __( '分隔區塊', 'eslite' ),
          "category" => array('STRIGHT'),
      //  "icon" => plugins_url('../img/slider.png', __FILE__),
          'as_child'        => array('only' => 'service_feature'),
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
              "heading" => __("content1", 'psky'),
              "param_name" => "cname",
              "admin_label" => false,
              "value" => array(''),
              // "description" => __("Enter your content.", 'vc_extend')
            )
          
          ),
      )
  );
}
add_action( 'vc_before_init', 'service_feature_item2' );


/**
 *  Item ShortCode
 *
 */
function service_feature_item2_fun( $atts, $content = null ){
  extract(
      shortcode_atts(
          array(                
              'title'=>'',      
              'cname'=>'',
              
          ), $atts
      )
  );

  $cimg = wp_get_attachment_image_src( $cimg, 'full');
 
  $href = vc_build_link( $mlink);
  ob_start();
  ?>

      <div class="sf_item2">
          <div class="inner">                        
              <div class="title">
                <h3><?php echo $title; ?></h3>
              </div>
              <div class="content">
                <?php echo $cname; ?>
              </div>  
              <a href="#" class="button">Download</a>            
          </div>
      </div>

  <?php
  $output = ob_get_contents();
  ob_end_clean();
  return $output;

}
add_shortcode( 'service_feature_item2', 'service_feature_item2_fun' );









// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
if(class_exists('WPBakeryShortCodesContainer')){
  class WPBakeryShortCode_service_feature extends WPBakeryShortCodesContainer {
  }
}

// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode')){
  class WPBakeryShortCode_service_feature_item extends WPBakeryShortCode {

  }
}
