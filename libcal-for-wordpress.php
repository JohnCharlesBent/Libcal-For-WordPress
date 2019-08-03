<?php
/**
* Plugin Name: LibCal For WordPress
* Plugin URI:
* Description: Integrate events from your LibCal event calendar into your WordPress site. This plugin uses the LibCal API to pull out event data and display it in a variety of different displays.
* Version: 1.2
* Author: John Charles Bent
* Author URI: https://johncharlesbent.com
* License: GPL v2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

function libcal_for_wordpress_install() {

  global $wpdb, $wnm_db_version;

  require_once( ABSPATH . 'wp-admin/includes/upgrade.php');

  $charset_collate = $wpdb->get_charset_collate();
  $prefix = $wpdb->prefix;

  // table to hold some basic data
  $credentials = $prefix.'lcwp_account_info';
 // table to hold event list information
  $event_list = $prefix.'lcwp_event_list';

 $sql = "CREATE TABLE IF NOT EXISTS $credentials (
   id int(9) NOT NULL AUTO_INCREMENT,
   lc_id varchar(250) NOT NULL,
   lc_key int(9) NOT NULL,
   lc_api_id varchar(250) NOT NULL,
   PRIMARY KEY (id)
 ) $charset_collate;";

 dbDelta($sql);

 $sql = "CREATE TABLE IF NOT EXISTS $event_list (
   id int(9) NOT NULL AUTO_INCREMENT,
   feed_name varchar(250) NOT NULL,
   event_id int(9) NOT NULL,
   event_title varchar(250) NOT NULL,
   PRIMARY KEY (id)
 ) $charset_collate;";

 dbDelta($sql);

}

register_activation_hook(__FILE__, 'libcal_for_wordpress_install');
