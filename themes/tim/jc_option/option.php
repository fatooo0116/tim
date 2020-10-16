<?php


add_action('admin_menu', 'baw_create_menu2');

function baw_create_menu2() {

    //create new top-level menu
    add_menu_page('Theme Settings', 'Theme Settings', 'administrator', 'xee.php', 'ruibian_settings_page');

    //call register settings function
    add_action( 'admin_init', 'register_mysettings2' );
}




function register_mysettings2() {
  //  register_setting( 'ruibian-settings-group', 'ddg_option_banner_open1' );
  //  register_setting( 'ruibian-settings-group', 'ddg_option_video' );

  //  register_setting( 'ruibian-settings-group', 'ddg_option_blog' );

    register_setting( 'ruibian-settings-group', 'ddg_option_fb' );  
    register_setting( 'ruibian-settings-group', 'ddg_option_ttw' ); 
    register_setting( 'ruibian-settings-group', 'ddg_option_ig' ); 
    // register_setting( 'ruibian-settings-group', 'ddg_option_line' );
    // register_setting( 'ruibian-settings-group', 'ddg_option_youtube' );
    // register_setting( 'ruibian-settings-group', 'ddg_option_linkedin' );

    register_setting( 'ruibian-settings-group', 'ddg_header_logo');
    register_setting( 'ruibian-settings-group', 'ddg_header_jscode');
    register_setting( 'ruibian-settings-group', 'blog_archive_header');
    register_setting( 'ruibian-settings-group', 'blog_archive_header_mobile');
    register_setting( 'ruibian-settings-group', 'footer_logo');
    register_setting( 'ruibian-settings-group', 'favicon_logo');

    register_setting( 'ruibian-settings-group', 'ddg_header_hbanner');


}

function ruibian_settings_page() {
  wp_enqueue_script('thickbox');
//   wp_register_script('my-upload', WP_PLUGIN_URL.'/my-script.js', array('jquery','media-upload','thickbox'));
  wp_enqueue_media();
  wp_enqueue_script('media-upload');

    ?>
  <style>
  #app #menu_container {
    background: #fff;
    border-left: 1px solid #d8d8d8;
    padding: 0px 15px;
    max-width: 900px;
  }
  #app #menu_container h1{
    margin: 0.67em 0;
    font-size:26px;
  }
  #app #menu_container{
      font-size: 14px;
      line-height: 1.7em;
  }
  #app #menu_container input[type="text"],
  #app #menu_container textarea{
    width: 80%;
    padding: 5px;
  }

  </style>
  <script>


      jQuery(document).ready(function($){
          var _custom_media = true,
              _orig_send_attachment = wp.media.editor.send.attachment;

          $('._unique_name_button').click(function(e) {
              var send_attachment_bkp = wp.media.editor.send.attachment;
              var button = $(this);
              var id = button.attr('id').replace('_button', '');
              _custom_media = true;
              wp.media.editor.send.attachment = function(props, attachment){
                  if ( _custom_media ) {
                      $("#"+id).val(attachment.url);
                  } else {
                      return _orig_send_attachment.apply( this, [props, attachment] );
                  };
              }

              wp.media.editor.open(button);
              return false;
          });

          $('.add_media2').on('click', function(){
              _custom_media = false;
          });


          $('._unique_name_button2').click(function(e) {
              var send_attachment_bkp = wp.media.editor.send.attachment;
              var button = $(this);
              var id = button.attr('id').replace('_button', '');
              _custom_media = true;
              wp.media.editor.send.attachment = function(props, attachment){
                  if ( _custom_media ) {
                      $("#"+id).val(attachment.url);
                  } else {
                      return _orig_send_attachment.apply( this, [props, attachment] );
                  };
              }
              wp.media.editor.open(button);
              return false;
          });
      });

  </script>
    <div class="wrap">
        <div id="app" class="container">
            <div class="row">
                <div id="menu_container" class=" col-xs-12 ">
                    <ul>
                        <li>
                            <form method="post" action="options.php"  style="padding: 0 20px;">
                                <?php settings_fields( 'ruibian-settings-group' ); ?>
                                <?php do_settings_sections( 'ruibian-settings-group' ); ?>
                                <div>
                                    <div class="page-header"  style="border-bottom: 1px solid #ddd;padding:20px 0px;margin:0;">
                                        <h1>SNS Setting </h1>
                                    </div>
                                </div>
                                <table class="form-table">


                                    <tr valign="top">
                                        <th scope="row">Facebook</th>
                                        <td>
                                            <?php
                                                $optionfb = get_option('ddg_option_fb');
                                            ?>
                                            <input  type="text"  name="ddg_option_fb"    value="<?php echo $optionfb; ?>" >
                                        </td>
                                    </tr>


                                    <tr valign="top">
                                        <th scope="row">Twitter</th>
                                        <td>
                                            <?php
                                                $optiontw = get_option('ddg_option_ttw');
                                            ?>
                                            <input type="text"   name="ddg_option_ttw"    value="<?php echo $optiontw; ?>"  >
                                        </td>
                                    </tr>


                                    <tr valign="top">
                                        <th scope="row">Instagram</th>
                                        <td>
                                            <?php
                                                $optionig = get_option('ddg_option_ig');
                                            ?>
                                            <input type="text"   name="ddg_option_ig"    value="<?php echo $optionig; ?>"  >
                                        </td>
                                    </tr>                                    






                                    <tr valign="top"  class="uploader" >
                                        <th scope="row">Website Logo</th>
                                        <td>
                                            <input id="_unique_name" class="form-control" name="ddg_header_logo" type="text" value="<?php echo esc_attr( get_option('ddg_header_logo') ); ?>"/><br/>
                                            <input id="_unique_name_button" class="button _unique_name_button" name="_unique_name_button" type="text" value="Upload" />
                                        </td>
                                    </tr>

                                    <tr valign="top"  class="uploader" >
                                        <th scope="row">GA , Heap Tracking JS</th>
                                        <td>
                                            <?php
                                                $ddg_header_jscode = get_option('ddg_header_jscode');
                                            ?>
                                            <textarea name="ddg_header_jscode" id="" cols="30" rows="10"><?php echo  $ddg_header_jscode; ?></textarea>
                                        </td>
				    </tr>
                                   <tr valign="top"  class="uploader" >
                                        <th scope="row">HomePage Banner</th>
                                        <td>
                                            <?php
                                                $ddg_header_hbanner = get_option('ddg_header_hbanner');
                                            ?>
                                            <textarea name="ddg_header_hbanner" id="" cols="30" rows="10"><?php echo  $ddg_header_hbanner; ?></textarea>
                                        </td>
                                    </tr>      

                                </table>

                                <hr/ >

                                <table class="form-table">
                                    <tr valign="top"  class="uploader" >
                                        <th scope="row">Archive Blog Header Image</th>
                                        <td>
                                            <input id="_unique_name2" class="form-control" name="blog_archive_header" type="text" value="<?php echo esc_attr( get_option('blog_archive_header') ); ?>"/><br/>
                                            <input id="_unique_name2_button" class="button _unique_name_button" name="_unique_name_button" type="text" value="Upload" />
                                        </td>
                                    </tr>
                                </table>

                                <table class="form-table">
                                    <tr valign="top"  class="uploader" >
                                        <th scope="row">Archive Blog Header Image</th>
                                        <td>
                                            <input id="_unique_name4" class="form-control" name="blog_archive_header_mobile" type="text" value="<?php echo esc_attr( get_option('blog_archive_header_mobile') ); ?>"/><br/>
                                            <input id="_unique_name4_button" class="button _unique_name_button" name="_unique_name_button" type="text" value="Upload" />
                                        </td>
                                    </tr>
                                </table>

                                
                                <table class="form-table">
                                    <tr valign="top"  class="uploader" >
                                        <th scope="row">Footer Logo Image</th>
                                        <td>
                                            <input id="_unique_name3" class="form-control" name="footer_logo" type="text" value="<?php echo esc_attr( get_option('footer_logo') ); ?>"/><br/>
                                            <input id="_unique_name3_button" class="button _unique_name_button" name="_unique_name_button" type="text" value="Upload" />
                                        </td>
                                    </tr>
                                </table>

                                <table class="form-table">
                                    <tr valign="top"  class="uploader" >
                                        <th scope="row">Favicon</th>
                                        <td>
                                            <input id="_unique_name5" class="form-control" name="favicon_logo" type="text" value="<?php echo esc_attr( get_option('favicon_logo') ); ?>"/><br/>
                                            <input id="_unique_name5_button" class="button _unique_name_button" name="_unique_name_button" type="text" value="Upload" />
                                        </td>
                                    </tr>
                                </table>

		


                                <?php submit_button(); ?>

                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>



<!--
    <script src="http://localhost:35729/livereload.js"></script>
    -->

<?php } ?>
