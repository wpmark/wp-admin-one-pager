<?php
/*
Plugin Name: WP Admin 1 Pager
Plugin URI: https://github.com/wpmark/
Description: Admin customisations for a 1 page WordPress website. Uses the <a href="https://wordpress.org/plugins/wpbasis/">WP Basis plugin</a> to provide some basic admin alterations.
Author URI: http://markwilkinson.me
Version: 0.1

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

*/
/* exist if directly accessed */
if( ! defined( 'ABSPATH' ) ) exit;

/* define variable for path to this plugin file. */
define( 'WPAOP_LOCATION', dirname( __FILE__ ) );
define( 'WPAOP_LOCATION_URL', plugins_url( '', __FILE__ ) );

/**
 * include the necessary functions file for the plugin
 */
require_once dirname( __FILE__ ) . '/inc/admin.php';
require_once dirname( __FILE__ ) . '/inc/menus.php';
require_once dirname( __FILE__ ) . '/inc/meta-boxes.php';

/* check whether the metabox class already exists - and load it if not */
if( ! class_exists( 'CMB_Meta_Box' ) ) {
	require_once( dirname( __FILE__ ) . '/inc/cmb/custom-meta-boxes.php' );
}