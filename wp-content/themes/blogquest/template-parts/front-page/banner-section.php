<?php
/**
 * Displays Banner Section
 *
 * @package BlogQuest
 */
$is_banner_section = blogquest_get_option('enable_banner_section');
$enable_banner_overlay = blogquest_get_option('enable_banner_overlay');
$banner_section_cat = blogquest_get_option('banner_section_cat');
$banner_section_slider_layout = blogquest_get_option('banner_section_slider_layout');
$number_of_slider_post = blogquest_get_option('number_of_slider_post');
$enable_banner_cat_meta = blogquest_get_option('enable_banner_cat_meta');
$enable_banner_author_meta = blogquest_get_option('enable_banner_author_meta');
$enable_banner_date_meta = blogquest_get_option('enable_banner_date_meta');
$enable_banner_post_description = blogquest_get_option('enable_banner_post_description');
$slider_post_content_alignment = blogquest_get_option('slider_post_content_alignment');
$banner_overlay_class = '';
if ($enable_banner_overlay) {
    $banner_overlay_class = 'data-bg-overlay';
}
?>

<section class="site-section site-banner-section <?php echo esc_attr($banner_section_slider_layout); ?>">
    <div class="theme-banner-slider swiper-container">

        <?php if ($banner_section_slider_layout == 'site-banner-layout-slider') { ?>
            <div class="swiper-wrapper">
                <?php $banner_post_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => absint($number_of_slider_post), 'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html($banner_section_cat)));
                if ($banner_post_query->have_posts()):
                    while ($banner_post_query->have_posts()): $banner_post_query->the_post();
                        ?>
                        <div class="swiper-slide" data-swiper-parallax="45%">
                            <div class="theme-entry-media entry-image-large">
                                <a href="<?php the_permalink() ?>">
                                    <?php
                                    the_post_thumbnail('full', array(
                                        'alt' => the_title_attribute(array(
                                            'echo' => false,
                                        )),
                                    ));
                                    ?>
                                </a>
                                <div class="<?php echo $banner_overlay_class; ?>"></div>
                            </div>

                            <div class="entry-details <?php echo $slider_post_content_alignment; ?>">
                                <div class="wrapper">
                                    <?php if ($enable_banner_cat_meta) { ?>
                                        <div class="entry-meta">
                                            <div class="blogquest-meta post-categories">
                                                <?php the_category(' '); ?>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <?php the_title('<h2 class="entry-title entry-title-large"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>

                                    <?php if ($enable_banner_post_description) { ?>
                                        <?php the_excerpt(); ?>
                                    <?php } ?>
                                    <div class="entry-meta">
                                        <?php if ($enable_banner_date_meta) {
                                            blogquest_posted_on();
                                        } ?>
                                        <?php if ($enable_banner_author_meta) {
                                            blogquest_posted_by();
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php
                    endwhile;
                    wp_reset_postdata();
                endif; ?>
            </div>
            <div class="theme-swiper-control swiper-control">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>

            <div class="swiper-advance-pagination">
                <div class="swiper-fraction-pagination">
                    <span></span>
                    <span></span>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        <?php } else { ?>
            <div class="swiper-wrapper">
                <?php $banner_post_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => absint($number_of_slider_post), 'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html($banner_section_cat)));
                if ($banner_post_query->have_posts()):
                    while ($banner_post_query->have_posts()): $banner_post_query->the_post();

                        ?>
                        <div class="swiper-slide">
                            <div class="banner-layout-carousal-bg">
                                <div class="theme-entry-media entry-image-big">
                                    <a href="<?php the_permalink() ?>">
                                        <?php
                                        the_post_thumbnail('medium_large', array(
                                            'alt' => the_title_attribute(array(
                                                'echo' => false,
                                            )),
                                        ));
                                        ?>
                                    </a>
                                    <div class="<?php echo $banner_overlay_class; ?>"></div>
                                </div>
                                <div class="entry-details <?php echo $slider_post_content_alignment; ?>">

                                    <?php if ($enable_banner_cat_meta) { ?>
                                        <div class="entry-meta">
                                            <div class="blogquest-meta post-categories">
                                                <?php the_category(' '); ?>
                                            </div>
                                        </div><!-- .post-categories -->
                                    <?php } ?>

                                    <?php the_title('<h2 class="entry-title entry-title-medium"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>

                                    <?php if ($enable_banner_post_description) { ?>
                                        <?php the_excerpt(); ?>
                                    <?php } ?>
                                    <div class="entry-meta">
                                        <?php if ($enable_banner_date_meta) {
                                            blogquest_posted_on();
                                        } ?>
                                        <?php if ($enable_banner_author_meta) {
                                            blogquest_posted_by();
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php
                    endwhile;
                    wp_reset_postdata();
                endif; ?>
            </div>
            <div class="theme-swiper-control swiper-control">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-pagination theme-swiper-pagination"></div>
            </div>
        <?php } ?>

    </div>
</section>