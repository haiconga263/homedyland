<?php
/**
 * @package     bizi
 * @version     1.0
 * @author      NanoAgency
 * @link        http://www.nanoagency.co
 * @copyright   Copyright (c) 2016 NanoAgency
 * @license     GPL v2
 */

/*  Setup Theme ===================================================================================================== */
add_action( 'after_setup_theme', 'bizi_theme_setup' );
if ( ! function_exists( 'bizi_theme_setup' ) ) :
    function bizi_theme_setup() {
        load_theme_textdomain( 'bizi', get_template_directory() . '/languages' );

        //  Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        //  Let WordPress manage the document title.
        add_theme_support( 'title-tag' );

        //  Enable support for Post Thumbnails on posts and pages.
        add_theme_support( 'post-thumbnails' );

        set_post_thumbnail_size( 825, 510, true );

        add_image_size( 'thumb-image', 600, 450, true);

        //Enable support for Post Formats.
        add_theme_support( 'html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
        ) );

        add_theme_support( 'post-formats', array(
            'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
        ) );

        add_theme_support( 'custom-header' );

        add_theme_support( 'custom-background' );

        add_theme_support( "title-tag" );

        add_theme_support( 'wp-block-styles' );

        add_theme_support( 'align-wide' );

        add_theme_support( 'editor-styles' );

        add_editor_style( array( 'assets/css/editor-style.css', bizi_font_url() ) );

        add_theme_support( 'responsive-embeds' );


        add_theme_support( 'editor-color-palette', array(
            array(
                'name' => __( 'strong magenta', 'ganesa' ),
                'slug' => 'strong-magenta',
                'color' => '#a156b4',
            ),
            array(
                'name' => __( 'light grayish magenta', 'ganesa' ),
                'slug' => 'light-grayish-magenta',
                'color' => '#d0a5db',
            ),
            array(
                'name' => __( 'very light gray', 'ganesa' ),
                'slug' => 'very-light-gray',
                'color' => '#eee',
            ),
            array(
                'name' => __( 'very dark gray', 'ganesa' ),
                'slug' => 'very-dark-gray',
                'color' => '#444',
            ),
        ) );

        add_theme_support( 'woocommerce' );
    }
endif;

/* Thumbnail Sizes ================================================================================================== */
set_post_thumbnail_size( 220, 150, true);

add_image_size( 'bizi-single-post', 1170 ,600, true);

add_image_size( 'bizi-blog-list', 444 ,474, true);

add_image_size( 'bizi-blog-tran', 585 ,624, true);

add_image_size( 'bizi-blog-grid', 380 ,260, true);

add_image_size( 'bizi-blog-vertical', 510 ,680, true);

add_image_size( 'bizi-sidebar', 100 ,100, true);

add_image_size( 'bizi-related-image',370,247,true);

/* Setup Font ======================================================================================================= */
function bizi_font_url() {
    $fonts_url = '';
    $opensans   = _x( 'on', 'Roboto font: on or off', 'bizi' );
    $oswald     = _x( 'on', 'Oswald font: on or off', 'bizi' );

    if ( 'off' !== $opensans || 'off' !== $oswald ) {
        $font_families = array();

        if ( 'off' !== $opensans) {
            $font_families[] = 'Roboto:300,300i,400,400i,500,700,900';
        }
        if ( 'off' !== $oswald ) {
            $font_families[] = 'Oswald';
        }
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );

        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }

    return esc_url_raw( $fonts_url );
}


/* Load Front-end scripts  ========================================================================================== */
add_action( 'wp_enqueue_scripts', 'bizi_theme_scripts');
function bizi_theme_scripts() {

    // Add  fonts, used in the main stylesheet.
    wp_enqueue_style( 'bizi_fonts', bizi_font_url(), array(), null );
    //style plugins
    wp_enqueue_style('bootstrap',get_template_directory_uri().'/assets/css/bootstrap.min.css', array(), '3.0.2 ');
    wp_enqueue_style('font-awesome',get_template_directory_uri().'/assets/css/font-awesome.min.css', array(), '4.6.3');
    wp_enqueue_style('themify-icons',get_template_directory_uri().'/assets/css/themify-icons.css', array(),null);
    //style MAIN THEME
    wp_enqueue_style( 'bizi-main', get_template_directory_uri(). '/style.css', array(), null );
    //style skin
    wp_enqueue_style('bizi-css', get_template_directory_uri().'/assets/css/style-default.min.css' );
    //register all plugins
    wp_enqueue_script( 'plugins', get_template_directory_uri().'/assets/js/plugins.min.js', array(), null, true );
    wp_enqueue_script( 'isotope', get_template_directory_uri().'/assets/js/plugins/isotope.pkgd.min.js', array(), '2.2.0', true );
    wp_enqueue_script('jquery-masonry');

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    if ( is_singular() && wp_attachment_is_image() ) {
        wp_enqueue_script( 'bizi-theme-keyboard-image-navigation', get_template_directory_uri() . '/assets/js/keyboard-image-navigation.min.js', array( 'jquery' ), '20141010' );
    }

    //jquery MAIN THEME
    wp_enqueue_script('isotope-init', get_template_directory_uri() . '/assets/js/dev/isotope-init.js', array('jquery'),null, true);
    wp_enqueue_script('bizi', get_template_directory_uri() . '/assets/js/dev/bizi.js', array('jquery'),null, true);

}

/* Load Back-end SCRIPTS============================================================================================= */
function bizi_js_enqueue()
{
    wp_enqueue_media();
    wp_enqueue_style('thickbox');
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    // moved the js to an external file, you may want to change the path
    wp_enqueue_script('information_js',get_template_directory_uri(). '/assets/js/widget.min.js', 'jquery', '1.0', true);
}
add_action('admin_enqueue_scripts', 'bizi_js_enqueue');

/* Register the required plugins    ================================================================================= */
add_action( 'tgmpa_register', 'bizi_register_required_plugins' );
function bizi_register_required_plugins() {

    $plugins = array(
        // This is an example of how to include a plugin pre-packaged with a theme.
        array(
            'name'      => esc_html__( 'Nano Core Plugin', 'bizi' ),
            'slug'      => 'theme-core',
            'source'    => get_template_directory() . '/inc/theme-plugins/theme-core.zip',
            'required'  => true,
            'version'   => '2.0.0',
            'force_activation' => false,
            'force_deactivation' => false,
            'image_url' => get_template_directory_uri() . '/inc/backend/assets/images/plugins/nano.jpg',

        ),
        //Contact form 7
        array(
            'name'      => esc_html__('Contact Form 7', 'bizi' ),
            'slug'      => 'contact-form-7',
            'required'  => false,
            'image_url' => get_template_directory_uri() . '/inc/backend/assets/images/plugins/contact-form7.jpg',
        ),
        //WPBakery Visual Composer
        array(
            'name'      =>  esc_html__('WPBakery Visual Compose', 'bizi' ),
            'slug'      => 'js_composer',
            'source'    => get_template_directory() . '/inc/theme-plugins/js_composer.zip',
            'required'  => true,
            'version'   => '5.7',
            'image_url' => get_template_directory_uri() . '/inc/backend/assets/images/plugins/vc.jpg',
        ),
        //MailChimp for WordPress
        array(
            'name'      =>  esc_html__('MailChimp for WordPress ', 'bizi' ),
            'slug'      => 'mailchimp-for-wp',
            'required'  => false,
            'image_url' => get_template_directory_uri() . '/inc/backend/assets/images/plugins/mailchimp.jpg',
        ),
        //Instagram
        array(
            'name'      =>  esc_html__('Instagram Feed', 'bizi' ),
            'slug'      => 'instagram-feed',
            'required'  => false,
            'image_url' => get_template_directory_uri() . '/inc/backend/assets/images/plugins/instagram.jpg',
        ),
        //Classic Editor
        array(
            'name'      =>  esc_html__('Classic Editor', 'bizi' ),
            'slug'      => 'classic-editor',
            'required'  => false,
        ),
        //Loco Translate
        array(
            'name'      =>  esc_html__('Loco Translate', 'bizi' ),
            'slug'      => 'loco-translate',
            'required'  => false,
        ),

    );

    $config = array(
        'id'           => 'bizi',                   // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                       // Default absolute path to pre-packaged plugins.
        'has_notices'  => true,
        'menu'         => 'tgmpa-install-plugins',  // Menu slug.
        'dismiss_msg'  => '',                       // If 'dismissable' is false, this message will be output at top of nag.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'is_automatic' => true,                     // Automatically activate plugins after installation or not.
        'message'      => '',                       // Message to output right before the plugins table.

    );

    tgmpa( $plugins, $config );

}

/* Register Navigation ============================================================================================== */
register_nav_menus( array(
    'primary_navigation'    => esc_html__( 'Primary Navigation', 'bizi' ),

) );

/* Register Sidebar ================================================================================================= */
if ( function_exists('register_sidebar') ) {
    register_sidebar( array(
        'name'          => esc_html__( 'Archive', 'bizi' ),
        'id'            => 'archive',
        'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'bizi' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Blogs', 'bizi' ),
        'id'            => 'blogs',
        'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'bizi' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar(array(
        'name' => esc_html__('Footer Top','bizi'),
        'id'   => 'footer-top',
        'before_widget' => '<div id="%1$s" class="widget first %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer 1','bizi'),
        'id'   => 'footer-1',
        'before_widget' => '<div id="%1$s" class="widget first %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer 2','bizi'),
        'id'   => 'footer-2',
        'before_widget' => '<div id="%1$s" class="widget first %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer 3','bizi'),
        'id'   => 'footer-3',
        'before_widget' => '<div id="%1$s" class="widget first %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer 4','bizi'),
        'id'   => 'footer-4',
        'before_widget' => '<div id="%1$s" class="widget first %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Custom Header Left','bizi'),
        'id'   => 'custom-header-middle',
        'before_widget' => '<div id="%1$s" class="widget first %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Custom Copy Right','bizi'),
        'id'   => 'copy-right',
        'before_widget' => '<div id="%1$s" class="widget first %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
}