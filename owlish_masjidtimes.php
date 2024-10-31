<?php
/**
 * @package Owlish_Masjidtimes
 * @version 1.0
 */
/*
Plugin Name: Owlish Masjid Prayer Times
Plugin URI: http://codingowl.net/freebies/owlish-masjid-prayer-times-wordpress-plugin/
Description: Displays prayer times from fajr to isha in a lightweight plugin. Times are entered directly in the widget. Fully translatable!
Author: codingOwl
Version: 1.0
Author URI: http://codingowl.net
*/

class ow_masjidptimes_plugin extends WP_Widget {
	function ow_masjidptimes_plugin() {
        parent::__construct(false, 'Owlish Masjid Prayer Times ', array('description' => 'Widget to display times when prayer is offered in the masjid'));
	}
    function form($instance) {
        if($instance) {
            //set 
            $owmp_title = esc_attr($instance['owmp_title']);
            $owmp_labels_fajr = esc_attr($instance['owmp_labels_fajr']);
            $owmp_labels_dhuhr = esc_attr($instance['owmp_labels_dhuhr']);
            $owmp_labels_asr = esc_attr($instance['owmp_labels_asr']);
            $owmp_labels_maghrib = esc_attr($instance['owmp_labels_maghrib']);
            $owmp_labels_isha = esc_attr($instance['owmp_labels_isha']);
            $owmp_times_fajr = esc_attr($instance['owmp_times_fajr']);
            $owmp_times_dhuhr = esc_attr($instance['owmp_times_dhuhr']);
            $owmp_times_asr = esc_attr($instance['owmp_times_asr']);
            $owmp_times_maghrib = esc_attr($instance['owmp_times_maghrib']);
            $owmp_times_isha = esc_attr($instance['owmp_times_isha']);            
            $owmp_copyright = esc_attr($instance['owmp_copyright']);
        } else {
            //set default values if nothing set
            $owmp_title = '';
            $owmp_labels_fajr = 'Fajr';
            $owmp_labels_dhuhr = 'Dhuhr';
            $owmp_labels_asr = 'Asr';
            $owmp_labels_maghrib = 'Maghrib';
            $owmp_labels_isha = 'Isha';
            $owmp_times_fajr = '5am';
            $owmp_times_dhuhr = '1pm';
            $owmp_times_asr = '4pm';
            $owmp_times_maghrib = '7pm';
            $owmp_times_isha = '9pm';            
            $owmp_copyright = '';
        }
        //echo widget settings
        ?>
        <p>
        <label for="<?php echo $this->get_field_id('owmp_title'); ?>"><?php _e('Widget Title', 'owmp_widget_plugin'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('owmp_title'); ?>" name="<?php echo $this->get_field_name('owmp_title'); ?>" type="text" value="<?php echo $owmp_title; ?>" />
        </p>
        <p><?php _e('Translation - Time', 'owmp_widget_plugin'); ?>
        <p>
        <input id="<?php echo $this->get_field_id('owmp_labels_fajr'); ?>" name="<?php echo $this->get_field_name('owmp_labels_fajr'); ?>" type="text" value="<?php echo $owmp_labels_fajr; ?>" />
        <input id="<?php echo $this->get_field_id('owmp_times_fajr'); ?>" name="<?php echo $this->get_field_name('owmp_times_fajr'); ?>" type="text" value="<?php echo $owmp_times_fajr; ?>" />
        </p> 
        <p>
        <input id="<?php echo $this->get_field_id('owmp_labels_dhuhr'); ?>" name="<?php echo $this->get_field_name('owmp_labels_dhuhr'); ?>" type="text" value="<?php echo $owmp_labels_dhuhr; ?>" />
        <input id="<?php echo $this->get_field_id('owmp_times_dhuhr'); ?>" name="<?php echo $this->get_field_name('owmp_times_dhuhr'); ?>" type="text" value="<?php echo $owmp_times_dhuhr; ?>" />
        </p> 
        <p>
        <input id="<?php echo $this->get_field_id('owmp_labels_asr'); ?>" name="<?php echo $this->get_field_name('owmp_labels_asr'); ?>" type="text" value="<?php echo $owmp_labels_asr; ?>" />
        <input id="<?php echo $this->get_field_id('owmp_times_asr'); ?>" name="<?php echo $this->get_field_name('owmp_times_asr'); ?>" type="text" value="<?php echo $owmp_times_asr; ?>" />
        </p> 
        <p>
        <input id="<?php echo $this->get_field_id('owmp_labels_maghrib'); ?>" name="<?php echo $this->get_field_name('owmp_labels_maghrib'); ?>" type="text" value="<?php echo $owmp_labels_maghrib; ?>" />
        <input id="<?php echo $this->get_field_id('owmp_times_maghrib'); ?>" name="<?php echo $this->get_field_name('owmp_times_maghrib'); ?>" type="text" value="<?php echo $owmp_times_maghrib; ?>" />
        </p> 
        <p>
        <input id="<?php echo $this->get_field_id('owmp_labels_isha'); ?>" name="<?php echo $this->get_field_name('owmp_labels_isha'); ?>" type="text" value="<?php echo $owmp_labels_isha; ?>" />
        <input id="<?php echo $this->get_field_id('owmp_times_isha'); ?>" name="<?php echo $this->get_field_name('owmp_times_isha'); ?>" type="text" value="<?php echo $owmp_times_isha; ?>" />
        </p>
        <p>
        <input id="<?php echo $this->get_field_id('owmp_copyright'); ?>" name="<?php echo $this->get_field_name('owmp_copyright'); ?>" type="checkbox" value="1" <?php checked( '1', $owmp_copyright ); ?> />
        <label for="<?php echo $this->get_field_id('owmp_copyright'); ?>"><?php _e('Display link back to codingowl.net<br /><small>(Barakallahu fiikum for your support!)</small>', 'owmp_widget_plugin'); ?></label>
        </p>
        <?php
    }
    
    function update($new_instance, $old_instance) {
        //update widget options
        $instance = $old_instance;
        $instance['owmp_title'] = strip_tags($new_instance['owmp_title']);
        $instance['owmp_labels_fajr'] = strip_tags($new_instance['owmp_labels_fajr']);
        $instance['owmp_labels_dhuhr'] = strip_tags($new_instance['owmp_labels_dhuhr']);
        $instance['owmp_labels_asr'] = strip_tags($new_instance['owmp_labels_asr']);
        $instance['owmp_labels_maghrib'] = strip_tags($new_instance['owmp_labels_maghrib']);
        $instance['owmp_labels_isha'] = strip_tags($new_instance['owmp_labels_isha']);
        
        $instance['owmp_times_fajr'] = strip_tags($new_instance['owmp_times_fajr']);
        $instance['owmp_times_dhuhr'] = strip_tags($new_instance['owmp_times_dhuhr']);
        $instance['owmp_times_asr'] = strip_tags($new_instance['owmp_times_asr']);
        $instance['owmp_times_maghrib'] = strip_tags($new_instance['owmp_times_maghrib']);
        $instance['owmp_times_isha'] = strip_tags($new_instance['owmp_times_isha']);        
        
        $instance['owmp_copyright'] = strip_tags($new_instance['owmp_copyright']);
        return $instance;
    }

	function widget($args, $instance) {
    //retrieve values
    extract( $args );
    $owmp_title = apply_filters('widget_title', $instance['owmp_title']);
    $owmp_labels_fajr = $instance['owmp_labels_fajr'];
    $owmp_labels_dhuhr = $instance['owmp_labels_dhuhr'];
    $owmp_labels_asr = $instance['owmp_labels_asr'];
    $owmp_labels_maghrib = $instance['owmp_labels_maghrib'];
    $owmp_labels_isha = $instance['owmp_labels_isha'];
    
    $owmp_times_fajr = $instance['owmp_times_fajr'];
    $owmp_times_dhuhr = $instance['owmp_times_dhuhr'];
    $owmp_times_asr = $instance['owmp_times_asr'];
    $owmp_times_maghrib = $instance['owmp_times_maghrib'];
    $owmp_times_isha = $instance['owmp_times_isha'];    
    
    $owmp_copyright = $instance['owmp_copyright'];
    /**************************
    *   Widget output
    **************************/
    echo $before_widget;
    echo '<div class="widget-text owmp_widget_plugin_box">';
    echo $before_title . $owmp_title . $after_title; ?>
    <div class="owmp_prayertimes">
        <?php if (!$owmp_labels_fajr == '' && !$owmp_times_fajr == '') { ?>
        <div class="owmp_label"><?php echo $owmp_labels_fajr; ?></div>
        <div class="owmp_value"><?php echo $owmp_times_fajr; ?></div>
        <?php } 
        if (!$owmp_labels_dhuhr == '' && !$owmp_times_dhuhr == '') {?>
        <div class="owmp_label"><?php echo $owmp_labels_dhuhr; ?></div>
        <div class="owmp_value"><?php echo $owmp_times_dhuhr; ?></div>
        <?php } 
        if (!$owmp_labels_asr == '' && !$owmp_times_asr == '') {?>
        <div class="owmp_label"><?php echo $owmp_labels_asr; ?></div>
        <div class="owmp_value"><?php echo $owmp_times_asr; ?></div>
        <?php } 
        if (!$owmp_labels_maghrib == '' && !$owmp_times_maghrib == '') {?>
        <div class="owmp_label"><?php echo $owmp_labels_maghrib; ?></div>
        <div class="owmp_value"><?php echo $owmp_times_maghrib; ?></div>
        <?php } 
        if (!$owmp_labels_isha == '' && !$owmp_times_isha == '') {?>
        <div class="owmp_label"><?php echo $owmp_labels_isha; ?></div>
        <div class="owmp_value"><?php echo $owmp_times_isha; ?></div>
        <?php } ?>
        <div class="owmp_clearer"></div>
        <?php 
        //display wished copyright notice
        if( $owmp_copyright AND $owmp_copyright == '1' ) {
            echo '<small class="owmp_copyright">Masjid Prayer Times by <a href="http://codingowl.net" target="_blank">Coding Owl Designs</a></small>';
        }
    ?>
    </div>
    <?php
    echo '</div>'; //closing tag
    echo $after_widget;
	}
}
function add_owmp_css() {
    //add CSS file to style
    wp_register_style('add_owmp_css', plugins_url('style.css',__FILE__ ));
    wp_enqueue_style('add_owmp_css');
}
add_action( 'wp_enqueue_scripts','add_owmp_css');
add_action('widgets_init', create_function('', 'return register_widget("ow_masjidptimes_plugin");'));
?>