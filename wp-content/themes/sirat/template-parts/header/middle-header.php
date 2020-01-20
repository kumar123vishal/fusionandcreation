<?php
/**
 * The template part for top header
 *
 * @package Sirat 
 * @subpackage sirat
 * @since Sirat 1.0
 */
?>

<div class="middle-header <?php if( get_theme_mod( 'sirat_sticky_header') != '') { ?> header-sticky"<?php } else { ?>close-sticky <?php } ?>">
  <div class="container">
    <?php $theme_lay = get_theme_mod( 'sirat_header_content_option','Left');
      if($theme_lay == 'Left'){ ?>
        <div class="row">
          <div class="col-lg-3 col-md-3">
            <div class="logo">
              <?php if ( has_custom_logo() ) : ?>
                <div class="site-logo"><?php the_custom_logo(); ?></div>
              <?php endif; ?>
              <?php $blog_info = get_bloginfo( 'name' ); ?>
                <?php if ( ! empty( $blog_info ) ) : ?>
                  <?php if ( is_front_page() && is_home() ) : ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                  <?php else : ?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                  <?php endif; ?>
                <?php endif; ?>
                <?php
                  $description = get_bloginfo( 'description', 'display' );
                  if ( $description || is_customize_preview() ) :
                ?>
                <p class="site-description">
                  <?php echo esc_html( $description ); ?>
                </p>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-lg-9 col-md-9">
            <?php get_template_part( 'template-parts/header/navigation' ); ?>
          </div>
        </div>
      <?php }else if($theme_lay == 'Center'){ ?>
        <div class="logo">
          <?php if( has_custom_logo() ){ sirat_the_custom_logo();
            }else{ ?>
              <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
              <?php $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) : ?>
              <p class="site-description"><?php echo esc_html($description); ?></p>
          <?php endif; } ?>
        </div>
        <div class="test">
         <?php get_template_part( 'template-parts/header/navigation' ); ?>
        </div>
      <?php }else if($theme_lay == 'Right'){ ?>
        <div class="row">
          <div class="col-lg-9 col-md-9">
            <?php get_template_part( 'template-parts/header/navigation' ); ?>
          </div>
          <div class="col-lg-3 col-md-3">
            <div class="logo">
              <?php if( has_custom_logo() ){ sirat_the_custom_logo();
                }else{ ?>
                  <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                  <?php $description = get_bloginfo( 'description', 'display' );
                  if ( $description || is_customize_preview() ) : ?>
                  <p class="site-description"><?php echo esc_html($description); ?></p>
              <?php endif; } ?>
            </div>
          </div>
        </div>
      <?php } ?>
  </div>
</div>