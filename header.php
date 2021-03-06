<?php
/**
 * The template for displaying the header
 *
 * @author      NanoAgency
 * @link        http://nanoagency.co
 * @copyright   Copyright (c) 2015 NanoAgency
 * @license     GPL v2
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="wrapper site">
    <div class="canvas-overlay"></div>

    <?php
    $layout_header = '';
    if(is_page()){
        $layout_header = get_post_meta($post->ID, 'layout_header', true);
    }
    if($layout_header == 'global' || empty($layout_header)){
        get_template_part('templates/header/header', get_theme_mod('bizi_header', 'simple'));
    }
    else{
        get_template_part('templates/header/header', $layout_header);
    }
    ?>
		<?php 
echo do_shortcode('[smartslider3 slider=1]');
?>
    <div id="content" class="site-content">