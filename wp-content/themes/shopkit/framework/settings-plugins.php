<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once ( get_template_directory() . '/framework/tgm-activation/class-tgm-plugin-activation.php' );

function shopkit_register_required_plugins() {
	$plugins = array(

		array(
			'name'               => 'WooCommerce',
			'slug'               => 'woocommerce',
			'source'             => '',
			'required'           => false,
			'version'            => '',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => '',
			'is_callable'        => ''
		),

		array(
			'name'               => 'WooCommerce Product Filter',
			'slug'               => 'prdctfltr',
			'source'             => get_template_directory() . '/plugins/woocommerce-product-filter.zip',
			'required'           => false,
			'version'            => '',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => '',
			'is_callable'        => ''
		),

		array(
			'name'               => 'WooCommerce Frontend Shop Manager',
			'slug'               => 'woocommerce-frontend-shop-manager',
			'source'             => get_template_directory() . '/plugins/woocommerce-frontend-shop-manager.zip',
			'required'           => false,
			'version'            => '',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => '',
			'is_callable'        => ''
		),

		array(
			'name'               => 'Improved Variable Product Attributes for WooCommerce',
			'slug'               => 'improved-variable-product-attributes',
			'source'             => get_template_directory() . '/plugins/improved-variable-product-attributes.zip',
			'required'           => false,
			'version'            => '',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => '',
			'is_callable'        => ''
		),

		array(
			'name'               => 'Improved Sale Badges for WooCommerce',
			'slug'               => 'improved-sale-badges',
			'source'             => get_template_directory() . '/plugins/improved-sale-badges.zip',
			'required'           => false,
			'version'            => '',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => '',
			'is_callable'        => ''
		),

		array(
			'name'               => 'Warranties and Returns for WooCommerce',
			'slug'               => 'woocommerce-warranties-and-returns',
			'source'             => get_template_directory() . '/plugins/woocommerce-warranties-and-returns.zip',
			'required'           => false,
			'version'            => '',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => '',
			'is_callable'        => ''
		),

		array(
			'name'               => 'Share, Print and PDF for WooCommerce',
			'slug'               => 'share-print-pdf-woocommerce',
			'source'             => get_template_directory() . '/plugins/share-print-pdf-woocommerce.zip',
			'required'           => false,
			'version'            => '',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => '',
			'is_callable'        => ''
		),

		array(
			'name'               => 'Newscodes',
			'slug'               => 'newscodes',
			'source'             => get_template_directory() . '/plugins/newscodes.zip',
			'required'           => false,
			'version'            => '',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => '',
			'is_callable'        => ''
		),

		array(
			'name'               => 'Newscodes - WooCommerce Extension',
			'slug'               => 'newscodes-woocommerce',
			'source'             => get_template_directory() . '/plugins/newscodes-woocommerce.zip',
			'required'           => false,
			'version'            => '',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => '',
			'is_callable'        => ''
		),

		array(
			'name'               => 'Widget and Sidebar Customizer',
			'slug'               => 'widget-colorizer',
			'source'             => get_template_directory() . '/plugins/widget-customizer.zip',
			'required'           => false,
			'version'            => '',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => '',
			'is_callable'        => ''
		),

		array(
			'name'               => 'Visual Composer',
			'slug'               => 'js_composer',
			'source'             => get_template_directory() . '/plugins/js_composer.zip',
			'required'           => false,
			'version'            => '',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => '',
			'is_callable'        => ''
		),

		array(
			'name'               => 'Ultimate Visual Composer Addons',
			'slug'               => 'Ultimate_VC_Addons',
			'source'             => get_template_directory() . '/plugins/Ultimate_VC_Addons.zip',
			'required'           => false,
			'version'            => '',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => '',
			'is_callable'        => ''
		),

		array(
			'name'               => 'Revolution Slider',
			'slug'               => 'revslider',
			'source'             => get_template_directory() . '/plugins/revslider.zip',
			'required'           => false,
			'version'            => '',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => '',
			'is_callable'        => ''
		)


	);

	$config = array(
		'id'           => 'shopkit',
		'default_path' => '',
		'menu'         => 'shopkit-install-plugins',
		'parent_slug'  => 'themes.php',
		'capability'   => 'edit_theme_options',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	);

	tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'shopkit_register_required_plugins' );

?>