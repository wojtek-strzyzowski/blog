<?php
/**
 * Template part for displaying post archives
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BlogQuest
 */
$archive_style = blogquest_get_option('archive_style');

global $counter_article;
$class = '';

$post_format = get_post_format();

$enabled_post_meta = array();

switch ($archive_style) {
    case 'archive_style_1':
        $enabled_post_meta = blogquest_get_option('archive_post_meta_1');
        break;
    case 'archive_style_2':
        $enabled_post_meta = blogquest_get_option('archive_post_meta_2');
        break;
    case 'archive_style_3':
        $enabled_post_meta = blogquest_get_option('archive_post_meta_3');
        break;
    case 'archive_style_4':
        $enabled_post_meta = blogquest_get_option('archive_post_meta_4');
        break;

    default:
        // code...
        break;
}
if ($archive_style == 'archive_style_1') {
    if (($counter_article % 3) == 2) {
        $class = 'post-right-panel';
    } elseif (($counter_article % 3) == 1) {
        $class = 'post-left-panel';
    } elseif (($counter_article % 3) == 0) {
        $class = 'post-full-panel';
    }
}

if ($archive_style == 'archive_style_4') {
    $class = 'data-bg blogquest-bg-image';
}
?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(array('', $class)); ?>>

        <div class="article-block-wrapper">

            <?php get_template_part('template-parts/archive/entry-header-archive'); ?>

            <div class="entry-details">

                <?php get_template_part('template-parts/archive/archive', $post_format); ?>

            </div>

    </article><!-- #post-<?php the_ID(); ?> -->
<?php $counter_article++; ?>