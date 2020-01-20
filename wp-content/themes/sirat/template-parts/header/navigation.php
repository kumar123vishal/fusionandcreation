<?php
/**
 * The template part for header
 *
 * @package Sirat 
 * @subpackage sirat
 * @since Sirat 1.0
 */
?>
<div class="menubar">
	<div class="toggle-nav mobile-menu">
	    <button onclick="menu_openNav()"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','sirat'); ?></span></button>
	</div>
	 <div id="mySidenav" class="nav sidenav">
	    <nav id="site-navigation" class="main-menu-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'sirat' ); ?>">
	        <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="menu_closeNav()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','sirat'); ?></span></a>
	        <?php 
	          wp_nav_menu( array( 
	            'theme_location' => 'primary',
	            'container_class' => 'main-menu clearfix' ,
	            'menu_class' => 'clearfix',
	            'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
	            'fallback_cb' => 'wp_page_menu',
	          ) ); 
	        ?>
	    </nav>
	</div>
</div>