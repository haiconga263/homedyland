<div class="post-author">

    <div class="author-img">
        <?php echo get_avatar( get_the_author_meta('email'), '120' ); ?>
    </div>

    <div class="author-content">
        <div class="top-author">
            <h5><?php the_author_posts_link(); ?></h5>
            <div class="content-social-author">
                <?php if(get_the_author_meta('facebook')) : ?><a target="_blank" class="author-social" href="<?php echo esc_url('http://facebook.com/');?><?php echo the_author_meta('facebook'); ?>"><i class="ti-facebook"></i></a><?php endif; ?>
                <?php if(get_the_author_meta('twitter')) : ?><a target="_blank" class="author-social" href="<?php echo esc_url('http://twitter.com/');?><?php echo the_author_meta('twitter'); ?>"><i class="ti-twitter-alt"></i></a><?php endif; ?>
                <?php if(get_the_author_meta('instagram')) : ?><a target="_blank" class="author-social" href="<?php echo esc_url('http://instagram.com/');?><?php echo the_author_meta('instagram'); ?>"><i class="ti-instagram"></i></a><?php endif; ?>
                <?php if(get_the_author_meta('google')) : ?><a target="_blank" class="author-social" href="<?php echo esc_url('http://plus.google.com/');?><?php echo the_author_meta('google'); ?>?rel=author"><i class="ti-google"></i></a><?php endif; ?>
                <?php if(get_the_author_meta('pinterest')) : ?><a target="_blank" class="author-social" href="<?php echo esc_url('http://pinterest.com/');?><?php echo the_author_meta('pinterest'); ?>"><i class="ti-pinterest"></i></a><?php endif; ?>
            </div>
        </div>
        <p><?php the_author_meta('description'); ?></p>
    </div>

</div>