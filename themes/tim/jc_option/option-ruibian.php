<?php
function my_admin_scripts2() {

    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_register_script('my-upload', WP_PLUGIN_URL.'/my-script.js', array('jquery','media-upload','thickbox'));

}

function my_admin_styles2() {
    wp_enqueue_style('thickbox');
}

// better use get_current_screen(); or the global $current_screen
    add_action('admin_print_scripts', 'my_admin_scripts2');
    add_action('admin_print_styles', 'my_admin_styles2');



add_action('admin_menu', 'baw_create_menu2');

function baw_create_menu2() {

    //create new top-level menu
    //add_menu_page('Theme Settings1', 'Theme Settings1', 'administrator', 'xee.php', 'ruibian_settings_page','http://www.ddg.com.tw/wp-content/uploads/2015/06/ddg1.png');

    add_submenu_page ( 'xoption.php', "xtheme_setting", "RuiBian Banner", 'administrator', 'ruibian_option.php', 'ruibian_settings_page');

    //call register settings function
    add_action( 'admin_init', 'register_mysettings2' );
}





function register_mysettings2() {
    register_setting( 'ruibian-settings-group', 'ddg_option_banner_open1' );
    register_setting( 'ruibian-settings-group', 'ddg_option_banner1' );
    register_setting( 'ruibian-settings-group', 'ddg_option_banner_link' );
    register_setting( 'ruibian-settings-group', 'ddg_option_text2' );
    register_setting( 'ruibian-settings-group', 'ddg_option_textarea1' );
}

function ruibian_settings_page() {

    echo '<script type="text/javascript" src="'.get_template_directory_uri().'/js/jquery-1.11.3.min.js"></script>';
    echo '<script type="text/javascript" src="'.get_template_directory_uri().'/js/option.js"></script>';

    ?>
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.11.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap-switch.min.js"></script>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css">
    <!-- Latest compiled and minified JavaScript -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/admin.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap-switch.min.css">

    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/ckeditor/ckeditor.js"></script>
    <script>
        (function($){
            $(document).ready(function(){
                var config = {};
               // app.ckedit = CKEDITOR.appendTo( 'content_text', config,"");
                CKEDITOR.replace( 'content_text' );
            });
        })(jQuery);

    </script>
    <div class="wrap">
        <div id="app" class="container">
            <div class="row">
                <div id="menu_container" class=" col-xs-12 ">
                    <ul>
                        <li>
                            <form method="post" action="options.php">
                                <?php settings_fields( 'ruibian-settings-group' ); ?>
                                <?php do_settings_sections( 'ruibian-settings-group' ); ?>
                                <div>
                                    <div class="page-header"  style="border-bottom: 1px solid #ddd;">
                                        <h1><img src="<?php echo get_template_directory_uri(); ?>/wdr_include/icon_option.png"> RuiBian Banner Setting </h1>
                                    </div>
                                </div>
                                <table class="form-table">




                                    <?php

                                    add_option( 'ddg_option_banner_open1', '255', '', 'yes' );

                                    if(esc_attr( get_option('ddg_option_banner_open1'))=="on"){
                                        $switch = "checked";
                                    }else{
                                        $switch = "";
                                    };

                                      //echo $_POST["ddg_option_banner_open"];
                                    ?>




                                    <tr valign="top">
                                        <th scope="row">RuiBian Banner 開關</th>
                                        <td><input type="checkbox" class="my-checkbox  switch"  data-size="small"  name="ddg_option_banner_open1"  <?php echo $switch; ?> ></td>
                                    </tr>

                                    <tr valign="top">
                                        <th scope="row">RuiBian Banner 圖片</th>
                                        <td>

                                            <input type="text" name="ddg_option_banner1" id="sueprbanner" value="<?php echo esc_attr( get_option('ddg_option_banner1') ); ?>" />
                                            <input class="upload_image_button button" type="button" value="Upload Image" target="#sueprbanner" />
                                        </td>
                                    </tr>

                                    <tr valign="top">
                                        <th scope="row">RuiBian Banner Link</th>
                                        <td>
                                            <input type="text" name="ddg_option_banner_link"   value="<?php echo esc_attr( get_option('ddg_option_banner_link') ); ?>" />
                                        </td>
                                    </tr>

                                    <tr valign="top">

                                        <th scope="row">RuiBian Banner 文字</th>
                                        <td>
                                            <?php
                                                $textarea1 = get_option('ddg_option_textarea1');


                                              //  wp_editor(  $textarea, 'content-banner', array( 'textarea_name' => 'ddg_option_textarea', 'media_buttons' => false ) );

                                            ?>
                                            <textarea  name="ddg_option_textarea1"  id="content_text"  ><?php echo $textarea1; ?></textarea>

                                        </td>
                                    </tr>
                                    <tr valign="top">
                                        <th scope="row">RuiBian Banner Text</th>
                                        <td>
                                            <input type="text" name="ddg_option_text2"   value="<?php echo esc_attr( get_option('ddg_option_text2') ); ?>" />
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
    <script>
        (function($){$(document).ready(function(){
            $("input.switch").bootstrapSwitch();
        })})(jQuery);
    </script>


<!--
    <script src="http://localhost:35729/livereload.js"></script>
    -->

<?php } ?>
