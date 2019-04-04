<?php
/**
 * The default template for displaying content
 *
 * @author      NanoAgency
 * @link        http://nanoagency.co
 * @copyright   Copyright (c) 2015 NanoAgency
 * @license     GPL v2
 */

$format = get_post_format();
$format = get_post_format();
$add_class='';

//number word content
$number_word = get_theme_mod('bizi_number_content_post','45');
$placeholder_image = get_template_directory_uri(). '/assets/images/layzyload-list.jpg';
$share = get_theme_mod('bizi_post_meta_share', false);
?>
<article  <?php post_class('post-item post-list clearfix'); ?>>
    <div class="article-image">
        <?php if(has_post_thumbnail()) : ?>
            <?php $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), "bizi-blog-list" ); ?>
            <div class="post-image">
                <span class="bgr-item"></span>
                <a href="<?php echo get_permalink();?>">
                    <img  class="lazy" src="<?php echo esc_url($placeholder_image);?>"  data-original="<?php echo esc_attr($thumbnail_src[0]);?>" data-lazy="<?php echo esc_attr($thumbnail_src[0]);?>" alt="post-image"/>
                </a>
                <?php
                if ($share) { ?>
                    <?php get_template_part('templates/share-social');
                }
                ?>
            </div>

        <?php else :
            $add_class='full-width';
        endif; ?>
        <?php if(has_post_format('gallery')) : ?>
            <?php $images = get_post_meta( get_the_ID(), '_format_gallery_images', true );?>
            <?php if($images) : ?>
                <div class="post-gallery">
                    <a  href="<?php echo get_post_format_link( $format ); ?>" class="post-format"><i class="ti-camera"></i></a>
                </div>
            <?php endif; ?>

        <?php elseif(has_post_format('video')) : ?>
            <div class="post-video">
                <a  href="<?php echo get_post_format_link( $format ); ?>" class="post-format"><i class="ti-control-play"></i></a>
            </div>
        <?php elseif(has_post_format('audio')) : ?>
            <div class="post-audio">
                <a href="<?php echo get_permalink() ?>"><?php the_post_thumbnail('bizi-blog-list'); ?></a>
                <a  href="<?php echo get_post_format_link( $format ); ?>" class="post-format"><i class="ti-headphone"></i></a>
            </div>
        <?php elseif(has_post_format('quote')) :?>
            <div class="post-quote <?php echo esc_attr($add_class);?>">
                <?php $sp_quote = get_post_meta( get_the_ID(), '_format_quote_source_name', true ); ?>
                <a href="<?php echo get_permalink() ?>"><?php the_post_thumbnail('bizi-blog-list'); ?></a>
                <a  href="<?php echo get_post_format_link( $format ); ?>" class="post-format"><i class="ti-quote-left"></i></a>
            </div>
        <?php endif; ?>
    </div>
    <div class="article-content <?php echo esc_attr($add_class);?>">
        <div class="entry-header clearfix">
            <span class="post-cat"><?php echo bizi_category(' '); ?></span>
            <header class="entry-header-title">
                <?php
                the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
                ?>
            </header>
        </div>
        <div class="article-meta clearfix">
            <?php bizi_entry_meta(); ?>
        </div>
        <div class="entry-content">
            <?php
            if ( has_excerpt() || is_search() ){
                bizi_excerpt();
            }
            else{
                echo bizi_content($number_word);
            }

            wp_link_pages( array(
                'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'bizi' ) . '</span>',
                'after'       => '</div>',
                'link_before' => '<span class="page-numbers">',
                'link_after'  => '</span>',
                'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'bizi' ) . ' </span>%',
                'separator'   => '<span class="screen-reader-text">, </span>',
            ) );
            ?>

        </div>

    </div>
</article><!-- #post-## -->
