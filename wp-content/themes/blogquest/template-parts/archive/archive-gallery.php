<?php
/**
 * Show the appropriate content for the Gallery post format.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BlogQuest
 * @since BlogQuest 1.0.0
 */

 // Print the 1st gallery found.
if ( has_block( 'core/gallery', get_the_content() ) ) {
	blogquest_print_first_instance_of_block( 'core/gallery', get_the_content() );
}
    if ( absint(blogquest_get_option( 'excerpt_length' )) != '0'){
        the_excerpt();  
    }