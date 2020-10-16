<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bluextrade
 */

?>

	</div><!-- #content -->

	<footer id="footer" class="site-footer">
	



			<!-- ###########       footer_bottom    ############  -->
			<div class="footer_bottom">
				<div class="bottom_right_nav">
					<?php
						echo '<ul>';
						echo '<li>Copyright ©  '.date('Y').' Taiwan International Marketing Inc. 全台國際行銷有限公司</li>';
						echo '</ul>';
						
						echo '<ul>';
						$args = array(
							'order'                  => 'ASC',
							'orderby'                => 'menu_order',
							'post_type'              => 'nav_menu_item',
							'post_status'            => 'publish',
							'output'                 => ARRAY_A,
							'output_key'             => 'menu_order',
							'nopaging'               => true,
							'update_post_term_cache' => false );

							$menu_items = wp_get_nav_menu_items("footer_bottom", $args );

							$item_html= '';
							$mobile_item_html= '';
							$parent_id=0;
							$current = false;

							 // print_r($menu_items);

							
							foreach( $menu_items as $menu ){								
								echo '<li><a href="'.$menu->url.'">'.$menu->title.'</a></li>';
							}
																											
							echo '</ul>';							
					?>				
				</div>
			</div>
	</footer><!-- #colophon -->
</div><!-- #page -->


<?php wp_footer(); ?>

</body>
</html>
