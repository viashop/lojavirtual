<form role="search" method="get" class="shopkit-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
<?php
	if ( class_exists( 'WooCommerce' ) && isset( ShopKit::$settings['woo-search'] ) ) {
		echo '<input type="hidden" name="post_type" value="product" />';
	}
?>
	<label>
		<input type="search" placeholder="<?php echo esc_html__( 'Enter keywords', 'shopkit' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_html__( 'Search for', 'shopkit' ); ?>" />
	</label>
<?php

	if ( isset( ShopKit::$settings['search-icon'] ) && in_array( ShopKit::$settings['search-icon'], array( 'text', 'button' ) ) ) {

		if ( strpos( ShopKit::$settings['search-icon'], 'icon' ) !== false ) {
			$string = ShopKit_Icons::get_icon( ShopKit::$settings['search-icon'], 'search' );
		}
		else {
			$string = esc_html__( 'Search', 'shopkit' );
		}
		$icon = ShopKit::$settings['search-icon'];

	}
	else {
		$string = ShopKit_Icons::get_icon( 'line-icon', 'search' );
		$icon = 'icon';
	}

?>
	<button type="submit" class="<?php echo $icon; ?>">
		<?php echo $string; ?>
	</button>
</form>