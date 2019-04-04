<?php
/**
 * @package     bizi
 * @version     1.0
 * @author      NanoAgency
 * @link        http://www.nanoagency.co
 * @copyright   Copyright (c) 2016 NanoAgency
 * @license     GPL v2
 */

class bizi_featured_post extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'featured_post',__('+NA: Most Popular Post','bizi'),
            array('description'=>__('Most Popular Post', 'bizi'))
        );
    }

    public function widget( $args, $instance ) {
        extract( $args );
        $number = $instance['number'];
        $title = apply_filters('widget_title', $instance['title']);
        $arr = array(
            'showposts'   => $number,
            'post_type'     => 'post',
            'post_status'   => 'publish',
            'meta_key'      => '_featured',
            'meta_value'    => 'yes',
            'orderby'       => 'date',
            'order'         => 'DESC'
        );
        $popular_posts = new WP_Query( $arr );

        echo ent2ncr($args['before_widget']);
        if($title) {
            echo ent2ncr($args['before_title']) . esc_html($title) . ent2ncr($args['after_title']);
        }
        ?>

        <!-- Tab panes -->
        <div class="article-content">
                <div class="featured-post">
                    <?php
                    if($popular_posts->have_posts()): ?>
                            <?php while($popular_posts->have_posts()): $popular_posts->the_post(); ?>
                                <?php get_template_part( 'templates/layout/content-sidebar'); ?>
                            <?php endwhile; ?>
                    <?php endif; ?>
                </div>
        </div>
        <?php
        echo ent2ncr($args['after_widget']);
    }
// Widget Backend
    public function form( $instance ) {
        $instance = wp_parse_args($instance,array(
            'title' => 'Most Popular',
            'number' => '5'
        ));
        // Widget admin form
        ?>
        <p>
            <label for=<?php echo esc_attr($this->get_field_id('title')); ?>><?php echo esc_html_e('Title:','bizi') ; ?></label>
            <input type="text" id="<?php echo esc_attr($this->get_field_id('title')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php echo esc_html_e('Number posts:','bizi'); ?></label>
            <input type="text" id="<?php echo esc_attr($this->get_field_id('number')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('number')); ?>" value="<?php echo esc_attr($instance['number']); ?>" />
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['number'] = $new_instance['number'];
        return $instance;
    }
}
function bizi_featured_post(){
    register_widget('bizi_featured_post');
}
add_action('widgets_init','bizi_featured_post');