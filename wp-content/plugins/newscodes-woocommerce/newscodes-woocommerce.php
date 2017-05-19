<?php
/*
Plugin Name: Newscodes - WooCommerce Extension
Plugin URI: http://www.mihajlovicnenad.com/newscodes
Description: News elements for your Wordpress webiste! - http://www.mihajlovicnenad.com
Version: 1.0.0
Author: Mihajlovic Nenad
Author URI: http://www.mihajlovicnenad.com
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'NewsCodesWoo' ) ) :

	class NewsCodesWoo {

		public static $version = '1.0.0';

		public static $types;

		protected static $_instance = null;

		public static function instance() {

			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		public function __construct() {
			$this->init_hooks();

			do_action( 'newscodes_woocommerce_loaded' );
		}

		private function init_hooks() {
			self::$types = array (
				'woo-poster' => 'WooCommerce ' . __( 'Featured Poster', 'nwscds' ),
				'woo-grid' => 'WooCommerce ' . __( 'Grid', 'nwscds' ),
				'woo-columned-featured-list' => 'WooCommerce ' . __( 'Columned Featured List', 'nwscds' ),
				'woo-columned-featured-list-tiny' => 'WooCommerce ' . __( 'Columned Featured List Tiny', 'nwscds' ),
				'woo-columned-featured-list-compact' => 'WooCommerce ' . __( 'Columned Featured List Compact', 'nwscds' ),
				'woo-list' => 'WooCommerce ' . __( 'List', 'nwscds' ),
				'woo-list-featured' => 'WooCommerce ' . __( 'List with Featured', 'nwscds' ),
				'woo-list-compact' => 'WooCommerce ' . __( 'List Compact', 'nwscds' ),
				'woo-list-compact-featured' => 'WooCommerce ' . __( 'List Compact with Featured', 'nwscds' ),
				'woo-list-tiny' => 'WooCommerce ' . __( 'List Tiny', 'nwscds' ),
				'woo-list-tiny-featured' => 'WooCommerce ' . __( 'List Tiny with Featured', 'nwscds' ),
				'woo-marquee' => 'WooCommerce ' . __( 'Marquee', 'nwscds' ),
				'woo-ticker' => 'WooCommerce ' . __( 'Ticker', 'nwscds' ),
				'woo-ticker-compact' => 'WooCommerce ' . __( 'Ticker Compact', 'nwscds' ),
				'woo-ticker-tiny' => 'WooCommerce ' . __( 'Ticker Tiny', 'nwscds' ),
				'woo-one-tabbed-posts' => 'WooCommerce ' . __( 'One Tabbed Posts', 'nwscds' ),
				'woo-grid-author' => 'WooCommerce ' . __( 'Grid Author', 'nwscds' ),
				'woo-list-author-featured' => 'WooCommerce ' . __( 'List with Featured Author', 'nwscds' ),
				'woo-list-author-compact-featured' => 'WooCommerce ' . __( 'List Compact with Featured Author', 'nwscds' ),
				'woo-list-author-tiny-featured' => 'WooCommerce ' . __( 'List Tiny with Featured Author', 'nwscds' )
			);
			add_filter( 'nc_supported_types', array( $this, 'extend_types' ) );
			add_filter( 'nc_supported_column_types', array( $this, 'extend_column_types' ) );
			add_filter( 'nc_supported_posters', array( $this, 'extend_posters' ) );
			add_filter( 'nc_get_template_part', array( $this, 'intercept' ), 10, 3 );
			add_filter( 'nc_loop_class', array( $this, 'rename_loop' ) );
			add_action( 'newscodes_woocommerce', array( $this, 'insert_product_data' ) );
			add_action( 'wp_enqueue_scripts',  array( $this, 'styles' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );

			add_action( 'woocommerce_add_to_cart' , array(&$this, 'repair_cart') );
			add_action( 'wp_ajax_nopriv_nc_add_to_cart_callback', array(&$this, 'nc_add_to_cart_callback') );
			add_action( 'wp_ajax_nc_add_to_cart_callback', array(&$this, 'nc_add_to_cart_callback') );

		}

		public function plugin_path() {
			return untrailingslashit( plugin_dir_path( __FILE__ ) );
		}

		public function styles() {
			wp_register_style( 'newscodes-woo-css', untrailingslashit( plugins_url( '/', __FILE__ ) ) . '/lib/nc-woo-style.css', false, self::$version );
			wp_enqueue_style( 'newscodes-woo-css' );
			wp_register_script( 'newscodes-woo-js', untrailingslashit( plugins_url( '/', __FILE__ ) ) . '/lib/nc-woo-js.js', array( 'jquery' ), self::$version, true );
			wp_enqueue_script( 'newscodes-woo-js' );
		}

		public function admin_scripts() {
			if ( isset( $_REQUEST['page'] ) && $_REQUEST['page'] == 'newscodes_settings' ) {
				wp_register_style( 'newscodes-woo', untrailingslashit( plugins_url( '/', __FILE__ ) ) . '/lib/nc-woo-style.css', false, self::$version );
				wp_enqueue_style( 'newscodes-woo' );
			}
		}

		public function extend_types( $types ) {
			$types = array_merge( $types, self::$types );
			return $types;
		}

		public function extend_posters( $types ) {
			$types = array_merge( $types, array( 'woo-poster' ) );
			return $types;
		}
		public function extend_column_types( $types ) {
			$types = array_merge( $types, array( 'woo-grid', 'woo-grid-author' ) );
			return $types;
		}

		public function rename_loop( $class ) {
			if ( strpos( $class, 'nc-type-woo' ) > -1 ) {
				$class = ' newscodes-woo ' . str_replace(  'nc-type-woo',  'nc-type-news', $class );
			}
			return $class;
		}

		public function intercept( $template, $slug, $name ) {

			if ( array_key_exists( $name, self::$types ) ) {

				if ( file_exists( untrailingslashit( plugin_dir_path( __FILE__ ) ) . "/templates/{$name}.php" ) ) {
					$template = untrailingslashit( plugin_dir_path( __FILE__ ) ) . "/templates/{$name}.php";
				}

			}

			if ( $template ) {
				return $template;
			}

		}

		public function insert_product_data() {

			$id = get_the_ID();

			if ( get_post_type( $id ) == 'product' ) {
				$product = wc_get_product( $id );
			?>
				<p class="nc-woo">
					<span class="nc-woo-prices">
					<?php

						$price = $product->get_regular_price();
						echo !empty( $price ) ? '<span class="nc-woo-regular-price">' . strip_tags( wc_price( $price ) ) . '</span>' : '';

						$sale_price = $product->get_sale_price();
						echo !empty( $sale_price ) ? '<span class="nc-woo-sale-price">' . strip_tags( wc_price( $sale_price ) ) . '</span>' : '';
					?>
					</span>
				<?php
					printf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="%s nc-read-more product_type_%s">%s</a>',
						esc_url( $product->add_to_cart_url() ),
						esc_attr( $product->id ),
						esc_attr( $product->get_sku() ),
						$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
						esc_attr( $product->product_type ),
						esc_html( $product->add_to_cart_text() )
					);
				?>
				</p>
			<?php
			}

		}

		public function nc_add_to_cart_callback() {

			$product_id = apply_filters( 'woocommerce_add_to_cart_product_id', absint( $_POST['product_id'] ) );
			$quantity = 1;

			$passed_validation = apply_filters( 'woocommerce_add_to_cart_validation', true, $product_id, $quantity );
		
			if ( $passed_validation && WC()->cart->add_to_cart( $product_id ) ) {
				do_action( 'woocommerce_ajax_added_to_cart', $product_id );

				$data = WC_AJAX::get_refreshed_fragments();
			}
			else {

					WC_AJAX::json_headers();

					$data = array(
						'error' => true,
						'product_url' => apply_filters( 'woocommerce_cart_redirect_after_error', get_permalink( $product_id ), $product_id )
					);

					$data = json_encode( $data );
			}

			die($data);
			exit();

		}

		public function repair_cart(){
			if ( defined( 'DOING_AJAX' ) ) {
				wc_setcookie( 'woocommerce_items_in_cart', 1 );
				wc_setcookie( 'woocommerce_cart_hash', md5( json_encode( WC()->cart->get_cart() ) ) );
				do_action( 'woocommerce_set_cart_cookies', true );
			}
		}

	}

	function init_newscodes_woo_extension() {
		NewsCodesWoo::instance();
	}
	add_action( 'newscodes_loading', 'init_newscodes_woo_extension' );

endif;

?>