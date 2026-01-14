<?php
/**
 * Template Name: Home Page.
 */
get_header(); ?>

<?php if (shortcode_exists('slider')) {
    echo do_shortcode('[slider]');
} ?>
<?php get_template_part('parts/home-tabs'); ?>
<?php get_template_part('parts/side-tabs'); ?>
<?php get_template_part('parts/faq'); ?>
<?php get_template_part('parts/video'); ?>
<?php get_template_part('parts/testimonial'); ?>
    <div class="grid-container">
        <div class="grid-x grid-margin-x">
            <div class="cell">
                <?php if (have_posts()) {
                    while (have_posts()) {
                    the_post();
                        the_content();
                    }
                } ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>
