<?php
/**
 * @author      NanoAgency
 * @link        http://nanoagency.co
 * @copyright   Copyright (c) 2015 NanoAgency
 * @license     GPL v2
 */

if ( ! isset( $content_width ) ) {
    $content_width = 660;
}

/**
 * Include file .
 */

//Setup tgm
require_once get_template_directory() . '/class-tgm-plugin-activation.php';

//Setup theme
require get_template_directory().'/inc/theme-function/setup.php';

//Theme function
require get_template_directory().'/inc/theme-function/theme-function.php';

//Loading Template for theme.
require get_template_directory().'/inc/theme-function/theme-load.php';