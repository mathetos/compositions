<?php
/**
  * Plugin Name: Compositions CPT with CMB2
  * Plugin URI: https://www.mattcromwell.com/custom-meta-box-comparison
  * Description: A simple Custom Post Type to display musical compositions, done with CMB2. This was created as a comparison of several popular Custom MetaBox libraries.
  * Author: Matt Cromwell
  * Version: 1.0
  * Author URI: https://www.mattcromwell.com
  * Text Domain: compositions
  * Domain Path: /languages
  *
 **/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

// Defines Addon directory for easy reference
if ( ! defined( 'COMPOSITIONS_DIR' ) ) {
    define( 'COMPOSITIONS_DIR', dirname(__FILE__) );
}

/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */

add_action( 'init', 'compositions_load_textdomain' );

function compositions_load_textdomain() {
    load_plugin_textdomain( 'compositions', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

/**
 * Include CMB2
 */
if ( file_exists(  COMPOSITIONS_DIR . '/lib/cmb2/init.php' ) ) {
    require_once  COMPOSITIONS_DIR . '/lib/cmb2/init.php';
} elseif ( file_exists(  COMPOSITIONS_DIR . '/lib/CMB2/init.php' ) ) {
    require_once  COMPOSITIONS_DIR . '/lib/CMB2/init.php';
}

/**
 * Register CPT
 */
if ( file_exists(  COMPOSITIONS_DIR . '/inc/register_cpt.php' ) )
    require_once  COMPOSITIONS_DIR . '/inc/register_cpt.php';

/**
 * Add Meta Fields Compositions CPT
 */
if ( file_exists(  COMPOSITIONS_DIR . '/inc/add_meta_fields.php' ) )
    require_once  COMPOSITIONS_DIR . '/inc/add_meta_fields.php';

/**
 * Add Metadata to Compositions CPT
 */
if ( file_exists(  COMPOSITIONS_DIR . '/inc/add_meta_to_post.php' ) )
    require_once  COMPOSITIONS_DIR . '/inc/add_meta_to_post.php';



