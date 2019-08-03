<?php
/**
* LibCal For WordPress - uninstall functions
* These run when the plugin is deleted
**/

function libcal_for_wordpress_plugin_uninstall() {
  if( !defined('WP_INSTALL_PLUGIN')) exit();
  global $wpdb;
  $prefix = $wpdb->prefix;

  $credentials = $prefix.'lcwp_account_info';
  $event_list = $prefix.'lcwp_event_list';

  $wpdb->query("DROP TABLE IF EXISTS $credentials");
  $wpdb->query("DROP TABLE IF EXISTS $event_list");
}

register_uninstall_hook(__FILE__, 'libcal_for_wordpress_plugin_uninstall');
?>
