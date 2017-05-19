<?php

class WC_Wfsm_Settings {

	public static $settings;

	public static function init() {

		self::$settings['restrictions'] = array(
			'create_simple_product' => __( 'Create Simple Products', 'wfsm' ),
			'create_grouped_product' => __( 'Create Grouped Products', 'wfsm' ),
			'create_external_product' => __( 'Create External Products', 'wfsm' ),
			'create_variable_product' => __( 'Create Variable Products', 'wfsm' ),
			'create_custom_product' => __( 'Create Custom Products', 'wfsm' ),
			'product_status' => __( 'Product Status', 'wfsm' ),
			'product_feature' => __( 'Feature Product', 'wfsm' ),
			'product_content' => __( 'Product Content and Description', 'wfsm' ),
			'product_featured_image' => __( 'Featured Image', 'wfsm' ),
			'product_gallery' => __( 'Product Gallery', 'wfsm' ),
			'product_downloadable' => __( 'Downloadable Products', 'wfsm' ),
			'product_virtual' => __( 'Virtual Products', 'wfsm' ),
			'product_name' => __( 'Product Name', 'wfsm' ),
			'product_slug' => __( 'Product Slug', 'wfsm' ),
			'external_product_url' => __( 'Product External URL (External/Affilate)', 'wfsm' ),
			'external_button_text' => __( 'Product External Button Text', 'wfsm' ),
			'product_sku' => __( 'Product SKU', 'wfsm' ),
			'product_taxes' => __( 'Product Tax', 'wfsm' ),
			'product_prices' => __( 'Product Prices', 'wfsm' ),
			'product_sold_individually' => __( 'Sold Individually', 'wfsm' ),
			'product_stock' => __( 'Product Stock', 'wfsm' ),
			'product_schedule_sale' => __( 'Product Schedule Sale', 'wfsm' ),
			'product_grouping' => __( 'Product Grouping', 'wfsm' ),
			'product_note' => __( 'Product Purchase Note', 'wfsm' ),
			'product_shipping' => __( 'Product Shipping', 'wfsm' ),
			'product_downloads' => __( 'Manage Downloads', 'wfsm' ),
			'product_download_settings' => __( 'Manage Download Extended Settings', 'wfsm' ),
			'product_cat' => __( 'Edit Product Categories', 'wfsm' ),
			'product_tag' => __( 'Edit Product Tags', 'wfsm' ),
			'product_attributes' => __( 'Edit Product Attributes', 'wfsm' ),
			'product_new_terms' => __( 'Add New Taxonomy Terms', 'wfsm' ),
			'variable_add_variations' => __( 'Add Variation (Variable)', 'wfsm' ),
			'variable_edit_variations' => __( 'Edit Variations (Variable)', 'wfsm' ),
			'variable_delete' => __( 'Delete Variation (Variable)', 'wfsm' ),
			'variable_product_attributes' => __( 'Edit Product Attributes (Variable)', 'wfsm' ),
			'product_clone' => __( 'Duplicate Products', 'wfsm' ),
			'product_delete' => __( 'Delete Products', 'wfsm' ),
			'backend_buttons' => __( 'Backend Buttons', 'wfsm' ),
		);

		self::$settings['vendor_groups'] = get_option( 'wc_settings_wfsm_vendor_groups', array() );
		self::$settings['custom_settings'] = get_option( 'wc_settings_wfsm_custom_settings', array() );

		foreach( self::$settings['custom_settings'] as $set ) {
			$slug = sanitize_title( $set['name'] );
			self::$settings['restrictions']['wfsm_custom_' . $slug] = $set['name'];
		}

		add_filter( 'woocommerce_settings_tabs_array', __CLASS__ . '::wfsm_add_settings_tab', 50 );
		add_action( 'woocommerce_settings_tabs_wfsm', __CLASS__ . '::wfsm_settings_tab' );
		add_action( 'woocommerce_update_options_wfsm', __CLASS__ . '::wfsm_save_settings' );
		add_action( 'admin_enqueue_scripts', __CLASS__ . '::wfsm_settings_scripts' );
		add_action( 'woocommerce_admin_field_wfsm_groups_manager', __CLASS__ . '::wfsm_groups_manager', 10 );
		add_action( 'woocommerce_admin_field_wfsm_settings_manager', __CLASS__ . '::wfsm_settings_manager', 10 );

		add_action( 'wp_ajax_wfsm_admin', __CLASS__ . '::wfsm_admin' );

	}

	public static function wfsm_admin() {

		if ( isset( $_POST['wfsm_type'] ) && $_POST['wfsm_type'] == 'wfsm_add_vendor_group' ) {

			$curr_group = ( isset( $_POST['wfsm_group'] ) ? $_POST['wfsm_group'] : 0 );

			$out = self::wfsm_get_vendor_group( 'ajax', $curr_group );

			die($out);
			exit;

		}

		if ( isset( $_POST['wfsm_type'] ) && $_POST['wfsm_type'] == 'wfsm_add_custom_settings_group' ) {

			$curr_setts = ( isset( $_POST['wfsm_setts'] ) ? $_POST['wfsm_setts'] : 0 );

			$out = self::wfsm_get_custom_settings_group( 'ajax', $curr_setts );

			die($out);
			exit;

		}

		if ( isset( $_POST['wfsm_type'] ) && $_POST['wfsm_type'] == 'wfsm_add_custom_setting' ) {

			$curr_set = ( isset( $_POST['wfsm_set'] ) ? $_POST['wfsm_set'] : 0 );
			$curr_setting_length = ( isset( $_POST['wfsm_setting_length'] ) ? $_POST['wfsm_setting_length'] : 0 );
			$curr_setting_type = ( isset( $_POST['wfsm_setting_type'] ) ? $_POST['wfsm_setting_type'] : 'input' );

			$args = array(
				'set' => $curr_set,
				'id' => $curr_setting_length,
				'type' => $curr_setting_type,
			);

			$out = self::wfsm_get_custom_setting( 'ajax', $args );

			die($out);
			exit;

		}

		die(0);
		exit;

	}

	public static function wfsm_get_vendor_group( $mode, $args ) {

		if ( $mode == 'ajax' ) {
			$curr_group = $args;
			$curr_group_options = array(
				'name' => '',
				'users' => array(),
				'permissions' => array()
			);
		}
		else {
			$curr_group = $args['id'];
			$curr_group_options = array(
				'name' => $args['name'],
				'users' => $args['users'],
				'permissions' => $args['permissions']
			);
		}

		ob_start();

		?>
		<span class="wfsm-vendor-group">
			<span class="wfsm-vendor-group-ui">REMOVE</span>
			<span class="wfsm-vendor-group-option">
				<span class="wfsm-vendor-group-title"><?php _e( 'Group Name', 'wfsm'); ?></span>
				<input name="wfsm-vendor-group-name[<?php echo $curr_group; ?>]" class="wfsm-vendor-group-name"<?php echo ( $curr_group_options['name'] !== '' ? ' value="' . $curr_group_options['name'] . '"' : '' ); ?> />
			</span>
			<span class="wfsm-vendor-group-option" <?php echo ( !empty( $curr_group_options['users'] ) ? ' data-selected="' . esc_attr( json_encode( $curr_group_options['users'] ) ) . '"' : '' ); ?>">
				<span class="wfsm-vendor-group-title"><?php _e( 'Select Users', 'wfsm'); ?></span>
				<?php
					$curr_args = array(
						'name' => 'wfsm-vendor-group-users[' . $curr_group . '][]',
						'class' => 'wfsm-vendor-group-users',
						'multi' => true,
						'selected' => false
					);
					wp_dropdown_users( $curr_args );
				?>
			</span>
			<span class="wfsm-vendor-group-option" <?php echo ( !empty( $curr_group_options['users'] ) ? ' data-selected="' . esc_attr( json_encode( $curr_group_options['permissions'] ) ) . '"' : '' ); ?>>
				<span class="wfsm-vendor-group-title"><?php _e( 'Selected product options vendors from this group will not be able to edit', 'wfsm'); ?></span>
				<?php
					$curr_permissions = self::$settings['restrictions'];
				?>
				<select name="wfsm-vendor-user-permissions[<?php echo $curr_group; ?>][]" class="wfsm-vendor-user-permissions">
				<?php
					foreach ( $curr_permissions as $k => $v ) {
						printf( '<option value="%1$s">%2$s</option>', $k, $v);
					}
				?>
				</select>
			</span>
		</span>
		<?php

		$out = ob_get_clean();

		return $out;
	}

	public static function wfsm_get_custom_settings_group( $mode, $args ) {

		if ( $mode == 'ajax' ) {
			$curr_set = $args;
			$curr_set_options = array(
				'name' => '',
				'setting-name' => array(),
				'type' =>array(),
				'key' => array(),
				'options' => array(),
				'default' => array()
			);
		}
		else {
			$curr_set = $args['id'];
			$curr_set_options = array(
				'name' => $args['name'],
				'type' => $args['type'],
				'setting-name' => $args['setting-name'],
				'key' => $args['key'],
				'options' => $args['options'],
				'default' => $args['default']
			);
		}

		ob_start();

		?>

		<span class="wfsm-custom-setting" data-id="<?php echo $curr_set; ?>">
			<span class="wfsm-custom-setting-ui">REMOVE</span>
			<span class="wfsm-custom-setting-option">
				<span class="wfsm-custom-setting-group-name-title"><?php _e( 'Group Name', 'wfsm'); ?></span>
				<input name="wfsm-custom-settings-group-name[<?php echo $curr_set; ?>]" class="wfsm-custom-settings-group-name"<?php echo ( $curr_set_options['name'] !== '' ? ' value="' . $curr_set_options['name'] . '"' : '' ); ?> />
			</span>
			<span class="wfsm-custom-setting-option">
				<select class="wfsm-custom-setting-type">
					<option value="input"><?php _e( 'Input', 'wfsm' ); ?></option>
					<option value="textarea"><?php _e( 'Textarea', 'wfsm' ); ?></option>
					<option value="select"><?php _e( 'Select', 'wfsm' ); ?></option>
					<option value="checkbox"><?php _e( 'Checkbox', 'wfsm' ); ?></option>
				</select>
				<a href="#" id="wfsm-add-custom-setting" class="button"><?php _e( 'Add Setting', 'wfsm' ); ?></a>
				<span class="wfsm-custom-settings-holder">
			<?php
				if ( !empty( $curr_set_options['setting-name'] ) ) {

					for( $i = 0; $i < count( $curr_set_options['setting-name'] ); $i++ ) {

						$field_args = array(
							'set' => $curr_set,
							'id' => $i,
							'name' => $curr_set_options['setting-name'][$i],
							'type' => $curr_set_options['type'][$i],
							'key' => $curr_set_options['key'][$i],
							'options' => $curr_set_options['options'][$i],
							'default' => $curr_set_options['default'][$i]
						);

						echo self::wfsm_get_custom_setting( 'get', $field_args );

					}

				}
			?>
				</span>
			</span>

		</span>

		<?php

		$out = ob_get_clean();

		return $out;

	}

	public static function wfsm_get_custom_setting( $mode, $args ) {

		if ( $mode == 'ajax' ) {
			$curr_set = $args['set'];
			$curr_id = $args['id'];
			$curr_set_options = array(
				'name' => '',
				'type' => $args['type'],
				'key' => '',
				'options' => '',
				'default' => ''
			);
		}
		else {
			$curr_set = $args['set'];
			$curr_id = $args['id'];
			$curr_set_options = array(
				'name' => esc_attr( $args['name'] ),
				'type' => $args['type'],
				'key' => esc_attr( $args['key'] ),
				'options' => $args['options'],
				'default' => esc_attr( $args['default'] )
			);
		}

		ob_start()
	?>
		<span class="wfsm-added-custom-setting">

			<span class="wfsm-added-custom-setting-title"><?php echo $curr_set_options['name']; ?></span>
			<span class="wfsm-added-custom-setting-ui"><i class="wfsmico-discard"></i></span>
			<span class="wfsm-added-custom-setting-edit"><i class="wfsmico-edit"></i></span>
			<input type="hidden" name="wfsm-custom-setting-type[<?php echo $curr_set; ?>][<?php echo $curr_id; ?>]" value="<?php echo $curr_set_options['type']; ?>" />

			<span class="wfsm-added-custom-setting-wrapper">

				<span class="wfsm-custom-setting-title"><?php _e( 'Setting Name', 'wfsm'); ?></span>
				<input name="wfsm-custom-setting-name[<?php echo $curr_set; ?>][<?php echo $curr_id; ?>]" class="wfsm-custom-setting-name"<?php echo ( $curr_set_options['name'] !== '' ? ' value="' . $curr_set_options['name'] . '"' : '' ); ?> />

				<span class="wfsm-custom-setting-title"><?php _e( 'Database Key', 'wfsm'); ?></span>
				<input name="wfsm-custom-setting-key[<?php echo $curr_set; ?>][<?php echo $curr_id; ?>]" class="wfsm-custom-setting-key"<?php echo ( $curr_set_options['key'] !== '' ? ' value="' . $curr_set_options['key'] . '"' : '' ); ?> />

			<?php
				if ( in_array( $curr_set_options['type'], array( 'select', 'checkbox' ) ) ) {
			?>
					<span class="wfsm-custom-setting-title"><?php _e( 'Options (JSON string)', 'wfsm'); ?></span>
					<textarea name="wfsm-custom-setting-options[<?php echo $curr_set; ?>][<?php echo $curr_id; ?>]" class="wfsm-custom-setting-options"><?php echo ( $curr_set_options['options'] !== '' ? stripslashes( $curr_set_options['options'] ) : '' ); ?></textarea>
			<?php
				}
				else {
				?>
					<input type="hidden" name="wfsm-custom-setting-options[<?php echo $curr_set; ?>][<?php echo $curr_id; ?>]" value="" />
				<?php
				}
			?>

				<span class="wfsm-custom-setting-title"><?php _e( 'Default Value', 'wfsm'); ?></span>
				<input name="wfsm-custom-setting-default[<?php echo $curr_set; ?>][<?php echo $curr_id; ?>]" class="wfsm-custom-setting-default"<?php echo ( $curr_set_options['default'] !== '' ? ' value="' . $curr_set_options['default'] . '"' : '' ); ?> />

			</span>

		</span>
	<?php

		$out = ob_get_clean();

		return $out;

	}


	public static function wfsm_groups_manager($field) {

	global $woocommerce;
?>
	<tr valign="top">
		<th scope="row" class="titledesc">
			<label for="<?php echo esc_attr( $field['id'] ); ?>"><?php echo esc_html( $field['title'] ); ?></label>
			<?php echo '<img class="help_tip" data-tip="' . esc_attr( $field['desc'] ) . '" src="' . $woocommerce->plugin_url() . '/assets/images/help.png" height="16" width="16" />'; ?>
		</th>
		<td class="forminp forminp-<?php echo sanitize_title( $field['type'] ) ?>">
		<?php
			$curr_groups = self::$settings['vendor_groups'];
			$i=0;
			foreach ( $curr_groups as $curr_group ) {
				$curr_group_options = array(
					'id' => $i
				) + $curr_group;
				echo self::wfsm_get_vendor_group( 'get', $curr_group_options );
				$i++;
			}
		?>
			<a href="#" id="wfsm-add-vendor-group" class="button-primary"><?php _e( 'Add Vendor Permission Group', 'wfsm' ); ?></a>
		</td>
	</tr><?php
	}


	public static function wfsm_settings_manager( $field ) {

	global $woocommerce;
?>
	<tr valign="top">
		<th scope="row" class="titledesc">
			<label for="<?php echo esc_attr( $field['id'] ); ?>"><?php echo esc_html( $field['title'] ); ?></label>
			<?php echo '<img class="help_tip" data-tip="' . esc_attr( $field['desc'] ) . '" src="' . $woocommerce->plugin_url() . '/assets/images/help.png" height="16" width="16" />'; ?>
		</th>
		<td class="forminp forminp-<?php echo sanitize_title( $field['type'] ) ?>">
			<span class="wfsm-custom-settings-manager">
		<?php
			$curr_setts = self::$settings['custom_settings'];
			$i=0;
			foreach ( $curr_setts as $curr_set ) {
				$curr_set_options = array(
					'id' => $i
				) + $curr_set;
				echo self::wfsm_get_custom_settings_group( 'get', $curr_set_options );
				$i++;
			}
		?>
			</span>
			<a href="#" id="wfsm-add-custom-settings-group" class="button-primary"><?php _e( 'Add Custom Settings Group', 'wfsm' ); ?></a>
		</td>
	</tr><?php
	}

	public static function wfsm_settings_scripts( $settings_tabs ) {

		if ( isset($_GET['page'], $_GET['tab']) && ($_GET['page'] == 'wc-settings' || $_GET['page'] == 'woocommerce_settings') && $_GET['tab'] == 'wfsm' ) {

			wp_enqueue_style( 'wfsm-style-admin', plugins_url( 'assets/css/admin.css', dirname(__FILE__) ), WC_Frontnend_Shop_Manager::$version );
			//wp_enqueue_style( 'wfsm-selectize-style-admin', plugins_url( 'assets/css/selectize_admin.css', dirname(__FILE__) ), WC_Frontnend_Shop_Manager::$version );
			wp_register_script( 'wfsm-selectize-admin', plugins_url( 'assets/js/selectize.min.js', dirname(__FILE__) ), array( 'jquery' ), WC_Frontnend_Shop_Manager::$version, true );
			wp_register_script( 'wfsm-admin', plugins_url( 'assets/js/admin.js', dirname(__FILE__) ), array( 'jquery' ), WC_Frontnend_Shop_Manager::$version, true );

			wp_enqueue_script( array( 'wfsm-selectize-admin', 'wfsm-admin' ) );

			$curr_args = array(
				'ajax' => admin_url( 'admin-ajax.php' ),
				'localization' => array(
					'delete_element' => __( 'Delete?', 'wfsm' )
				)
			);

			wp_localize_script( 'wfsm-admin', 'wfsm', $curr_args );

			if ( function_exists( 'wp_enqueue_media' ) ) {
				wp_enqueue_media();
			}

		}

	}

	public static function wfsm_add_settings_tab( $settings_tabs ) {

		$settings_tabs['wfsm'] = __( 'WFSM', 'wfsm' );

		return $settings_tabs;

	}

	public static function wfsm_settings_tab() {
		woocommerce_admin_fields( self::wfsm_get_settings() );
	}

	public static function wfsm_save_settings() {

		if ( isset( $_POST['wfsm-vendor-group-name'] ) ) {

			if ( !is_array( $_POST['wfsm-vendor-group-name'] ) || !is_array( $_POST['wfsm-vendor-group-users'] ) || !is_array( $_POST['wfsm-vendor-user-permissions'] ) ) {
				return;
			}

			$curr_group['name'] = array_values( $_POST['wfsm-vendor-group-name'] );
			$curr_group['users'] = array_values( $_POST['wfsm-vendor-group-users'] );
			$curr_group['permissions'] = array_values( $_POST['wfsm-vendor-user-permissions'] );

			$vendor_group_settings = array();

			for( $i = 0; $i < count( $curr_group['name'] ); $i++ ) {

				$group_name = sanitize_title( $curr_group['name'][$i] );

				$vendor_group_settings[$group_name]['name'] = $curr_group['name'][$i];
				$vendor_group_settings[$group_name]['users'] = $curr_group['users'][$i];
				$vendor_group_settings[$group_name]['permissions'] = $curr_group['permissions'][$i];

				foreach( $curr_group['users'][$i] as $curr_user ) {
					update_user_meta( $curr_user, 'wfsm_group', $group_name );
				}
			}

			update_option( 'wc_settings_wfsm_vendor_groups', $vendor_group_settings );

		}
		else {
			update_option( 'wc_settings_wfsm_vendor_groups', array() );
		}

		if ( isset( $_POST['wfsm-custom-settings-group-name'] ) ) {

			if ( !is_array( $_POST['wfsm-custom-settings-group-name'] ) ) {
				return;
			}

			$curr_set['name'] = array_values( $_POST['wfsm-custom-settings-group-name'] );
			$curr_set['type'] = array_values( $_POST['wfsm-custom-setting-type'] );
			$curr_set['setting-name'] = array_values( $_POST['wfsm-custom-setting-name'] );
			$curr_set['key'] = array_values( $_POST['wfsm-custom-setting-key'] );
			$curr_set['options'] = array_values( $_POST['wfsm-custom-setting-options'] );
			$curr_set['default'] = array_values( $_POST['wfsm-custom-setting-default'] );

			$custom_settings = array();

			for( $i = 0; $i < count( $curr_set['name'] ); $i++ ) {

				$curr_set['type'][$i] = array_values( $curr_set['type'][$i] );
				$curr_set['setting-name'][$i] = array_values( $curr_set['setting-name'][$i] );
				$curr_set['key'][$i] = array_values( $curr_set['key'][$i] );
				$curr_set['options'][$i] = array_values( $curr_set['options'][$i] );
				$curr_set['default'][$i] = array_values( $curr_set['default'][$i] );

				$name = sanitize_title( $curr_set['name'][$i] );

				$custom_settings[$i]['name'] = $curr_set['name'][$i];
				$custom_settings[$i]['type'] = $curr_set['type'][$i];
				$custom_settings[$i]['setting-name'] = $curr_set['setting-name'][$i];
				$custom_settings[$i]['key'] = $curr_set['key'][$i];
				$custom_settings[$i]['options'] = $curr_set['options'][$i];
				$custom_settings[$i]['default'] = $curr_set['default'][$i];

			}

			update_option( 'wc_settings_wfsm_custom_settings', $custom_settings );

		}
		else {
			update_option( 'wc_settings_wfsm_custom_settings', array() );
		}

		woocommerce_update_options( self::wfsm_get_settings() );

	}

	public static function wfsm_get_settings() {

		$wfsm_styles = apply_filters( 'wfsm_editor_styles', array(
			'wfsm_style_default' => __( 'Default', 'wfsm' ),
			'wfsm_style_flat' => __( 'Flat', 'wfsm' ),
			'wfsm_style_dark' => __( 'Dark', 'wfsm' )
		) );

		$settings = array();

		$settings = array(
			'section_settings_title' => array(
				'name' => __( 'Appearance and Installation', 'wfsm' ),
				'type' => 'title',
				'desc' => __( 'Setup WFSM appearance, installation and registration!', 'wfsm' ) . ' WooCommerce Frontend Shop Manager v' . WC_Frontnend_Shop_Manager::$version . ' <a href="http://codecanyon.net/user/dzeriho/portfolio?ref=dzeriho">' . __('Get more premium plugins at this link!', 'wfsm' ) . '</a>'
			),
			'wfsm_logo' => array(
				'name' => __( 'Custom Logo', 'wfsm' ),
				'type' => 'text',
				'desc' => __( 'Use custom logo. Paste in the logo URL. Use square images (200x200px)!', 'wfsm' ),
				'id'   => 'wc_settings_wfsm_logo',
				'default' => '',
				'css' => 'width:300px;margin-right:12px;'
			),
			'wfsm_mode' => array(
				'name' => __( 'Show Logo/User', 'wfsm' ),
				'type' => 'select',
				'desc' => __( 'Select what to show in WFSM header, logo or logged user.', 'wfsm' ),
				'id' => 'wc_settings_wfsm_mode',
				'options' => array(
					'wfsm_mode_logo' => __( 'Show Logo', 'wfsm' ),
					'wfsm_mode_user' => __( 'Show Logged User', 'wfsm' )
				),
				'default' => 'wfsm_logo',
				'css' => 'width:300px;margin-right:12px;'
			),
			'wfsm_style' => array(
				'name' => __( 'WFSM Style', 'wfsm' ),
				'type' => 'select',
				'desc' => __( 'Select WFSM style/skin.', 'wfsm' ),
				'id' => 'wc_settings_wfsm_style',
				'options' => $wfsm_styles,
				'default' => 'wfsm_default',
				'css' => 'width:300px;margin-right:12px;'
			),
			'wfsm_archive_action' => array(
				'name' => __( 'Installation Hook for Shop/Product Archives', 'wfsm' ),
				'type' => 'text',
				'desc' => __( 'Change WFSM init action on Shop/Product Archives. Use actions initiated in your content-product.php template. Please enter action name in following format action_name:priority', 'wfsm' ) . ' (default: woocommerce_before_shop_loop_item:0 )',
				'id' => 'wc_settings_wfsm_archive_action'
			),
			'wfsm_single_action' => array(
				'name' => __( 'Installation Hook for Single Product Pages', 'wfsm' ),
				'type' => 'text',
				'desc' => __( 'Change WFSM init action on Single Product Pages. Use actions initiated in your content-single-product.php template. Please enter action name in following format action_name:priority', 'wfsm' ) . ' (default: woocommerce_before_single_product_summary:5 )',
				'id' => 'wc_settings_wfsm_single_action'
			),
			'wfsm_update_code' => array(
				'name'    => __( 'Register WFSM', 'wfsm' ),
				'type'    => 'text',
				'desc'    => __( 'Enter your purchase code to get instant updates even before the Codecanyon.net releases!', 'wfsm' ),
				'id'      => 'wc_settings_wfsm_update_code',
				'default'     => '',
				'css' => 'width:300px;margin-right:12px;'
			),
			'section_settings_end' => array(
				'type' => 'sectionend'
			),
			'section_products_title' => array(
				'name' => __( 'Product Settings', 'wfsm' ),
				'type' => 'title',
				'desc' => __( 'Setup WFSM product settings.', 'wfsm' )
			),
			'wfsm_show_hidden_products' => array(
				'name' => __( 'Enable/Disable Hidden Products On Archives', 'wfsm' ),
				'type' => 'checkbox',
				'desc' => __( 'Check this option to enable pending and draft products on archives.', 'wfsm' ),
				'id' => 'wc_settings_wfsm_show_hidden_products',
				'default' => 'yes'
			),
			'wfsm_create_status' => array(
				'name' => __( 'New Product Status', 'wfsm' ),
				'type' => 'select',
				'desc' => __( 'Select the default status for newly created products.', 'wfsm' ),
				'id' => 'wc_settings_wfsm_create_status',
				'options' => array(
					'publish' => __( 'Published', 'wfsm' ),
					'pending' => __( 'Pending', 'wfsm' ),
					'draft' => __( 'Draft', 'wfsm' )
				),
				'default' => 'pending',
				'css' => 'width:300px;margin-right:12px;'
			),
			'wfsm_create_virtual' => array(
				'name' => __( 'New Product is Virtual', 'wfsm' ),
				'type' => 'checkbox',
				'desc' => __( 'Check this option to set virtual by default (not shipped) for new products.', 'wfsm' ),
				'id' => 'wc_settings_wfsm_create_virtual',
				'default' => 'no'
			),
			'wfsm_create_downloadable' => array(
				'name' => __( 'New Product is Downloadable', 'wfsm' ),
				'type' => 'checkbox',
				'desc' => __( 'Check this option to set downloadable by default for new products.', 'wfsm' ),
				'id' => 'wc_settings_wfsm_create_downloadable',
				'default' => 'no'
			),
			'section_products_end' => array(
				'type' => 'sectionend'
			),
			'section_additional_title' => array(
				'name' => __( 'Additional Product Options', 'wfsm' ),
				'type' => 'title',
				'desc' => __( 'Use the manager to add special editable options for your products.', 'wfsm' )
			),
			'wfsm_settings_manager' => array(
				'name' => __( 'Custom Settings Manager', 'wfsm' ),
				'type' => 'wfsm_settings_manager',
				'desc' => __( 'Click Add Custom Settings Group button to add special product options in the WFSM.', 'wfsm' )
			),
			'section_additional_end' => array(
				'type' => 'sectionend'
			),
			'section_vendors_title' => array(
				'name' => __( 'Vendor Settings', 'wfsm' ),
				'type' => 'title',
				'desc' => __( 'WFSM supports vendor plugins. Configure WFSM and vendor options here.', 'wfsm' )
			),
			'wfsm_vendor_max_products' => array(
				'name' => __( 'Products per Vendor', 'wfsm' ),
				'type' => 'number',
				'desc' => __( 'Maximum number of products vendor can create.', 'wfsm' ),
				'id' => 'wc_settings_wfsm_vendor_max_products',
				'default' => ''
			),
			'wfsm_default_vendor' => array(
				'name' => __( 'Default Vendor Restrictions', 'wfsm' ),
				'type' => 'multiselect',
				'desc' => __( 'Selected product options vendors will not be able to edit.', 'wfsm' ),
				'id' => 'wc_settings_wfsm_default_permissions',
				'options' => self::$settings['restrictions'],
				'default' => array(),
				'css' => 'width:480px;height:200px;margin-right:12px;'
			),
			'wfsm_groups_manager' => array(
				'name' => __( 'Vendor Groups Manager', 'wfsm' ),
				'type' => 'wfsm_groups_manager',
				'desc' => __( 'Click Add Vendor Premission Group button to customize user editing permissions for specified users.', 'wfsm' )
			),
			'section_vendor_end' => array(
				'type' => 'sectionend'
			),
		);

		return apply_filters( 'wc_wfsm_settings', $settings );

	}

}

add_action( 'init', 'WC_Wfsm_Settings::init');

?>