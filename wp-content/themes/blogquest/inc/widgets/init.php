<?php

/* Theme Widget sidebars. */
require get_template_directory() . '/inc/widgets/widgets.php';
require get_template_directory() . '/inc/widgets/widget-base/widgetbase.php';

require get_template_directory() . '/inc/widgets/recent-widget.php';
require get_template_directory() . '/inc/widgets/social-widget.php';
require get_template_directory() . '/inc/widgets/author-widget.php';
require get_template_directory() . '/inc/widgets/newsletter-widget.php';
require get_template_directory() . '/inc/widgets/tab-widget.php';
require get_template_directory() . '/inc/widgets/cta-widget.php';
require get_template_directory() . '/inc/widgets/image-widget.php';

/* Register site widgets */
if ( ! function_exists( 'blogquest_widgets' ) ) :
    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function blogquest_widgets() {
        register_widget( 'BlogQuest_Recent_Posts' );
        register_widget( 'BlogQuest_Social_Menu' );
        register_widget( 'BlogQuest_Author_Info' );
        register_widget( 'BlogQuest_Mailchimp_Form' );
        register_widget( 'BlogQuest_Call_To_Action' );
        register_widget( 'BlogQuest_Tab_Posts' );
        register_widget( 'BlogQuest_Image_Widget' );
    }
endif;
add_action( 'widgets_init', 'blogquest_widgets' );