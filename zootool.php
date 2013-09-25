<?php
      // Epic Monkeez - ZOO WIDGET v.1
      // http://epicmonkeez.com

class Zootool_Widget_Framework extends WP_Widget {
      function Zootool_Widget_Framework() {
      $widget_ops = array('classname' => 'zootool_widget_framework', 'description' => __( 'Epic Monkeez - 
      Zootool v.1.0') );
      $this->WP_Widget('zootool_widget_framework', __('ZOZ Framework - Zootool v.1.0'), $widget_ops);
      }

 function widget($args, $instance) { 
      extract( $args );
      $default = array('widget_title' => __('Latest from Zootool','epicmonkeez'), 'id' => '', 'qty' => 9 ); 
      $instance = wp_parse_args($instance, $default); 
      $widget_title = $instance['widget_title'];
      $id = $instance['id'];
      $qty = $instance['qty'];
      $size = $instance['size'];

     // WIDGET OUTPUT
      echo $before_widget;
      ?>
  <?php if(!empty($widget_title)){ echo "<h3 id=\"zoo_title\">" .$widget_title. "</h3>" ;} ?>
  <div id="zootool-badge">
	  <script type="text/javascript">
	      var url = 'http://zootool.com/badge/<?php echo $id; ?>/?count=<?php echo $qty; ?>&size=<?php echo $size; ?>';
	      (function() {
		      var zb = document.createElement('script');
		      zb.src = url;
		      zb.setAttribute('async', 'true');
		      document.documentElement.firstChild.appendChild(zb);
	      })();
	  </script>
	  <p><a rel="nofollow" class="zoo thumbnail" href="http://www.zoo.com/photos/<?php echo $id; ?>/">More Zoo Pages</a></p>
  </div>

  <?php echo $after_widget; 
      }

function update($new_instance, $old_instance) { 
	      $instance = $old_instance;
	      $instance['widget_title'] = strip_tags($new_instance['widget_title']);
	      $instance['id'] = $new_instance['id'];
	      $instance['qty'] = $new_instance['qty'];
	      $instance['size'] = $new_instance['size'];
	      return $instance;
      }

function form($instance) {
	      $default = array('widget_title' => __('Latest from Zootool','epicmonkeez'), 'id' => '', 'qty' => 9 );
	      $instance = wp_parse_args($instance, $default);
	      $widget_title = $instance['widget_title'];
	      $id = $instance['id'];
	      $size = $instance['size'];
	      $qty = $instance['qty'];
      ?>

  <input style="display:none;" type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />

  <p>Widget title: <input class="widefat" type="text" name="<?php echo $this->get_field_name('widget_title'); ?>" value="<?php echo $widget_title; ?>" /></p>
  
  <p>Enter ID of your Zootool account: <input class="widefat" type="text" name="<?php echo $this->get_field_name('id'); ?>" value="<?php echo $id; ?>&quot; /></p>

  <p>Enter the size of the media thumbnails: <input class="widefat" type="text" name="<?php echo $this->get_field_name('size'); ?>" value="<?php echo $size; ?>&quot; /> </p>

  <p>Display up to: <input class="widefat" type="text" name="<?php echo $this->get_field_name('qty'); ?>" value="<?php echo $qty; ?>" /> pages.</p>
  <?php
      }
}

add_action('widgets_init', create_function('', 'return register_widget("Zootool_Widget_Framework");'));
?>
