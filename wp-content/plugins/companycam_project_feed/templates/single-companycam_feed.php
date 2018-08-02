<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php
        // Start the loop.
        while ( have_posts() ) : the_post();

            /*
             * Include the post format-specific template for the content. If you want to
             * use this in a child theme, then include a file called content-___.php
             * (where ___ is the post format) and that will be used instead.
             */
        ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php
                    if ( is_single() ) :
                        the_title( '<h1 class="entry-title">', '</h1>' );
                    else :
                        the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
                    endif;
                    ?>
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php
                    /* translators: %s: Name of current post */
                    the_content( sprintf(
                        __( 'Continue reading %s', 'twentyfifteen' ),
                        the_title( '<span class="screen-reader-text">', '</span>', false )
                    ) );

                    wp_link_pages( array(
                        'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
                        'after'       => '</div>',
                        'link_before' => '<span>',
                        'link_after'  => '</span>',
                        'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
                        'separator'   => '<span class="screen-reader-text">, </span>',
                    ) );
                    ?>
                </div><!-- .entry-content -->

                <?php
                // Author bio.
                if ( is_single() && get_the_author_meta( 'description' ) ) :
                    ?>
                        <div class="author-info">
                            <h2 class="author-heading"><?php _e( 'Published by', 'twentyfifteen' ); ?></h2>
                            <div class="author-avatar">
                                <?php
                                /**
                                 * Filter the author bio avatar size.
                                 *
                                 * @since Twenty Fifteen 1.0
                                 *
                                 * @param int $size The avatar height and width size in pixels.
                                 */
                                $author_bio_avatar_size = apply_filters( 'twentyfifteen_author_bio_avatar_size', 56 );

                                echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
                                ?>
                            </div><!-- .author-avatar -->

                            <div class="author-description">
                                <h3 class="author-title"><?php echo get_the_author(); ?></h3>

                                <p class="author-bio">
                                    <?php the_author_meta( 'description' ); ?>
                                    <a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
                                        <?php printf( __( 'View all posts by %s', 'twentyfifteen' ), get_the_author() ); ?>
                                    </a>
                                </p><!-- .author-bio -->

                            </div><!-- .author-description -->
                        </div><!-- .author-info -->
                    <?php
                endif;
                ?>

            </article><!-- #post-## -->
        <?php

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;

            // Previous/next post navigation.
            the_post_navigation( array(
                'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentyfifteen' ) . '</span> ' .
                    '<span class="screen-reader-text">' . __( 'Next post:', 'twentyfifteen' ) . '</span> ' .
                    '<span class="post-title">%title</span>',
                'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentyfifteen' ) . '</span> ' .
                    '<span class="screen-reader-text">' . __( 'Previous post:', 'twentyfifteen' ) . '</span> ' .
                    '<span class="post-title">%title</span>',
            ) );

            // End the loop.
        endwhile;
        ?>

    </main><!-- .site-main -->

    <?php
    if ( ! is_active_sidebar( 'sidebar-1' ) ) {
        return;
    }
    ?>

    <aside id="secondary" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Blog Sidebar'); ?>">
        <?php dynamic_sidebar( 'companycam-sidebar' ); ?>
    </aside><!-- #secondary -->
</div><!-- .content-area -->

<?php get_footer(); ?>
