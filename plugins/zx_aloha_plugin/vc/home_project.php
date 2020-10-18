<?php
/*   Home Sec4  */
// don't load directly
if (!defined('ABSPATH')) die('-1');



function home_project(){
    vc_map(
        array(
            'name'            => __('Home Project', 'psky'),
            'base'            => 'home_project',
            "category" => array('TIM'),
            'as_parent'               => array('only' => 'home_project_item'),
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
                          
            )
        )
    );
}
add_action( 'vc_before_init', 'home_project' );







/*
 *  ShortCode
 *
 * */
function home_project_fun( $atts, $content = null ) {
    extract( shortcode_atts( array(          
        'title' =>'', 
        
         
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

    <div id="home_project"  class="<?php echo $box_style; ?>">
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
add_shortcode( 'home_project', 'home_project_fun' );








function home_project_item(){
  vc_map(
      array(
          'name'            => __('home_project Item', ''),
          'base'            => 'home_project_item',
        //  'description'     => __( '分隔區塊', 'eslite' ),
          "category" => array('STRIGHT'),
      //  "icon" => plugins_url('../img/slider.png', __FILE__),
          'as_child'        => array('only' => 'home_project'),
          'content_element' => true,
          'params'          => array(


            array(
                "type" => "attach_image",
                "holder" => "div",
                "class" => "",
                "heading" => __("Image", 'psky'),
                "param_name" => "cimg",
                "admin_label" => true,
            ),


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
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => __("Title2", ''),
                "param_name" => "title2",
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


            array(
                "type" => "textarea",
                "holder" => "div",
                "class" => "",
                "heading" => __("Content 2", 'psky'),
                "param_name" => "content2",
                "admin_label" => false,
                "value" => array(''),
                // "description" => __("Enter your content.", 'vc_extend')
            ),  

      
 
          
          ),
      )
  );
}
add_action( 'vc_before_init', 'home_project_item' );




/**
 *  Item ShortCode
 *
 */
function home_project_item_fun( $atts, $content = null ){
  extract(
      shortcode_atts(
          array(                
              'title'=>'',      
              'title2'=>'',      
              'content1'=>'',
              'content2'=>'',              
              'cimg'=>''
          ), $atts
      )
  );

  $cimg = wp_get_attachment_image_src( $cimg, 'full');
 
  // $href = vc_build_link( $mlink);
  ob_start();
  ?>

      <div class="leader_box">
          <div class="inner">                        
              <div class="pic">                
                <?php  if($cimg[0]){ ?>
                  <img src="<?php echo $cimg[0]; ?>" />
                <?php } ?>
              </div>
              <div class="desc">
                <div class="header">
                    <h3><?php echo $title; ?></h3>
                    <div class="title2"><?php echo $title2; ?></div>
                </div>
                <div class="t1"><?php echo $content1; ?></div>
                <span class="t2"><?php echo $content2; ?></span>
              </div>                                            
          </div>
      </div>

  <?php
  $output = ob_get_contents();
  ob_end_clean();
  return $output;

}
add_shortcode( 'home_project_item', 'home_project_item_fun' );







// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
if(class_exists('WPBakeryShortCodesContainer')){
  class WPBakeryShortCode_home_project extends WPBakeryShortCodesContainer {
  }
}

// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode')){
  class WPBakeryShortCode_home_project_item extends WPBakeryShortCode {

  }
}
