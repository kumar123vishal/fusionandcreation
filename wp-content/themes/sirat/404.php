<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Sirat
 */

get_header(); ?>

<div class="container">
	<main id="content" role="main">
    	<h1><?php echo esc_html(get_theme_mod('sirat_404_page_title','404 Not Found'));?></h1>
		<p class="text-404"><?php echo esc_html(get_theme_mod('sirat_404_page_content','Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.'));?></p>
		<div class="more-btn">
	        <a href="<?php echo esc_url(home_url()); ?>"><?php echo esc_html(get_theme_mod('sirat_404_page_button_text','Go Back'));?><span class="screen-reader-text"><?php esc_html_e( 'Go Back','sirat' );?></span></a>
	    </div>
		<div class="clearfix"></div>
	</main>
</div>

<?php get_footer(); ?>