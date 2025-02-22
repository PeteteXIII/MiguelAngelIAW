<?php
/**
 *  Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mobile Repair Zone
 */

$mobile_repair_zone_single_post_thumb =  get_theme_mod( 'mobile_repair_zone_single_post_thumb', 1 );
$mobile_repair_zone_single_post_title = get_theme_mod( 'mobile_repair_zone_single_post_title', 1 );
$mobile_repair_zone_single_post_tags = get_theme_mod( 'mobile_repair_zone_single_post_tags', 1 );
$mobile_repair_zone_single_post_page_content =  get_theme_mod( 'mobile_repair_zone_single_post_page_content', 1 );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php if ($mobile_repair_zone_single_post_title == 1 ) {?>
            <?php the_title('<h2 class="entry-title">', '</h2>'); ?>
        <?php }?>
        <?php if ($mobile_repair_zone_single_post_thumb == 1 ) {?>
            <?php if(has_post_thumbnail()) {?>
                <?php the_post_thumbnail(); ?>
            <?php }?>
        <?php }?>
    </header>
    <div class="entry-content">
        <?php if ($mobile_repair_zone_single_post_page_content == 1 ) {?>
            <?php
            the_content(sprintf(
                wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                    __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'mobile-repair-zone'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                esc_html( get_the_title() )
            ));

            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'mobile-repair-zone'),
                'after' => '</div>',
            ));
            ?>
        <?php }?>
        <?php if ($mobile_repair_zone_single_post_tags == 1 ) {?>
            <?php the_tags(); ?>
        <?php }?>
    </div>
</article>