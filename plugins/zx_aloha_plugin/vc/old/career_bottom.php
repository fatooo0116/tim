<?php

// don't load directly
if (!defined('ABSPATH')) die('-1');



function career_bottom(){
    vc_map(
        array(
            'name'            => __('Career bottom', 'psky'),
            'base'            => 'career_bottom',
            "category" => array('STRIGHT'),
            //  "icon" => plugins_url('../img/slider.png', __FILE__),
            /*
            'content_element' => true,
            'show_settings_on_create' => false,
            "js_view" => 'VcColumnView',
            */
            "params" => array(              

                array(
                    "type" => "textarea",
                    "class" => "",
                    "heading" => __( "Title", "my-text-domain" ),
                    "param_name" => "title",
                    "value" => __( "", "my-text-domain" ),
                    "admin_label" => true,
                ),  

                array(
                    "type" => "textarea",
                    "class" => "",
                    "heading" => __( "Title Text", "my-text-domain" ),
                    "param_name" => "subtitle",
                    "value" => __( "", "my-text-domain" ),
                    "admin_label" => true,
                ),  

                array(
                    "type" => "vc_link",
                    "class" => "",
                    "heading" => __( "Button Link", "my-text-domain" ),
                    "param_name" => "all_link",
                    "value" => __( "", "my-text-domain" ),
                    "admin_label" => true,
                ),           
                                                               
            )
        )
    );
}
add_action( 'vc_before_init', 'career_bottom' );







/*
 *  ShortCode
 *
 * */
function career_bottom_fun( $atts, $content = null ) {
    extract( shortcode_atts( array(
        // 'button_text' => '',
        'title'=>'',
        'subtitle'=>'',
        'all_link' => ''
    ), $atts ) );

    $content1 = rawurldecode( base64_decode($atts['content1'])); 
    $all_link = vc_build_link( $all_link);
    

    ob_start();
    ?>
        <section  id="career_bottom" class="contact_section  box_width">            
            <h3 class="main_title">Available Positions<?php echo $title; ?></h3>
            <div class="sub"><?php  echo $subtitle; ?>With cloud-based allocation software,<br/> we make shipping your cargo transparent, reliable, and affordable.</div>
            <div class="inner">
                <div class="job_list">
                    <?php                     

                        $args = array(
                            'post_type' =>array('job'), 
                            'orderby' => 'date',
                            'order' => 'DESC',
                            'posts_per_page' => 5
                        );
 
                        // The Query
                        $the_query = new WP_Query( $args );
                        
                        // The Loop
                        if ( $the_query->have_posts() ) {
                            echo '<ul>';
                            while ( $the_query->have_posts() ) {
                                $the_query->the_post();

                                ?>
                                <li>
                                    <a href="<?php echo get_permalink(); ?>"  class="title" ><?php echo get_the_title(); ?></a>
                                    <div class="meta">
                                        <div class="inner">
                                            <div class="cat">
                                            <?php                                                 
                                                $terms = get_the_terms(get_the_ID(),'job_type');
                                                foreach($terms as $tm){
                                                    echo '<a href="'.get_term_link($tm->term_id).'">'.$tm->name.'</a>';
                                                }
                                            ?> , 
                                            <?php                                                 
                                                $terms = get_the_terms(get_the_ID(),'job_country');
                                                foreach($terms as $tm){
                                                    echo '<a href="'.get_term_link($tm->term_id).'">'.$tm->name.'</a>';
                                                }
                                            ?>                                            	   
                                                                                         
                                            </div>
                                            <div class="date"><?php echo get_the_Date(); ?></div>
                                        </div>
                                        <a href="#" class="apply" >Apply</a>
                                    </div>                                    
                                </li>
                                <?php
                            }
                            echo '</ul>';
                        } else {
                            // no posts found
                        }
                        /* Restore original Post Data */
                        wp_reset_postdata();
                    ?>
                </div>
                <a href="<?php echo $all_link['url']; ?>" class="button">All positions</a>
            </div>
        </section>
    <?php
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}
add_shortcode( 'career_bottom', 'career_bottom_fun' );
