<?php
/**
 * The template part for displaying single post content
 *
 * @package Sirat
 * @subpackage sirat
 * @since Sirat 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
    <div class="single-post">
        <h1><?php the_title(); ?></h1>
        <div class="post-info">
            <?php if(get_theme_mod('sirat_toggle_postdate',true)==1){ ?>
                <span class="entry-date"><i class="fas fa-calendar-alt"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><span>|</span>
            <?php } ?>

            <?php if(get_theme_mod('sirat_toggle_author',true)==1){ ?>
                <span class="entry-author"><i class="far fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span><span>|</span>
            <?php } ?>

            <?php if(get_theme_mod('sirat_toggle_comments',true)==1){ ?>
                <span class="entry-comments"><i class="fas fa-comments"></i><?php comments_number( __('0 Comment', 'sirat'), __('0 Comments', 'sirat'), __('% Comments', 'sirat') ); ?> </span>
            <?php } ?>
        </div>

        <?php if(has_post_thumbnail()) { ?>
            <div class="feature-box">   
              <?php the_post_thumbnail(); ?>
              <hr> 
            </div>                   
        <?php } ?> 
        <div class="entry-content">
            <?php the_content(); ?>
            <div class="tags"><?php the_tags(); ?></div>    
        </div> 
        <?php
            // If comments are open or we have at least one comment, load up the comment template
            if ( comments_open() || '0' != get_comments_number() )
            comments_template();

            if ( is_singular( 'attachment' ) ) {
                // Parent post navigation.
                the_post_navigation( array(
                    'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'sirat' ),
                ) );
            } elseif ( is_singular( 'post' ) ) {
                // Previous/next post navigation.
                the_post_navigation( array(
                    'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'sirat' ) . '</span> ' .
                        '<span class="screen-reader-text">' . __( 'Next post:', 'sirat' ) . '</span> ' .
                        '<span class="post-title">%title</span>',
                    'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'sirat' ) . '</span> ' .
                        '<span class="screen-reader-text">' . __( 'Previous post:', 'sirat' ) . '</span> ' .
                        '<span class="post-title">%title</span>',
                ) );
            }
        ?>
    </div>
</article>