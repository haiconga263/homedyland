<?php
 /* *
  * widgets contact info
  **/
  class bizi_contact_info extends WP_Widget{

      /*function construct*/
      public function __construct() {
          parent::__construct(
            'contact_info',__('+NA: Contact info','bizi'),
             array('description'=>__('Display Contact info', 'bizi'))
          );
      }
      /**
       * font-end widgets
      */
      public function widget($args, $instance) {
          extract($args);
          $title = apply_filters('widget_title', $instance['title']);

          echo ent2ncr($args['before_widget']);

          if($title) {
              echo ent2ncr($args['before_title']) . esc_html($title) . ent2ncr($args['after_title']);
          }

      ?>
          <?php if($instance['description']): ?>
              <p>
                  <span><?php echo esc_attr($instance['description']); ?></span>
              </p>
          <?php endif; ?>

          <ul class="contact-info">
                <?php  if($instance['address']): ?>
                <li>
                    <b><?php  echo esc_html('Address: ','bizi');  ?></b>
                    <span><?php  echo esc_attr($instance['address']);  ?></span>
                </li>
                <?php  endif; ?>

                <?php if($instance['mobile']): ?>
                  <li>
                      <b><?php  echo esc_html('Mobile: ','bizi');  ?></b>
                      <span><?php   echo esc_attr($instance['mobile']);  ?></span>
                  </li>

                <?php endif; ?>
                <?php if($instance['phone']): ?>
                  <li>
                      <b><?php  echo esc_html('Phone: ','bizi');  ?></b>
                      <span><?php   echo esc_attr($instance['phone']);  ?></span>
                  </li>

                <?php endif; ?>

                <?php if($instance['skype']): ?>
                    <li>
                        <b><?php  echo esc_html('Skype: ','bizi');  ?></b>
                        <a href="skype:<?php echo esc_attr($instance['skype']);?>?chat" ><span><?php echo esc_attr($instance['skype']); ?></span></a>
                    </li>
                <?php endif; ?>

                <?php if($instance['email']): ?>
                    <li>
                        <b><?php  echo esc_html('Email: ','bizi');  ?></b>
                        <a href="mailto:<?php echo esc_attr($instance['email']);?>" ><span><?php echo esc_attr($instance['email']); ?></span></a>
                    </li>
                <?php endif; ?>
          </ul>

      <?php
          echo ent2ncr($args['after_widget']);
      }

      /**
       * Back-end widgets form
      */
      public function form($instance){
          $instance =   wp_parse_args($instance,array(
              'title'       =>  'Contact info',
              'address'     =>  '',
              'phone'       =>  '',
              'mobile'      =>  '',
              'skype'       =>  '',
              'email'       =>  '',
              'description' =>'',
          ));
          ?>
          <p>
              <label for=<?php echo esc_attr($this->get_field_id('title')); ?>><?php echo esc_html_e('Title:','bizi') ; ?></label>
              <input type="text" id="<?php echo esc_attr($this->get_field_id('title')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
          </p>
          <p>
              <label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php echo esc_html_e('Address:','bizi'); ?></label>
              <input type="text" id="<?php echo esc_attr($this->get_field_id('address')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('address')); ?>" value="<?php echo esc_attr($instance['address']); ?>" />
          </p>
          <p>
              <label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php echo esc_html_e( 'Phone:', 'bizi' ); ?></label>
              <input type="text" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" value="<?php echo esc_attr($instance['phone']); ?>" />
          </p>
          <p>
              <label for="<?php echo esc_attr($this->get_field_id('mobile')); ?>"><?php echo esc_html_e( 'Mobile:', 'bizi' ); ?></label>
              <input type="text" id="<?php echo esc_attr($this->get_field_id('mobile')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('mobile')); ?>" value="<?php echo esc_attr($instance['mobile']); ?>" />
          </p>
          <p>
              <label for="<?php echo esc_attr($this->get_field_id('skype')); ?>"><?php echo esc_html_e('Skype:', 'bizi'); ?></label>
              <input type="text" id="<?php echo esc_attr($this->get_field_id('skype')); ?>" name="<?php echo esc_attr($this->get_field_name('skype')); ?>" class="widefat" value="<?php echo esc_attr($instance['skype']); ?>" />
          </p>
          <p>
              <label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php echo esc_html_e('Email:', 'bizi'); ?></label>
              <input type="text" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" class="widefat" value="<?php echo esc_attr($instance['email']); ?>" />
          </p>

          <!-- description -->
          <p>
              <label for="<?php echo esc_attr($this->get_field_id( 'description' )); ?>"><?php echo esc_html_e('About me text::', 'bizi'); ?></label>
              <textarea id="<?php echo esc_attr($this->get_field_id( 'description')); ?>" name="<?php echo esc_attr($this->get_field_name( 'description' )); ?>" rows="6"><?php echo esc_attr($instance['description']); ?></textarea>
          </p>


      <?php
      }

      /**
      * function update widget
      */
      public function update( $new_instance, $old_instance ) {
          $instance = $old_instance;
          $instance['title'] = $new_instance['title'];
          $instance['address'] = $new_instance['address'];
          $instance['phone']    =   $new_instance['phone'];
          $instance['mobile'] = $new_instance['mobile'];
          $instance['skype'] = $new_instance['skype'];
          $instance['email']    =   $new_instance['email'];
          $instance['description']    =   $new_instance['description'];
          return $instance;
      }
  }
  function bizi_contact_info(){
      register_widget('bizi_contact_info');
  }
  add_action('widgets_init','bizi_contact_info');
?>