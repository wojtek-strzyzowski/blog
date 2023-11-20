<?php
/**
 * Displays progressbar
 *
 * @package BlogQuest
 */

$show_progressbar = blogquest_get_option( 'show_progressbar' );

if ( $show_progressbar ) :
	$progressbar_position = blogquest_get_option( 'progressbar_position' );
	echo '<div id="blogquest-progress-bar" class="theme-progress-bar ' . esc_attr( $progressbar_position ) . '"></div>';
endif;
