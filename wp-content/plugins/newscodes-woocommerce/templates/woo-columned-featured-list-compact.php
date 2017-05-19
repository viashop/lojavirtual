<?php

	global $newscodes_loop;

?>
<li <?php nc_post_class( $newscodes_loop['classes'] ); ?>>

	<?php if ( $newscodes_loop['loop'] == 1 ) { ?>

		<div class="nc-figure-meta-wrap">

			<?php nc_post_thumbnail(); ?>

			<div class="nc-meta-wrap">

				<?php do_action( 'newscodes_loop_meta' ); ?>

			</div>

		</div>

		<<?php nc_title_tag( $newscodes_loop['title_tag'] ); ?>>
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
				<?php newscodes_post_format(); ?>
			</a>
		</<?php nc_title_tag( $newscodes_loop['title_tag'] ); ?>>

		<?php echo substr( apply_filters( 'woocommerce_short_description', get_the_excerpt() ), 0, apply_filters( 'excerpt_length', 20 ) ); ?>

		<?php do_action( 'newscodes_woocommerce' ); ?>

	<?php } else { ?>

		<<?php nc_title_tag( $newscodes_loop['title_tag'] ); ?>>
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
				<?php newscodes_post_format(); ?>
			</a>
		</<?php nc_title_tag( $newscodes_loop['title_tag'] ); ?>>

		<?php do_action( 'newscodes_woocommerce' ); ?>

	<?php } ?>

</li>