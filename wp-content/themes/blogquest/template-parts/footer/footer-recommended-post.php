<?php
/**
 * Displays recommended post on footer.
 *
 * @package BlogQuest
 */
$enable_category_meta = blogquest_get_option('enable_category_meta');
$enable_date_meta = blogquest_get_option('enable_date_meta');
$enable_post_excerpt = blogquest_get_option('enable_post_excerpt');
$enable_author_meta = blogquest_get_option('enable_author_meta');
$footer_recommended_post_title = blogquest_get_option('footer_recommended_post_title');
$select_cat_for_footer_recommended_post = blogquest_get_option('select_cat_for_footer_recommended_post');
?>
<section class="site-section site-recommendation-section">
    <div class="wrapper">
         <header class="section-header">
             <h2 class="site-section-title">
                 <?php echo esc_html($footer_recommended_post_title); ?>
             </h2>
         </header>

        <div class="column-row">

            <?php $footer_recommended_post_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 6, 'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html($select_cat_for_footer_recommended_post)));
            if ($footer_recommended_post_query->have_posts()):
            while ($footer_recommended_post_query->have_posts()): $footer_recommended_post_query->the_post();
                ?>
                <div class="column column-4 column-sm-6 column-xs-12">
                    <article id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post theme-recommended-post article-has-effect'); ?>>

                        <?php if (has_post_thumbnail()):?>
                            <div class="theme-entry-media entry-image-medium">
                                    <a href="<?php the_permalink() ?>">
                                        <?php
                                        the_post_thumbnail('medium_large', array(
                                            'alt' => the_title_attribute(array(
                                                'echo' => false,
                                            )),
                                        ));
                                        ?>
                                    </a>
                                    <?php if (blogquest_get_option('show_lightbox_image')) { ?>
                                        <a href="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" class="featured-media-fullscreen" data-glightbox="">
                                            <?php blogquest_theme_svg('fullscreen'); ?>
                                        </a>
                                    <?php } ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($enable_category_meta) { ?>
                           <div class="entry-meta">
<div class="blogquest-meta post-categories">
    <?php the_category(' '); ?>
</div>
</div><!-- .post-categories -->
                        <?php } ?>

                        <header class="entry-header">
                            <?php the_title( '<h3 class="entry-title entry-title-medium"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
                        </header>
                        <?php if ($enable_post_excerpt) { ?>
                            <div class="entry-content">
                                <?php the_excerpt(); ?>
                            </div>
                        <?php } ?>
                        <?php if ($enable_date_meta) {  blogquest_posted_on(); } ?>
                        <?php if ($enable_author_meta) { blogquest_posted_by(); } ?>
                    </article>
                </div>
            <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>
<?php endif; ?>
        