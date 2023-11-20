<?php
/**
 * Displays Offcanvas widget
 *
 * @package BlogQuest
 */
?>

<?php if (is_active_sidebar('blogquest-offcanvas-widget')): ?>
    <div id="theme-offcanvas-widget" class="theme-offcanvas-panel theme-offcanvas-panel-widget" role="dialog" aria-labelledby="theme-offcanvas-widget-title" aria-modal="true">
        <div class="theme-offcanvas-header">
            <button id="theme-offcanvas-widget-close" class="theme-button theme-button-transparent"
                    aria-expanded="false">
                <span class="screen-reader-text"><?php _e('Close', 'blogquest'); ?></span>
                <?php blogquest_theme_svg('close'); ?>
            </button><!-- .nav-toggle -->
        </div>
        <div class="theme-offcanvas-content">
            <?php dynamic_sidebar('blogquest-offcanvas-widget'); ?>
        </div>
    </div> <!-- theme-offcanvas-panel-widget -->
<?php endif; ?>
