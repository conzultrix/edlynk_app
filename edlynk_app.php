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
    'add_new'               => _x('Add New App', 'apps'),
    'add_new_item'          => __('Add New App'),
    'edit_item'             => __('Edit App'),
    'new_item'              => __('New App'),
    'view_item'             => __('View App'),
    'search_items'          => __('Search in Apps'),
    'not_found'             => __('No App found'),
    'not_found_in_trash'    => __('No Apps found in trash'),
    'parent_item_colon'     => '',
  );
  $args = array(
    'labels'                => $app_label,
    'public'                => true,
    'rewrite'               => array('slug' => 'apps'),
    'menu_postion'          => 5,
    'supports'              => array('title','editor'),
  );
  
  register_post_type('edlynk_app', $args);
    
}

 
// hook into the init action and call create_app_type_taxonomies when it fires
add_action( 'init', 'create_app_type_taxonomies', 0 );

// create taxonomy for app type
function create_app_type_taxonomies() {
    $labels = array(
        'name'              => _x( 'App Types', 'taxonomy general name' ),
        'singular_name'     => _x( 'App Type', 'taxonomy singular name' ),
        'search_items'      => __( 'Search App Types' ),
        'all_items'         => __( 'All App Types' ),
        'most_used_items'   => null,
        'parent_item'       => null,
        'parent_item_colon' => null,
        'edit_item'         => __( 'Edit App Type' ),
        'update_item'       => __( 'Update App Type' ),
        'add_new_item'      => __( 'Add New App Type' ),
        'new_item_name'     => __( 'New App Type Name' ),
        'separate_items_with_commas' => __( 'Separate App Types with commas' ),
        'add_or_remove_items' => __( 'Add or remove App Types' ),
        'choose_from_most_used' => __( 'Choose from the most used app types' ),
        'menu_name'         => __( 'App Type' ),
    );
 
    $args = array(
        'hierarchical'      => false,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'app_type' ),
    );
 
    register_taxonomy( 'app type', array( 'edlynk_app' ), $args );
}

?>
