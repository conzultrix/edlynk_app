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


// export custom field
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_edlynk-app',
		'title' => 'edLynk App',
		'fields' => array (
			array (
				'key' => 'field_560fad6f50bb3',
				'label' => 'App Caption',
				'name' => 'app_caption',
				'type' => 'text',
				'instructions' => 'App tag line',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5754239031adc',
				'label' => 'App Banner',
				'name' => 'app_banner',
				'type' => 'image',
				'instructions' => 'Wide image around 1600 x 560 px',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_560fab9850bb2',
				'label' => 'App Image',
				'name' => 'app_image',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_560fade150bb4',
				'label' => 'App Summary',
				'name' => 'app_summary',
				'type' => 'textarea',
				'instructions' => 'Summarise key feature or benefits in 150 characters',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_575428687b9c8',
				'label' => 'Key Features',
				'name' => 'key_features',
				'type' => 'wysiwyg',
				'instructions' => 'A formatted list of key benefits',
				'default_value' => '',
				'toolbar' => 'basic',
				'media_upload' => 'no',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'edlynk_app',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

?>
