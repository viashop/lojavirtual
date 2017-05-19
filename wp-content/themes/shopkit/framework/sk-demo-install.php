<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	check_ajax_referer( 'shopkit-demo', '_shopkit_nonce' );

	if ( isset( $_POST['mode'] ) && in_array( $_POST['mode'], array( 'initDemo', 'addDatabase', 'addImage', 'addWidgets', 'addPlugins', 'closeDemo' ) ) ) {

		$mode = $_POST['mode'];
		$progress = isset( $_POST['progress'] ) ? $_POST['progress'] : '';
		$return = array();

		switch( $mode ) {

			case 'initDemo' :

				$dir = wp_upload_dir();

				update_option( 'permalink_structure', '/%year%/%postname%/' );

				global $wp_rewrite;
				$wp_rewrite->set_permalink_structure('/%year%/%postname%/');

				update_option( 'woocommerce_permalinks', array ( 'category_base' => '', 'tag_base' => '', 'attribute_base' => '', 'product_base' => '' ) );

				$catalog = array(
					'width' 	=> '500',
					'height'	=> '600',
					'crop'		=> 1
				);
				$single = array(
					'width' 	=> '713',
					'height'	=> '900',
					'crop'		=> 1
				);
				$thumbnail = array(
					'width' 	=> '250',
					'height'	=> '300',
					'crop'		=> 1
				);

				update_option( 'shop_catalog_image_size', $catalog );
				update_option( 'shop_single_image_size', $single );
				update_option( 'shop_thumbnail_image_size', $thumbnail );

				$return = array(
					'state' => $mode,
					'msg' => esc_html__( 'Preparing images installation', 'shopkit' ),
					'done' => 'that',
					'progress' => 'success'
				);

				$return = json_encode( $return );
				die( $return );
				exit;

			break;

			case 'addImage' :

				include_once( get_template_directory() . '/framework/demo/images.php' );

				if ( $progress == 'success' ) {
					$return = array(
						'state' => $mode,
							'msg' => esc_html__( 'Adding demo content', 'shopkit' ),
						'progress' => 'success'
					);
				}
				else {

					$progress = ( $progress !== '' ? json_decode( stripslashes( $progress ), true ) : '' );
					if ( $progress == '' ) {
						$next = 0;
						$img = $imgs[$next];
					}
					else {
						$next = intval( $progress['next'] )+1;
						$img = ( isset( $imgs[$next] ) ? $imgs[$next] : array() );
					}

					if ( empty( $img ) ) {
						$return = array(
							'state' => $mode,
							'msg' => esc_html__( 'Adding demo content', 'shopkit' ),
							'progress' => 'success'
						);
					}
					else {
						$upload = media_sideload_image( $img['url'] );
						$return = array(
							'state' => $mode,
							'msg' => esc_html__( 'Downloading and processing image ## out of', 'shopkit' ) . ' 205',
							'progress' => 'notdone',
							'progressData' => array(
								'next' => $next
							)
						);
					}

				}

				$return = json_encode( $return );
				die( $return );
				exit;

			break;

			case 'addDatabase' :

				include_once( get_template_directory() . '/framework/demo/database.inc' );

				$return = array(
					'state' => $mode,
					'msg' => esc_html__( 'Adding widgets', 'shopkit' ),
					'progress' => 'success'
				);

				$return = json_encode( $return );
				die( $return );
				exit;

			break;

			case 'addWidgets' :

				$theme = get_option( 'stylesheet' );
				if ( !in_array( $theme, array( 'shopkit-child-flat', 'shopkit-child-material', 'shopkit-child-creative' ) ) ) {
					$theme = 'shopkit-child-material';
				}

				include_once( get_template_directory() . '/framework/demo/widgets-' . $theme . '.php' );

				foreach( $widgets as $wk => $wo ) {
					update_option( $wk, $wo );
				}

				$return = array(
					'state' => $mode,
					'msg' => esc_html__( 'Adding plugin options', 'shopkit' ),
					'progress' => 'success'
				);

				$return = json_encode( $return );
				die( $return );
				exit;

			break;

			case 'addPlugins' :

				include_once( get_template_directory() . '/framework/demo/plugins.inc' );

				$return = array(
					'state' => $mode,
					'msg' => esc_html__( 'Finishing up', 'shopkit' ),
					'progress' => 'success'
				);

				$return = json_encode( $return );
				die( $return );

			break;

			case 'closeDemo' :

				flush_rewrite_rules();
				wp_schedule_single_event( time(), 'woocommerce_flush_rewrite_rules' );
				delete_transient( 'wc_attribute_taxonomies' );

				update_option( 'woocommerce_shop_page_id', 88 );
				update_option( 'woocommerce_cart_page_id', 89 );
				update_option( 'woocommerce_checkout_page_id', 90 );
				update_option( 'woocommerce_myaccount_page_id', 91 );

				update_option( 'show_on_front', 'page' );
				update_option( 'page_on_front', 2 );
				update_option( 'page_for_posts', 130 );

				delete_option( 'woocommerce_version' );
				add_option( 'woocommerce_version', '2.6.14' );
				delete_option( 'woocommerce_db_version' );
				add_option( 'woocommerce_db_version', '2.6.14' );

				update_option( 'shopkit_demo_installed', time() );
				set_theme_mod( 'shopkit_demo_installed', time() );

				$return = array(
					'state' => $mode,
					'msg' => esc_html__( 'All done! Have fun with ShopKit!', 'shopkit' ),
					'progress' => 'success'
				);

				$return = json_encode( $return );
				die( $return );
				exit;

			break;

			default :
				wp_die();
				exit;
			break;

		}

	}

	wp_die();
	exit;

?>