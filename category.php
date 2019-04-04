<?php
/**
 * The template for displaying Category pages
 *
 * @author      NanoAgency
 * @link        http://nanoagency.co
 * @copyright   Copyright (c) 2015 NanoAgency
 * @license     GPL v2
 */

get_header();

$title                = get_theme_mod('bizi_post_title_heading',true);
$layout_content=get_theme_mod('bizi_layout_cat_content', 'list');

$content_description     = get_theme_mod('bizi_cat_content_description', true);
$content_des='description-hidden';
if($content_description){
    $content_des='description-show';
}

$content_col   = get_theme_mod('bizi_number_post_cat', '1');
if ($content_col==='2'){
    $class='col-md-6';
}
elseif ($content_col==='3'){
    $class='col-md-4';
}
elseif ($content_col==='4'){
    $class='col-md-3';
}else{
    $class='col-md-12';
}

//get
if(isset($_GET['col'])){
    $class=$_GET['col'];
}
if(isset($_GET['des'])){
    $content_des=$_GET['des'];
}
if(isset($_GET['content'])){
    $layout_content=$_GET['content'];
}

?>
<div class="wrap-content container" role="main">
    <?php if ($title): ?>
        <h1 class="title-cat">
            <?php single_cat_title(); ?>
        </h1>
    <?php endif;?>
    <div class="row content-category">
        <?php do_action('archive-sidebar-left'); ?>
        <?php do_action('archive-content-before'); ?>
        <?php if ( have_posts() ) : ?>
            <div class="archive-blog  row <?php echo esc_attr($content_des);?>">
                <div class="rows affect-isotope">
                    <?php
                    // Start the Loop.
                    while ( have_posts() ) : the_post(); ?>
                        <div class="item-post col-item <?php echo esc_attr($class);?>">
                            <?php get_template_part( 'templates/layout/content' ,$layout_content); ?>
                        </div>
                    <?php endwhile;

                    else :
                        // If no content, include the "No posts found" template.
                        get_template_part( 'content', 'none' );
                    endif;

                    ?>
                </div>
            </div>
            <?php
            the_posts_pagination( array(
                'prev_text'          => '<i class="fa fa-angle-left"></i>',
                'next_text'          => '<i class="fa fa-angle-right"></i>',
                'before_page_number' => '<span class="meta-nav screen-reader-text"></span>',
            ) );
            ?>
        <?php do_action('archive-content-after'); ?>

        <?php do_action('archive-sidebar-right'); ?>
    </div><!-- .content-area -->
</div>
<?php
get_footer();
