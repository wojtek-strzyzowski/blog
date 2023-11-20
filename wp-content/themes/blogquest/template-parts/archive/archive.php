<?php
/**
 * Show the excerpt.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BlogQuest
 * @since BlogQuest 1.0.0
 */
if ( absint(blogquest_get_option( 'excerpt_length' )) != '0'){
    the_excerpt();
}