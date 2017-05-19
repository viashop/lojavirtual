<?php

	global $newscodes_loop;

?>
<li <?php nc_post_class( $newscodes_loop['classes'] ); ?>>

	<<?php nc_title_tag( $newscodes_loop['title_tag'] ); ?>>

		<a href="<?php the_permalink(); ?>">

			<?php the_title(); ?>

			<?php newscodes_post_format(); ?>

		</a>

		<span class="nc-meta-compact-wrap">

			<?php do_action( 'newscodes_loop_meta' ); ?>

		</span>

	</<?php nc_title_tag( $newscodes_loop['title_tag'] ); ?>>

	<?php do_action( 'newscodes_woocommerce' ); ?>

</li>