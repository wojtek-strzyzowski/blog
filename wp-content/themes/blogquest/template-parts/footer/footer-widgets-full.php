<?php 
/**
 * Displays before footer widget area.
 *
 * @package BlogQuest
 */

if ( is_active_sidebar( 'fullwidth-footer-widgetarea' ) ) : ?>

<div class="theme-widgetarea theme-widgetarea-full" role="complementary">
    <div class="wrapper">
        <?php dynamic_sidebar( 'fullwidth-footer-widgetarea' ); ?>
    </div>
</div>

<?php endif; ?>