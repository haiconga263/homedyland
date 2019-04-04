
<?php if(get_theme_mod('bizi_enable_footer', '1')) { ?>
    <footer id="na-footer" class="na-footer  footer-2">

<!--    Footer center-->
        <?php  if(is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' )){ ?>
            <!--    Footer center-->
            <div class="footer-center clearfix">
                <div class="container">
                    <div class="container-inner">
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <?php dynamic_sidebar('footer-1'); ?>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <?php dynamic_sidebar('footer-2'); ?>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <?php dynamic_sidebar('footer-3'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }?>

<!--    Footer bottom-->
            <div class="footer-bottom clearfix">
                <div class="container">
                    <div class="container-inner">
                        <div class="row">

                            <div class="col-md-12 col-sm-12">
                                    <div class="coppy-right">
                                        <?php if(get_theme_mod('bizi_copyright_text')) {?>
                                            <span><?php echo  wp_kses_post(get_theme_mod('bizi_copyright_text'));?></span>
                                        <?php } else {
                                            echo '<span>'.esc_html('Copyright @').' '.date("Y").' '.esc_html('WordPress  Themes by').' <a href="'.esc_url('http://nanoagency.co').'">'.esc_html('NanoAgency').'</a></span>'.esc_html('. All rights reserved.').'';
                                        } ?>
                                    </div><!-- .site-info -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>


    </footer><!-- .site-footer -->
<?php } ?>