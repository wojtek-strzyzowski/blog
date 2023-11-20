<?php
/**
 * Displays the Topbar
 *
 * @package BlogQuest
 */

$hide_topbar_on_mobile = blogquest_get_option('hide_topbar_on_mobile');

$enable_topbar_nav = blogquest_get_option('enable_topbar_nav');
$enable_topbar_social_icons = blogquest_get_option('enable_topbar_social_icons');

$enable_dark_mode = blogquest_get_option('enable_dark_mode');
$enable_dark_mode_switcher = blogquest_get_option('enable_dark_mode_switcher');

$enable_search = blogquest_get_option('enable_search_on_header');

?>
<div id="theme-topbar" class="site-topbar theme-site-topbar <?php echo ($hide_topbar_on_mobile) ? 'hide-on-mobile': '';?>">
    <div class="wrapper">
        <div class="site-topbar-wrapper">

            <div class="site-topbar-item site-topbar-left">
                <?php if (is_active_sidebar('blogquest-offcanvas-widget')): ?>

                    <button id="theme-offcanvas-widget-button" class="theme-button theme-button-transparent theme-button-offcanvas">
                        <span class="screen-reader-text"><?php _e('Offcanvas Widget', 'blogquest'); ?></span>
                        <span class="toggle-icon"><?php blogquest_theme_svg('menu-alt'); ?></span>
                    </button>

                <?php endif; ?>

                <?php
                if ($enable_topbar_social_icons) :
                    wp_nav_menu(
                        array(
                            'theme_location' => 'social-menu',
                            'container_class' => 'site-header-component topbar-component-social-navigation hidden-xs-screen',
                            'fallback_cb' => false,
                            'depth' => 1,
                            'menu_class' => 'theme-social-navigation theme-menu theme-topbar-navigation',
                            'link_before' => '<span class="screen-reader-text">',
                            'link_after' => '</span>',
                        )
                    );
                endif;
                ?>
            </div>

            <div class="site-topbar-item site-topbar-center hide-on-tablet hide-on-mobile">
                <?php
                if ($enable_topbar_nav) :
                    wp_nav_menu(
                        array(
                            'theme_location' => 'top-menu',
                            'container_class' => 'site-header-component topbar-component-top-navigation hidden-sm-screen hidden-xs-screen',
                            'fallback_cb' => false,
                            'depth' => 2,
                            'menu_class' => 'theme-top-navigation theme-menu theme-topbar-navigation',
                        )
                    );
                endif;
                ?>
            </div>

            <div class="site-topbar-item site-topbar-right">
                <?php $blog_mini_cart = blogquest_get_option('enable_mini_cart_header');
                if ($blog_mini_cart && class_exists('WooCommerce')) {
                    blogquest_woocommerce_cart_count();
                } ?>

                <?php
                $enable_random_post = blogquest_get_option('enable_random_post');
                if ($enable_random_post) {
                    $random_post_category = blogquest_get_option('random_post_category');
                    $rand_posts_arg = array(
                        'posts_per_page' => 1,
                        'orderby' => 'rand'
                    );
                    if ($random_post_category) {
                        $rand_posts_arg['cat'] = absint($random_post_category);
                    }
                    $rand_posts = get_posts($rand_posts_arg);

                    if ($rand_posts) {
                        ?>
                        <a href="<?php echo esc_url(get_permalink($rand_posts[0]->ID)); ?>"
                           class="theme-button theme-button-transparent theme-button-shuffle">
                            <span class="screen-reader-text"><?php _e('Shuffle', 'blogquest'); ?></span>
                            <?php blogquest_theme_svg('shuffle'); ?>
                        </a>
                        <?php
                    }
                }
                ?>

                <button id="theme-toggle-offcanvas-button" class="hide-on-desktop theme-button theme-button-transparent theme-button-offcanvas" aria-expanded="false" aria-controls="theme-offcanvas-navigation">
                    <span class="screen-reader-text"><?php _e('Menu', 'blogquest'); ?></span>
                    <span class="toggle-icon"><?php blogquest_theme_svg('menu'); ?></span>
                </button>

                <?php if ($enable_dark_mode && $enable_dark_mode_switcher) : ?>
                    <button id="theme-toggle-mode-button" class="theme-button theme-button-transparent theme-button-colormode" title="<?php _e('Toggle light/dark mode', 'blogquest'); ?>" aria-label="auto" aria-live="polite">
                        <span class="screen-reader-text"><?php _e('Switch color mode', 'blogquest'); ?></span>
                        <svg class="svg-icon svg-icon-colormode" aria-hidden="true" width="24" height="24" viewBox="0 0 24 24">
                            <mask class="moon" id="moon-mask">
                                <rect x="0" y="0" width="100%" height="100%" fill="white"/>
                                <circle cx="24" cy="10" r="6" fill="black"/>
                            </mask>
                            <circle class="sun" cx="12" cy="12" r="6" mask="url(#moon-mask)" fill="currentColor"/>
                            <g class="sun-beams" stroke="currentColor">
                                <line x1="12" y1="1" x2="12" y2="3"/>
                                <line x1="12" y1="21" x2="12" y2="23"/>
                                <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/>
                                <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/>
                                <line x1="1" y1="12" x2="3" y2="12"/>
                                <line x1="21" y1="12" x2="23" y2="12"/>
                                <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/>
                                <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/>
                            </g>
                        </svg>
                    </button>
                <?php endif; ?>

                <button id="theme-toggle-search-button" class="theme-button theme-button-transparent theme-button-search" aria-expanded="false" aria-controls="theme-header-search">
                    <span class="screen-reader-text"><?php _e('Search', 'blogquest'); ?></span>
                    <?php blogquest_theme_svg('search'); ?>
                </button>
            </div>

        </div>
    </div>
</div>
