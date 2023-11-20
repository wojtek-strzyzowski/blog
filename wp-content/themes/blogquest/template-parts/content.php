<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BlogQuest
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if (is_single()) {
		global $post;
		$blogquest_post_layout = esc_html( get_post_meta( $post->ID, 'blogquest_post_layout', true ) ); 
		if (empty($blogquest_post_layout)) {
		    $blogquest_post_layout = 'layout-1';
		}
		if ($blogquest_post_layout == "layout-1") { ?>
			<header class="entry-header">
				<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title entry-title-large">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;

				if ( 'post' === get_post_type() ) :
					?>
					<div class="entry-meta">
						<?php
						blogquest_posted_on();
						blogquest_posted_by();
						?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->

			<?php blogquest_post_thumbnail(); ?>

		<?php } ?>
	<?php } else { ?>
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title entry-title-large">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php
					blogquest_posted_on();
					blogquest_posted_by();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<?php blogquest_post_thumbnail(); ?>
	<?php } ?>
	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'blogquest' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blogquest' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php blogquest_entry_footer_all(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
