<?php
/**
 * The template for displaying image attachments
 *
 * @author      NanoAgency
 * @link        http://nanoagency.co
 * @copyright   Copyright (c) 2015 NanoAgency
 * @license     GPL v2
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php
        // Start the loop.
        while ( have_posts() ) : the_post();
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="entry-header clearfix">
                    <header class="entry-header">
                        <?php the_title( '<h1 class="zentry-title">', '</h1>' ); ?>
                    </header><!-- .entry-header -->
                    <nav id="image-navigation" class="entry_pagination pull-right">
                        <div class="image-pagination pagination">
                            <div class="page-numbers">
                                <?php previous_image_link( false, esc_html__( 'Previous Image', 'bizi' ) ); ?>
                            </div>
                            <div class="page-numbers">
                                <?php next_image_link( false, esc_html__( 'Next Image', 'bizi' ) ); ?>
                            </div>
                        </div><!-- .nav-links -->
                    </nav><!-- .image-navigation -->
                </div>
                <div class="entry-content">

                    <div class="entry-attachment">
                        <?php

                        $image_size = apply_filters( 'bizi_attachment_size', 'large' );

                        echo wp_get_attachment_image( get_the_ID(), $image_size );
                        ?>

                        <?php if ( has_excerpt() ) : ?>
                            <div class="entry-caption">
                                <?php the_excerpt(); ?>
                            </div><!-- .entry-caption -->
                        <?php endif; ?>

                    </div><!-- .entry-attachment -->

                    <?php
                    the_content();
                    wp_link_pages( array(
                        'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'bizi' ) . '</span>',
                        'after'       => '</div>',
                        'link_before' => '<span>',
                        'link_after'  => '</span>',
                        'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'bizi' ) . ' </span>%',
                        'separator'   => '<span class="screen-reader-text">, </span>',
                    ) );
                    ?>
                </div><!-- .entry-content -->

                <footer class="entry-footer">
                    <?php bizi_entry_meta(); ?>
                    <?php edit_post_link( esc_html__( 'Edit', 'bizi' ), '<span class="edit-link">', '</span>' ); ?>
                </footer><!-- .entry-footer -->

            </article><!-- #post-## -->

            <?php
            // If comments are open or we have at least one comment, load up the comment template
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;

            // Previous/next post navigation.
            the_post_navigation( array(
                'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'bizi' ),
            ) );

            // End the loop.
        endwhile;
        ?>

    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>