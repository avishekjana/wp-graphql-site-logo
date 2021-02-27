<?php
/**
* Plugin Name: WPGraphQL Site Logo
* Description: Adds WPGraphQL to Site Logo
* Author: Avishek Jana
* Version: 1.0
*/

add_action( 'graphql_register_types', 'extend_wpgraphql_schema_for_site_logo' );

function extend_wpgraphql_schema_for_site_logo() {
  register_graphql_field( 'RootQuery', 'siteLogoUrl', [
    'type' => 'String',
    'description' => __( 'This field will export site logo', 'your-textdomain' ),
    'resolve' => function() {
       return get_logo();
    }
  ] );
};

function get_logo() {
  $output = null;
  if (has_custom_logo()) {
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $logo_meta = wp_get_attachment_image_src($custom_logo_id,'full');
		$output = $logo_meta[0];
  }
  return $output;
}

?>