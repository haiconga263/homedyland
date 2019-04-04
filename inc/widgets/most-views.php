<?php
/**
 * @package     bizi
 * @version     1.0
 * @author      NanoAgency
 * @link        http://www.nanoagency.co
 * @copyright   Copyright (c) 2016 NanoAgency
 * @license     GPL v2
 */
class bizi_most_views extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'bizi_most_views',__('+NA: Most Views','bizi'),
            array('description'=>__(' Most Views', 'bizi'))
        );
    }

    public function widget( $args, $instance ) {
        extract( $args );
        $posts = $instance['posts'];
        $title = apply_filters('widget_title', $instance['title']);
    ?> <aside class="widget widget_most_views">
            <?php if($title) {
                echo ent2ncr($args['before_title']) . esc_html($title) . ent2ncr($args['after_title']);
            }?>
            <div class="most-views-content">
            <?php
            $popular_posts = new WP_Query('showposts='.$posts.'&meta_key=post_views_count&orderby=meta_value_num&order=DESC');
            $j=1;
            if($popular_posts->have_posts()):
                ?>
                <div class="post-widget  posts-listing">
                    <?php while($popular_posts->have_posts()): $popular_posts->the_post(); ?>
                        <article class="post media ">
                                    <div class="post-thumb pull-left">
                                        <span class="post-cat"><?php echo bizi_category(' '); ?></span>
                                        <?php if ( has_post_thumbnail() ) {?>
                                            <a href="<?php the_permalink(); ?>" title="">
                                                <?php the_post_thumbnail('bizi-widget-recent');?>
                                            </a>
                                        <?php }?>
                                    </div>
                                    <div class="post-content  media-body">
                                        <h3 class="entry-title">
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </h3>
                                        <div class="entry-meta">
                                            <span class="post-date">
                                                <span class="date"><?php echo get_the_date('M d, Y'); ?></span>
                                            </span>
                                        </div>
                                    </div>
                        </article>
                        <?php ?>
                    <?php endwhile;   wp_reset_postdata();?>
                </div>
            <?php endif; ?>
        </div>
        </aside>
        <?php
        echo ent2ncr($args['after_widget']);;
    }
// Widget Backend
    public function form( $instance ) {
        $instance = wp_parse_args($instance,array(
            'title'       =>  'Most Views',
            'posts' => 3,
        ));
        // Widget admin form
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                <strong><?php esc_html_e('Title', 'bizi') ?>:</strong>
                <input type="text" class="agencyfat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                       name="<?php echo esc_attr($this->get_field_name('title')); ?>"
                       value="<?php if (isset($instance['title'])) echo esc_attr($instance['title']); ?>"/>
            </label>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('posts')); ?>"><?php echo esc_html__('Number of Most Views posts:', 'bizi' ); ?></label>
            <input class="agencyfat" type="text"  id="<?php echo esc_attr($this->get_field_id('posts')); ?>" name="<?php echo esc_attr($this->get_field_name('posts')); ?>" value="<?php echo esc_attr($instance['posts']); ?>" />
        </p>
    <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['posts'] = $new_instance['posts'];
        return $instance;

    }
}
function bizi_most_views(){
    register_widget('bizi_most_views');
}
add_action('widgets_init','bizi_most_views');
