
    <?php if (has_tag()) { ?>
        <div class="tags-wrap">
            <span class="tags-title"> <?php echo esc_html__('Tags: ','bizi')?></span>
            <span class="tags">
                <?php the_tags(' ', '', ' '); ?>
            </span>
        </div>
    <?php } ?>

