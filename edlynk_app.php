<?php
/*
Plugin Name: edLynk App
Plugin URI:  https://github.com/conzultrix/edlynk_app
Description: Creates custome post type for edlynk apps.
Version:     0.1
Author:      Conzultrix
Author URI:  http://www.conzultrix.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
GitHub Plugin URI: https://github.com/conzultrix/edlynk_app
GitHub Branch:     master
*/

defined( 'ABSPATH' ) or die( ' ' );

add_action( 'init', 'create_app_post_type' );

function create_app_post_type() {
  
  $app_label = array(
    'name'                  => __('Apps'),
    'singular_name'         => __('App'),
    'all_items'             => __('All Apps'),
    'add_new'               => _x('Add new app', 'apps'),
    'add_new_item'          => __('Add new app'),
    'edit_item'             => __('Edit app'),
    'new_item'              => __('New app'),
    'view_item'             => __('View app'),
    'search_items'          => __('Search in apps'),
    'not_found'             => __('No app found'),
    'not_found_in_trash'    => __('No apps found in trash'),
    'parent_item_colon'     => '',
  );
  $args = array(
    'labels'                => $app_label,
    'public'                => true,
    'rewrite'               => array('slug' => 'apps'),
    'menu_postion'          => 5,
    'supports'              => array('title','editor', 'thumbnail', 'custom-fields'),
  );
  
  register_post_type('edlynk_app', $args);
    
}
