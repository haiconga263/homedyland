<?php
/**
 * The default template for displaying content
 *
 * @author      Nanobizi
 * @link        http://nanobizi.co
 * @copyright   Copyright (c) 2015 Nanobizi
 * @license     GPL v2
 */
$format = get_post_format();
$placeholder_image = get_template_directory_uri(). '/assets/images/layzyload-full.jpg';
?>

<article <?php post_class('post-item post-tran  clearfix'); ?>>
    <div class="article-tran hover-share-item">
        <?php if(has_post_thumbnail()) : ?>
            <?php if(!get_theme_mod('sp_post_thumb')) : ?>
                <?php if(has_post_thumbnail()) : ?>
                    <?php $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), "bizi-blog-full" ); ?>
                    <div class="post-image">
                        <a href="<?php echo get_permalink() ?>" class="bgr-item"></a>
                        <a href=" <?php echo get_permalink() ?>">
                            <img  class="lazy" src="<?php echo esc_url($placeholder_image);?>"  data-original="<?php echo esc_attr($thumbnail_src[0]);?>" data-lazy="<?php echo esc_attr($thumbnail_src[0]);?>" alt="post-image"/>
                        </a>
                    </div>
                <?php endif;?>
                <div class="article-content">
                    <span class="post-cat"><?php echo bizi_category(', '); ?></span>
                    <div class="entry-header clearfix">
                        <header class="entry-header-title">
                            <?php
                            the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
                            ?>
                        </header>
                    </div>
                    <div class="article-meta clearfix">
                        <?php bizi_entry_meta(); ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php else :
            $placeholder_image = get_template_directory_uri(). '/assets/images/placeholder-trans.png';
            ?>
            <div class="post-image  placeholder-trans ">
                <a href="<?php echo get_permalink() ?>"><?php the_post_thumbnail('buggy-blog-tran'); ?>
                    <img src="<?php echo esc_url($placeholder_image); ?>" class="wp-post-image" width="1170" height="500">
                </a>
            </div>
        <?php endif; ?>
    </div>

</article><!-- #post-## -->
