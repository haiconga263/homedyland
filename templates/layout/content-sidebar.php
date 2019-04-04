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
$add_class='';
?>

<article <?php post_class('post-item post-sidebar  clearfix'); ?>>
    <div class="article-image">
            <?php if(has_post_thumbnail()) : ?>
                <?php if(!get_theme_mod('sp_post_thumb')) : ?>
                    <div class="post-image">
                        <a href="<?php echo get_permalink() ?>"><?php the_post_thumbnail('bizi-sidebar'); ?></a>
                    </div>
                <?php endif; ?>
                <?php else :
                    $add_class='full-width';
            endif; ?>
    </div>
    <div class="article-content side-item-text <?php echo esc_attr($add_class);?>">
        <div class="entry-header clearfix">
             <span class="post-cat"><?php echo bizi_category(', '); ?></span>
            <header class="entry-header-title">
                <?php
                    the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
                ?>
            </header>
        </div>
    </div>
</article><!-- #post-## -->
