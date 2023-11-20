<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BlogQuest
 */

global $post;
$blogquest_page_layout = esc_html( get_post_meta( $post->ID, 'blogquest_page_layout', true ) ); 
if (empty($blogquest_page_layout)) {
    $blogquest_page_layout = 'layout-1';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ($blogquest_page_layout == "layout-1") { ?>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title entry-title-large">', '</h1>' ); ?>
		</header><!-- .entry-header -->
	<?php blogquest_post_thumbnail(); ?>
	<?php $display_read_time_in = blogquest_get_option('display_read_time_in');
	if (in_array('single-page', $display_read_time_in)) {
	    blogquest_read_time();
	} ?>
	<?php } ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blogquest' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'blogquest' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
