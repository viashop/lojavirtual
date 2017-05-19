<?php global $newscodes_loop; ?>

<?php if ( $newscodes_loop['loop'] == 1 ) { ?>

	<li <?php nc_post_class( $newscodes_loop['classes'] ); ?>>

		<<?php nc_title_tag( $newscodes_loop['title_tag'] ); ?>>
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
				<?php newscodes_post_format(); ?>
			</a>
		</<?php nc_title_tag( $newscodes_loop['title_tag'] ); ?>>

		<div class="nc-meta-compact-wrap">

			<?php do_action( 'newscodes_loop_meta' ); ?>

		</div>

		<?php the_excerpt(); ?>

	</li>

<?php } else { ?>

	<li <?php nc_post_class( $newscodes_loop['classes'] ); ?>>

		<<?php nc_title_tag( $newscodes_loop['title_tag'] ); ?>>
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
				<?php newscodes_post_format(); ?>
			</a>
		</<?php nc_title_tag( $newscodes_loop['title_tag'] ); ?>>

	</li>

<?php } ?>