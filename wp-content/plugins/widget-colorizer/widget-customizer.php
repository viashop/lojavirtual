<?php
/*
Plugin Name: Widget Customizer
Plugin URI: http://www.mihajlovicnenad.com/widget-colorizer
Description: Plugin for easy widget styling and widget custom CSS
Author: Mihajlovic Nenad
Version: 2.0.0
Author URI: http://www.mihajlovicnenad.com
*/

class Wdgtclrzr_Engine {

	public static $dir;
	public static $url;
	public static $settings;

	public static function init() {
		$class = __CLASS__;
		new $class;
	}

	function __construct() {

		self::$dir = trailingslashit( plugin_dir_path( __FILE__ ) );
		self::$url = plugins_url( trailingslashit( basename( dirname( __FILE__ ) ) ) );

		self::$settings['css'] = '';

		add_action( 'init', __CLASS__ . '::textdomain', 1000 );
		add_action( 'wp_enqueue_scripts', __CLASS__ . '::fonts' );
		add_action( 'wp_footer', __CLASS__ . '::add_css' );

		add_action( 'wp_ajax_wdgtclrzr_save', __CLASS__ . '::wdgtclrzr_save' );
		add_action( 'wp_ajax_wdgtclrzr_delete', __CLASS__ . '::wdgtclrzr_delete' );
		add_action( 'wp_ajax_wdgtclrzr_load', __CLASS__ . '::wdgtclrzr_load' );
		add_action( 'wp_ajax_wdgtclrzr_import', __CLASS__ . '::wdgtclrzr_import' );
		add_action( 'wp_ajax_wdgtclrzr_export', __CLASS__ . '::wdgtclrzr_export' );
		add_action( 'admin_enqueue_scripts', __CLASS__ . '::wdgtclrzr_admin' );
	}

	public static function textdomain() {
		$dir = trailingslashit( WP_LANG_DIR );
		load_plugin_textdomain( 'wdgtclrzr_strings', false, $dir );
	}

	public static function fonts() {

		if ( false === ( $fonts_transient = get_transient( 'wdgtclrzr_fonts' ) ) ) {

			$insert_font = array();

			$curr_widgets = get_option( 'widget_wdgtclrzr' );
			if ( $curr_widgets !== false && is_array($curr_widgets) ) {
				foreach ( $curr_widgets as $curr_widget ) {
					if ( !is_array($curr_widget) ) {
						continue;
					}
					if ( $curr_widget['f_title'] !== 'Default' ) {
						$insert_font[] = $curr_widget['f_title'];
					}
					if ( $curr_widget['f_text'] !== 'Default' ) {
						$insert_font[] = $curr_widget['f_text'];
					}
				}
			}
			$curr_sidebars = get_option( 'widget_sdbrclrzr' );
			if ( $curr_sidebars !== false && is_array($curr_sidebars) ) {
				foreach ( $curr_sidebars as $curr_widget ) {
					if ( !is_array($curr_widget) ) {
						continue;
					}
					if ( $curr_widget['f_title'] !== 'Default' ) {
						$insert_font[] = $curr_widget['f_title'];
					}
					if ( $curr_widget['f_text'] !== 'Default' ) {
						$insert_font[] = $curr_widget['f_text'];
					}
				}
			}
			set_transient( 'wdgtclrzr_fonts', $insert_font );
		}
		else {
			$insert_font = $fonts_transient;
		}

		if ( !empty( $insert_font ) ) {
			$protocol = is_ssl() ? 'https' : 'http';
			$i = 0;
			foreach ( array_unique($insert_font) as $cf ) {
				$i++;
				$scf = str_replace(' ', '+', $cf);
				wp_enqueue_style( "wdgtclrzr-font-$i", $protocol."://fonts.googleapis.com/css?family=$scf%3A100%2C200%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C700%2C700italic%2C800&amp;subset=all" );
			}
		}
	}

	/*
	 * Widget Customizer Ajax
	*/
	public static function wdgtclrzr_save() {

		$curr_name = $_POST['curr_name'];
		$curr_mode = $_POST['curr_mode'];

		if ( $curr_mode == 'sidebar' ) {
			$curr_options = 'sdbrclrzr_presets';
		}
		else if ( $curr_mode == 'widget' ) {
			$curr_options = 'wdgtclrzr_presets';
		}
		else {
			die('0');
			exit;
		}

		$curr_data[$curr_name]['c_title'] = $_POST['c_title'];
		$curr_data[$curr_name]['c_text'] = $_POST['c_text'];
		$curr_data[$curr_name]['c_link'] = $_POST['c_link'];
		$curr_data[$curr_name]['c_hover'] = $_POST['c_hover'];
		$curr_data[$curr_name]['c_background'] = $_POST['c_background'];
		$curr_data[$curr_name]['bg_image'] = $_POST['bg_image'];
		$curr_data[$curr_name]['bg_orientation'] = $_POST['bg_orientation'];
		$curr_data[$curr_name]['f_title'] = $_POST['f_title'];
		$curr_data[$curr_name]['f_title_size'] = intval($_POST['f_title_size']);
		$curr_data[$curr_name]['f_title_height'] = intval($_POST['f_title_height']);
		$curr_data[$curr_name]['f_title_style'] = $_POST['f_title_style'];
		$curr_data[$curr_name]['f_title_weight'] = $_POST['f_title_weight'];
		$curr_data[$curr_name]['f_text'] = $_POST['f_text'];
		$curr_data[$curr_name]['f_text_size'] = intval($_POST['f_text_size']);
		$curr_data[$curr_name]['f_text_height'] = intval($_POST['f_text_height']);
		$curr_data[$curr_name]['f_text_style'] = $_POST['f_text_style'];
		$curr_data[$curr_name]['f_text_weight'] = $_POST['f_text_weight'];
		$curr_data[$curr_name]['c_border_top'] = $_POST['c_border_top'];
		$curr_data[$curr_name]['c_border_right'] = $_POST['c_border_right'];
		$curr_data[$curr_name]['c_border_bottom'] = $_POST['c_border_bottom'];
		$curr_data[$curr_name]['c_border_left'] = $_POST['c_border_left'];
		$curr_data[$curr_name]['b_top_width'] = intval($_POST['b_top_width']);
		$curr_data[$curr_name]['b_right_width'] = intval($_POST['b_right_width']);
		$curr_data[$curr_name]['b_bottom_width'] = intval($_POST['b_bottom_width']);
		$curr_data[$curr_name]['b_left_width'] = intval($_POST['b_left_width']);
		$curr_data[$curr_name]['p_top'] = intval($_POST['p_top']);
		$curr_data[$curr_name]['p_right'] = intval($_POST['p_right']);
		$curr_data[$curr_name]['p_bottom'] = intval($_POST['p_bottom']);
		$curr_data[$curr_name]['p_left'] = intval($_POST['p_left']);
		$curr_data[$curr_name]['e_radius'] = intval($_POST['e_radius']);
		$curr_data[$curr_name]['e_shadow'] = $_POST['e_shadow'];
		$curr_data[$curr_name]['custom_css'] = $_POST['custom_css'];

		$curr_presets = get_option( $curr_options );

		if ( $curr_presets === false ) {
			$curr_presets = array();
		}

		if ( isset( $curr_presets ) && is_array( $curr_presets ) ) {
			if ( array_key_exists($curr_name, $curr_presets ) ) {
				unset( $curr_presets[$curr_name] );
			}
			$curr_presets = $curr_presets + $curr_data;
			update_option( $curr_options, $curr_presets );
		}

		die('1');
		exit;
	}

	public static function wdgtclrzr_delete() {

		$curr_name = $_POST['curr_name'];
		$curr_mode = $_POST['curr_mode'];

		if ( $curr_mode == 'sidebar' ) {
			$curr_options = 'sdbrclrzr_presets';
		}
		else if ( $curr_mode == 'widget' ) {
			$curr_options = 'wdgtclrzr_presets';
		}
		else {
			die('0');
			exit;
		}

		$curr_presets = get_option( $curr_options );
		if ( isset( $curr_presets ) && !empty( $curr_presets ) && is_array( $curr_presets ) ) {
			if ( array_key_exists( $curr_name, $curr_presets ) ) {
				unset( $curr_presets[$curr_name] );
				update_option( $curr_options, $curr_presets );
			}
		}

		die('1');
		exit;
	}

	public static function wdgtclrzr_load() {

		$curr_name = $_POST['curr_name'];
		$curr_mode = $_POST['curr_mode'];

		if ( $curr_mode == 'sidebar' ) {
			$curr_options = 'sdbrclrzr_presets';
		}
		else if ( $curr_mode == 'widget' ) {
			$curr_options = 'wdgtclrzr_presets';
		}
		else {
			die('0');
			exit;
		}

		$curr_presets = get_option( $curr_options );
		if ( isset( $curr_presets ) && !empty( $curr_presets ) && is_array( $curr_presets ) ) {
			if ( array_key_exists( $curr_name, $curr_presets ) ) {
				die( json_encode( $curr_presets[$curr_name] ) );
				exit;
			}
		}

		die('1');
		exit;
	}

	public static function wdgtclrzr_import() {

		$curr_styles = $_POST['curr_styles'];
		$curr_mode = $_POST['curr_mode'];

		if ( $curr_mode == 'sidebar' ) {
			$curr_options = 'sdbrclrzr_presets';
		}
		else if ( $curr_mode == 'widget' ) {
			$curr_options = 'wdgtclrzr_presets';
		}
		else {
			die('0');
			exit;
		}

		if ( strpos($curr_styles,'%wdgtclrzr%') !== false ) {
			$curr_styles = str_replace('%wdgtclrzr%', '', $curr_styles);
		}
		else {
			die('0');
			exit;
		}

		$curr_styles = json_decode( stripslashes( $curr_styles ), true );

		if ( !is_array($curr_styles) ) {
			die('0');
			exit;
		}

		$curr_presets = get_option( $curr_options );
		if ( isset( $curr_presets ) && !empty( $curr_presets ) && is_array( $curr_presets ) ) {
			foreach ( $curr_styles as $curr_name => $curr_style ) {
				if ( array_key_exists( $curr_name, $curr_presets ) ) {
					unset( $curr_presets[$curr_name] );
				}
				$curr_presets = $curr_presets + array( $curr_name => $curr_style );
			}
			update_option( $curr_options, $curr_presets );
			die('1');
			exit;
		}
		die('0');
		exit;
	}

	public static function wdgtclrzr_export() {

		$curr_name = $_POST['curr_name'];
		$curr_mode = $_POST['curr_mode'];

		if ( $curr_mode == 'sidebar' ) {
			$curr_options = 'sdbrclrzr_presets';
		}
		else if ( $curr_mode == 'widget' ) {
			$curr_options = 'wdgtclrzr_presets';
		}
		else {
			die('0');
			exit;
		}

		$curr_presets = get_option( $curr_options );
		if ( isset( $curr_presets ) && !empty( $curr_presets ) && is_array( $curr_presets ) ) {
			if ( $curr_name == 'all' ) {
				die( '%wdgtclrzr%' . json_encode( $curr_presets ) );
				exit;
			}
			else if ( array_key_exists($curr_name, $curr_presets ) ) {
				die( '%wdgtclrzr%' . json_encode( array( $curr_name => $curr_presets[$curr_name] ) ) );
				exit;
			}
		}

		die('1');
		exit;
	}

	/*
	 * Widget Customizer Admin Init
	*/
	public static function wdgtclrzr_admin( $hook ) {
		if ( 'widgets.php' != $hook ) {
			return;
		}
		wp_enqueue_style( 'wdgtclrzr-admin', self::$url .'lib/wdgtclrzr_admin.css' );
		wp_enqueue_style( 'wp-color-picker');

		wp_enqueue_script( 'wdgtclrzr-admin', self::$url .'lib/wdgtclrzr_admin.js', array('jquery', 'jquery-ui-core', 'jquery-ui-widget', 'jquery-ui-sortable', 'wp-color-picker'), '2.0.0', false);
		wp_localize_script( 'wdgtclrzr-admin', 'wdgtclrzr', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ), 's_save' => __('Please enter preset name', 'wdgtclrzr_strings'), 's_setname' => __('Please set preset name. Duplicates will be overwritten', 'wdgtclrzr_strings'), 's_saved' => __('Preset saved', 'wdgtclrzr_strings'), 's_deleted' => __('Preset deleted', 'wdgtclrzr_strings'), 's_sure' => __('Delete selected preset? OK?', 'wdgtclrzr_strings'), 's_load' => __('Load selected preset? OK?', 'wdgtclrzr_strings'), 's_alert' => __('You cannot delete the "Custom" preset', 'wdgtclrzr_strings'), 's_alert_load' => __('You cannot load the "Custom" preset', 'wdgtclrzr_strings'), 's_loaded' => __('Preset loaded', 'wdgtclrzr_strings'), 's_reset' => __('Reset custom style? OK?', 'wdgtclrzr_strings'), 's_success' => __('Imported successfully. Your page will now refresh', 'wdgtclrzr_strings') ) );
		if ( function_exists( 'wp_enqueue_media' ) ) {
			wp_enqueue_media();
		}
	}
	/*
	 * Widget Customizer Add CSS
	*/
	public static function add_css() {
		if ( self::$settings['css'] !== '' ) {
			echo '<style type="text/css">' . self::$settings['css'] . '</style>';
		}
	}

}
add_action( 'init', array( 'Wdgtclrzr_Engine', 'init' ), 998 );



/*
 * Widget Customizer Init
*/
function wdgtclrzr_activate() {
	$curr_presets = get_option( 'wdgtclrzr_presets' );
	if ( $curr_presets === false ) {
		require_once( 'lib/wdgtclrzr_presets.php' );
	}
	
}
register_activation_hook( __FILE__, 'wdgtclrzr_activate' );

include_once( 'lib/wdgtclrzr_widget.php' );
include_once( 'lib/sdbrclrzr_widget.php' );

?>