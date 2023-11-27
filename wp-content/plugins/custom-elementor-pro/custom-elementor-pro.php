<?php
/**
 * Plugin Name: Custom Elementor Pro
 * Description: Elevate your designs and unlock the full power of Elementor. Gain access to dozens of Pro widgets and kits, Theme Builder, Pop Ups, Forms and WooCommerce building capabilities.
 * Author: Samuel Muabia Planet
 * Version: 1.0.0
 * Text Domain: custom-elementor-pro
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}
function register_custom_add_to_cart_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/custom-add-to-cart.php' );

	$widgets_manager->register( new \My_Custom_Add_To_Cart_Widget() );
}
add_action( 'elementor/widgets/register', 'register_custom-add-to-cart_widget' );






