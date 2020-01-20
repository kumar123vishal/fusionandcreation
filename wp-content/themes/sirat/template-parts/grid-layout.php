<?php
/**
 * The template part for displaying grid post
 *
 * @package Sirat
 * @subpackage sirat
 * @since Sirat 1.0
 */
?>

<div class="col-lg-4 col-md-4">
	<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
	    <div class="post-main-box">
	      	<div class="box-image">
	          	<?php 
		            if(has_post_thumbnail()) { 
		              the_post_thumbnail(); 
		            }
	          	?>
	        </div>
	        <h2 class="section-title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
	        <div class="new-text">
	        	<div class="entry-content"><p><?php the_excerpt();?></p></div>
	        </div>
	        <div class="more-btn">
            	<a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('sirat_button_text','READ MORE'));?><span class="screen-reader-text"><?php esc_html_e( 'READ MORE','sirat' );?></span></a>
          	</div>
	    </div>
	    <div class="clearfix"></div>
  	</article>
</div>