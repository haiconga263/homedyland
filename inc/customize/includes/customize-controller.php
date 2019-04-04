<?php
/**
 * @package     NA Core
 * @version     0.1
 * @author      Nanobizi
 * @link        http://nanobizi.co
 * @copyright   Copyright (c) 2015 Nanobizi
 * @license     GPL v2
 */
if (!class_exists('bizi_Customize')) {
    class bizi_Customize
    {
        public $customizers = array();

        public $panels = array();

        public function init()
        {
            $this->customizer();
            add_action('customize_controls_enqueue_scripts', array($this, 'bizi_customizer_script'));
            add_action('customize_register', array($this, 'bizi_register_theme_customizer'));
            add_action('customize_register', array($this, 'remove_default_customize_section'), 20);
        }

        public static function &getInstance()
        {
            static $instance;
            if (!isset($instance)) {
                $instance = new bizi_Customize();
            }
            return $instance;
        }

        protected function customizer()
        {
            $this->panels = array(

                'site_panel' => array(
                    'title'             => esc_html__('Style Setting','bizi'),
                    'description'       => esc_html__('Style Setting >','bizi'),
                    'priority'          =>  101,
                ),
                'sidebar_panel' => array(
                    'title'             => esc_html__('Sidebar','bizi'),
                    'description'       => esc_html__('Sidebar Setting','bizi'),
                    'priority'          => 103,
                ),
                'bizi_option_panel' => array(
                    'title'             => esc_html__('Option','bizi'),
                    'description'       => '',
                    'priority'          => 104,
                ),
            );

            $this->customizers = array(
                'title_tagline' => array(
                    'title' => esc_html__('Site Identity', 'bizi'),
                    'priority'  =>  1,
                    'settings' => array(
                        'bizi_logo' => array(
                            'class' => 'image',
                            'label' => esc_html__('Logo', 'bizi'),
                            'description' => esc_html__('Upload Logo Image', 'bizi'),
                            'priority' => 12
                        ),
                    )
                ),
//2.General ============================================================================================================
                'bizi_general' => array(
                    'title' => esc_html__('General', 'bizi'),
                    'description' => '',
                    'priority' => 2,
                    'settings' => array(

                        'bizi_bg_body' => array(
                            'label'         => esc_html__('Background - Body', 'bizi'),
                            'description'   => '',
                            'class'         => 'color',
                            'priority'      => 2,
                            'params'        => array(
                                'default'   => '',
                            ),
                        ),
                        'bizi_primary_body' => array(
                            'label'         => esc_html__('Primary - Color', 'bizi'),
                            'description'   => '',
                            'class'         => 'color',
                            'priority'      => 1,
                            'params'        => array(
                                'default'   => '',
                            ),
                        ),
                    )
                ),
//3.Header =============================================================================================================
                'bizi_header' => array(
                    'title' => esc_html__('Header', 'bizi'),
                    'description' => '',
                    'priority' => 3,
                    'settings' => array(
                        //header
                        'bizi_header_heading' => array(
                            'class' => 'heading',
                            'label' => esc_html__('Header', 'bizi'),
                            'priority' => 0,
                        ),

                        'bizi_header' => array(
                            'class'=> 'layout',
                            'label' => esc_html__('Header Layout', 'bizi'),
                            'priority' =>1,
                            'choices' => array(
                                'simple'                   => get_template_directory_uri().'/assets/images/header/default.png',
                                'center'                   => get_template_directory_uri().'/assets/images/header/center.png',
                                'left'                     => get_template_directory_uri().'/assets/images/header/left.png',

                            ),
                            'params' => array(
                                'default' => 'simple',
                            ),
                        ),

                        'bizi_bg_header' => array(
                            'label'         => esc_html__('Background - Header', 'bizi'),
                            'description'   => '',
                            'class'         => 'color',
                            'priority'      => 5,
                            'params'        => array(
                                'default'   => '',
                            ),
                        ),

                        'bizi_color_menu' => array(
                            'label'         => esc_html__('Color - Text', 'bizi'),
                            'description'   => '',
                            'class'         => 'color',
                            'priority'      => 6,
                            'params'        => array(
                                'default'   => '',
                            ),
                        ),
                    )
                ),
//4.Footer =============================================================================================================
                'bizi_new_section_footer' => array(
                    'title' => esc_html__('Footer', 'bizi'),
                    'description' => '',
                    'priority' => 4,
                    'settings' => array(
                        'bizi_footer' => array(
                            'type' => 'select',
                            'label' => esc_html__('Choose Footer Style', 'bizi'),
                            'description' => '',
                            'priority' => -1,
                            'choices' => array(
                                '1'     => esc_html__('Footer 1', 'bizi'),
                                'hidden' => esc_html__('Hidden Footer', 'bizi')
                            ),
                            'params' => array(
                                'default' => '1',
                            ),
                        ),


                        'bizi_enable_footer' => array(
                            'type' => 'checkbox',
                            'label' => esc_html__('Enable Footer', 'bizi'),
                            'description' => '',
                            'priority' => 0,
                            'params' => array(
                                'default' => '1',
                            ),
                        ),
                        'bizi_enable_copyright' => array(
                            'type' => 'checkbox',
                            'label' => esc_html__('Enable Copyright', 'bizi'),
                            'description' => '',
                            'priority' => 0,
                            'params' => array(
                                'default' => '1',
                            ),
                        ),
                        'bizi_copyright_text' => array(
                            'type' => 'textarea',
                            'label' => esc_html__('Footer Copyright Text', 'bizi'),
                            'description' => '',
                            'priority' => 0,
                        ),

                        'bizi_bg_footer' => array(
                            'label'         => esc_html__('Background - Footer', 'bizi'),
                            'description'   => '',
                            'class'         => 'color',
                            'priority'      => 5,
                            'params'        => array(
                                'default'   => '',
                            ),

                        ),
                        'bizi_color_footer' => array(
                            'label'         => esc_html__('Color - Text ', 'bizi'),
                            'description'   => '',
                            'class'         => 'color',
                            'priority'      => 6,
                            'params'        => array(
                                'default'   => '',
                            ),

                        ),
                    )
                ),

//5.Categories Blog ====================================================================================================
                'bizi_blog' => array(
                    'title' => esc_html__('Blogs Categories', 'bizi'),
                    'description' => '',
                    'priority' => 5,
                    'settings' => array(

                        'bizi_sidebar_cat' => array(
                            'class'         => 'layout',
                            'label'         => esc_html__('Sidebar Layout', 'bizi'),
                            'priority'      =>3,
                            'choices'       => array(
                                'left'         => get_template_directory_uri().'/assets/images/left.png',
                                'right'        => get_template_directory_uri().'/assets/images/right.png',
                                'full'         => get_template_directory_uri().'/assets/images/full.png',
                            ),
                            'params' => array(
                                'default' => 'right',
                            ),
                        ),
                        'bizi_siderbar_cat_info' => array(
                            'class' => 'info',
                            'label' => esc_html__('Info', 'bizi'),
                            'description' => esc_html__( 'Please goto Appearance > Widgets > drop drag widget to the sidebar Article.', 'bizi' ),
                            'priority' => 4,
                        ),
                        //post-layout-cat
                        'bizi_title_cat_heading' => array(
                            'class' => 'heading',
                            'label' => esc_html__('Post Title Category', 'bizi'),
                            'priority' =>5,
                        ),
                        'bizi_post_title_heading' => array(
                            'class' => 'toggle',
                            'label' => esc_html__('Title Category ','bizi'),
                            'priority' => 6,
                            'params' => array(
                                'default' => true,
                            ),
                        ),

                        'bizi_post_cat_layout' => array(
                            'class' => 'heading',
                            'label' => esc_html__('Category layout', 'bizi'),
                            'priority' =>8,
                        ),
                        'bizi_layout_cat_content' => array(
                            'class'         => 'layout',
                            'priority'      =>9,
                            'choices'       => array(
                                'tran'        => get_template_directory_uri().'/assets/images/box-tran.jpg',
                                'grid'        => get_template_directory_uri().'/assets/images/box-grid.jpg',
                                'list'        => get_template_directory_uri().'/assets/images/box-list.jpg',
                            ),
                            'params' => array(
                                'default' => 'list',
                            ),
                        ),
                        'bizi_number_post_cat' => array(
                            'class' => 'slider',
                            'label' => esc_html__('Number post on a row', 'bizi'),
                            'description' => '',
                            'priority' =>10,
                            'choices' => array(
                                'max' => 4,
                                'min' => 1,
                                'step' => 1
                            ),
                            'params'      => array(
                                'default' =>1
                            ),
                        ),
                        //post article content
                        'bizi_post_cat_article' => array(
                            'class' => 'heading',
                            'label' => esc_html__('Post content', 'bizi'),
                            'priority' =>11,
                        ),
                        'bizi_post_entry_content' => array(
                            'class' => 'toggle',
                            'label' => esc_html__('Content ','bizi'),
                            'priority' => 12,
                            'params' => array(
                                'default' => true,
                            ),
                        ),
                        'bizi_number_content_post' => array(
                            'class' => 'slider',
                            'label' => esc_html__('Number of words in the description content', 'bizi'),
                            'description' => '',
                            'priority' =>13,
                            'choices' => array(
                                'max' => 50,
                                'min' => 20,
                                'step' => 5
                            ),
                            'params'      => array(
                                'default' =>50
                            ),
                        ),

                        //post meta
                        'bizi_cat_meta' => array(
                            'class' => 'heading',
                            'label' => esc_html__('Post meta', 'bizi'),
                            'priority' =>13,
                        ),
                        'bizi_post_meta_share' => array(
                            'class' => 'toggle',
                            'label' => esc_html__('Share ','bizi'),
                            'priority' => 14,
                            'params' => array(
                                'default' => false,
                            ),
                        ),
                        'bizi_post_meta_author' => array(
                            'class' => 'toggle',
                            'label' => esc_html__('Author ','bizi'),
                            'priority' => 15,
                            'params' => array(
                                'default' => false,
                            ),
                        ),
                        'bizi_post_meta_date' => array(
                            'class' => 'toggle',
                            'label' => esc_html__('Date ','bizi'),
                            'priority' => 16,
                            'params' => array(
                                'default' => true,
                            ),
                        ),
                        'bizi_post_meta_comment' => array(
                            'class' => 'toggle',
                            'label' => esc_html__('Comment ','bizi'),
                            'priority' => 17,
                            'params' => array(
                                'default' => true,
                            ),
                        ),
                        'bizi_post_meta_view' => array(
                            'class' => 'toggle',
                            'label' => esc_html__('View ','bizi'),
                            'priority' => 18,
                            'params' => array(
                                'default' => true,
                            ),
                        ),
                    ),
                ),
//6.Single blog ========================================================================================================
                'bizi_blog_single' => array(
                    'title' => esc_html__('Blog Single', 'bizi'),
                    'description' => '',
                    'priority' => 6,
                    'settings' => array(
                        'bizi_sidebar_single' => array(
                            'class'         => 'layout',
                            'label'         => esc_html__('Sidebar Layout', 'bizi'),
                            'priority'      =>13,
                            'choices'       => array(
                                'left'         => get_template_directory_uri().'/assets/images/left.png',
                                'right'        => get_template_directory_uri().'/assets/images/right.png',
                                'full'         => get_template_directory_uri().'/assets/images/full.png',
                            ),
                            'params' => array(
                                'default' => 'right',
                            ),
                        ),

                        'bizi_siderbar_single_info' => array(
                            'class' => 'info',
                            'label' => esc_html__('Info', 'bizi'),
                            'description' => esc_html__( 'Please goto Appearance > Widgets > drop drag widget to the sidebar Article.', 'bizi' ),
                            'priority' => 14,
                        ),

                        //share
                        'bizi_single_share' => array(
                            'class' => 'heading',
                            'label' => esc_html__('Share', 'bizi'),
                            'priority' =>19,
                        ),
                        'bizi_share_facebook' => array(
                            'class' => 'toggle',
                            'label' => esc_html__('Share Facebook  ','bizi'),
                            'priority' => 21,
                            'params' => array(
                                'default' => true,
                            ),
                        ),
                        'bizi_share_twitter' => array(
                            'class' => 'toggle',
                            'label' => esc_html__('Share Twitter  ','bizi'),
                            'priority' => 22,
                            'params' => array(
                                'default' => true,
                            ),
                        ),
                        'bizi_share_google' => array(
                            'class' => 'toggle',
                            'label' => esc_html__('Share Google  ','bizi'),
                            'priority' => 23,
                            'params' => array(
                                'default' => true,
                            ),
                        ),

                        'bizi_share_linkedin' => array(
                            'class' => 'toggle',
                            'label' => esc_html__('Share Linkedin  ','bizi'),
                            'priority' => 24,
                            'params' => array(
                                'default' => false,
                            ),
                        ),

                        'bizi_share_pinterest' => array(
                            'class' => 'toggle',
                            'label' => esc_html__('Share Pinterest  ','bizi'),
                            'priority' => 25,
                            'params' => array(
                                'default' => false,
                            ),
                        ),
                        //comments
                        'bizi_single_comments' => array(
                            'class' => 'heading',
                            'label' => esc_html__('Comments', 'bizi'),
                            'priority' =>28,
                        ),
                        'bizi_comments_single_facebook' => array(
                            'class' => 'toggle',
                            'label' => esc_html__('Enable Facebook Comments ','bizi'),
                            'priority' => 29,
                            'params' => array(
                                'default' => false,
                            ),
                        ),
                        'bizi_comments_single' => array(
                            'type'          => 'text',
                            'label'         => esc_html__('Your app id :', 'bizi'),
                            'priority'      => 30,
                            'params'        => array(
                                'default'   => '',
                            ),
                        ),
                        'bizi_comments_single_info' => array(
                            'class' => 'info',
                            'label' => esc_html__('Info', 'bizi'),
                            'description' => esc_html__('If you want show notification on  your facebook , please input app id ...', 'bizi' ),
                            'priority' => 31,
                        ),
                    ),
                ),
//7.Adsense blog ========================================================================================================
                'bizi_ads' => array(
                    'title' => esc_html__('Adsense Setting', 'bizi'),
                    'description' => '',
                    'priority' => 7,
                    'settings' => array(

                        'bizi_ads_rectangle' => array(
                            'type' => 'textarea',
                            'label' => esc_html__(' ADS Size: Large Rectangle', 'bizi'),
                            'description' => '',
                            'priority' => 1,
                        ),
                        'bizi_ads_rectangle_info' => array(
                            'class' => 'info',
                            'label' => esc_html__('Info', 'bizi'),
                            'description' => esc_html__('Add code adsbygoogle with the size is: 250x360,336x280 ,300x250 ...', 'bizi' ),
                            'priority' => 2,
                        ),
                        'bizi_ads_leaderboard' => array(
                            'type' => 'textarea',
                            'label' => esc_html__('ADS Size: Leaderboard', 'bizi'),
                            'description' => 'Add code adsbygoogle with the size is: 468x60 ,728x90, 920x180 ...',
                            'priority' => 3,
                        ),
                        'bizi_heading_ads_single' => array(
                            'class' => 'heading',
                            'label' => esc_html__('Single', 'bizi'),
                            'priority' =>20,
                        ),
                        'bizi_ads_single_article' => array(
                            'class' => 'toggle',
                            'label' => esc_html__('Ads at the end of the article ','bizi'),
                            'priority' => 21,
                            'params' => array(
                                'default' => false,
                            ),
                        ),
                        'bizi_ads_single_comment' => array(
                            'class' => 'toggle',
                            'label' => esc_html__('Ads at the top of the Comment ','bizi'),
                            'priority' => 21,
                            'params' => array(
                                'default' => false,
                            ),
                        ),
                    )
                ),
//Font   ===============================================================================================================
                'bizi_new_section_font_size' => array(
                    'title' => esc_html__('Font', 'bizi'),
                    'priority' => 8,
                    'settings' => array(
                        'bizi_body_font_google' => array(
                            'type'          => 'select',
                            'label'         => esc_html__('Use Google Font', 'bizi'),
                            'choices'       => bizi_googlefont(),
                            'priority'      => 0,
                            'params'        => array(
                                'default'       => 'Roboto',
                            ),

                        ),
                        'bizi_body_font_size' => array(
                            'class' => 'slider',
                            'label' => esc_html__('Font size ', 'bizi'),
                            'description' => '',
                            'priority' =>8,
                            'choices' => array(
                                'max' => 30,
                                'min' => 10,
                                'step' => 1
                            ),
                            'params'      => array(
                                'default' => 16,
                            ),
                        ),
                    )
                ),
//Style  ===============================================================================================================


            );
        }

        public function bizi_customizer_script()
        {
            // Register
            wp_enqueue_style('na-customize', get_template_directory_uri() . '/inc/customize/assets/css/customizer.css', array(),null);
            wp_enqueue_style('jquery-ui', get_template_directory_uri() . '/inc/customize/assets/css/jquery-ui.min.css', array(),null);
            wp_enqueue_script('na-customize', get_template_directory_uri() . '/inc/customize/assets/js/customizer.js', array('jquery'), null, true);
        }

        public function add_customize($customizers) {
            $this->customizers = array_merge($this->customizers, $customizers);
        }


        public function bizi_register_theme_customizer()
        {
            global $wp_customize;

            foreach ($this->customizers as $section => $section_params) {

                //add section
                $wp_customize->add_section($section, $section_params);
                if (isset($section_params['settings']) && count($section_params['settings']) > 0) {
                    foreach ($section_params['settings'] as $setting => $params) {

                        //add setting
                        $setting_params = array();
                        if (isset($params['params'])) {
                            $setting_params = $params['params'];
                            unset($params['params']);
                        }
                        $wp_customize->add_setting($setting, array_merge( array( 'sanitize_callback' => null ), $setting_params));
                        //Get class control
                        $class = 'WP_Customize_Control';
                        if (isset($params['class']) && !empty($params['class'])) {
                            $class = 'WP_Customize_' . ucfirst($params['class']) . '_Control';
                            unset($params['class']);
                        }

                        //add params section and settings
                        $params['section'] = $section;
                        $params['settings'] = $setting;

                        //add controll
                        $wp_customize->add_control(
                            new $class($wp_customize, $setting, $params)
                        );
                    }
                }
            }

            foreach($this->panels as $key => $panel){
                $wp_customize->add_panel($key, $panel);
            }

            return;
        }

        public function remove_default_customize_section()
        {
            global $wp_customize;
//            // Remove Sections
//            $wp_customize->remove_section('title_tagline');
            $wp_customize->remove_section('header_image');
            $wp_customize->remove_section('nav');
            $wp_customize->remove_section('static_front_page');
            $wp_customize->remove_section('colors');
            $wp_customize->remove_section('background_image');
        }
    }
}