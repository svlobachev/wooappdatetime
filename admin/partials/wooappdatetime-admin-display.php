<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       lobachev.xyz
 * @since      1.0.0
 *
 * @package    Wooappdatetime
 * @subpackage Wooappdatetime/admin/partials
 */
class Wooappdatetime_content{

    function settings(){
        echo "Hello my Settings!<br />";
        echo get_user_locale();
    }

    function gopro(){
        echo "Hello my GoPro!";
    }

    function content(){
        //$url = plugin_dir_url( __DIR__ ).'/img/wooappdate-calendar.png';
        //echo"<img src='$url' id='datetimepicker' width='40'>";
        echo "<span  title='".esc_html__( 'Datetimepicker', 'wooappdatetime')."' id='datetimepicker' class='btn'><i class='dashicons dashicons-calendar-alt'></i></span>";
        echo "<span  title='".esc_html__( 'Repeat Schedule', 'wooappdatetime')."' id='' class='btn'><i class='dashicons dashicons-image-rotate'></i></span>";
        echo "<span  title='".esc_html__( 'Settings', 'wooappdatetime')."' id='' class='btn'><i class='dashicons dashicons-admin-generic'></i></span>";
        echo "<span  title='".esc_html__( 'Go to pro', 'wooappdatetime')."' id='' class='btn'><i class='dashicons dashicons-privacy'></i></span>";
    }

    function ajax_response(){
        global $json; // this is how you get access to the database
        $json = $_POST['json'];
        echo $json;
        wp_die(); // this is required to terminate immediately and return a proper response
    }
}
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
