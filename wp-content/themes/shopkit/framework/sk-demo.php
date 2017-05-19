<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	ob_start();
?>
	<h3><?php esc_html_e( 'Demo requires following plugins to be installed and active!', 'shopkit' ); ?></h3>
	<p><?php esc_html_e( 'Please install and activate following plugins to enable the demo installation process.', 'shopkit' ); ?></p>
<?php
	$plugins = array( 'WooCommerce' => 'WooCommerce', 'PrdctfltrInit' => 'WooCommerce Product Filter', 'Vc_Manager' => 'WPBakery Visual Composer', 'Ultimate_VC_Addons' => 'Ultimate Addons for Visual Composer' );
?>
	<ul class="active-plugins">
	<?php
		$valid = 0;
		foreach( $plugins as $k => $v ) {
			$plugin_active = class_exists( $k ) ? '<span class="dashicons dashicons-yes"></span>' : '<span class="dashicons dashicons-no-alt"></span>' ;
	?>
			<li><?php echo $plugin_active; ?> <?php echo $v; ?></li>
	<?php
			$valid = class_exists( $k ) ? $valid+1 : $valid;
		}
	?>
	</ul>
	<p id="shopkit-demo">
		<?php esc_html_e( 'To start installation click the Install Demo Content button.', 'shopkit' ); ?>
	</p>
<?php

	if ( $valid == count( $plugins ) ) {
?>
	<a href="#" id="install-demo" class="option-tree-ui-button button button-primary"><?php esc_html_e( 'Install Demo Content', 'shopkit' ); ?></a>
<?php
	}

	$demo_content = ob_get_clean();

	$custom_settings['settings']['demo_information'] = array(
		'id'          => 'demo_information',
		'label'       => 'Demo',
		'desc'        => $demo_content,
		'type'        => 'textblock',
		'section'     => 'demo'
	);

?>