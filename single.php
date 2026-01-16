<?php
/**
 * Single.
 *
 * Loop container for single post content
 */
get_header('inner'); ?>
<main class="main-content">
    <section class="heading rel-content">
        <?php $single_post_page_heading_image = get_field(
            'single_post_page_heading_image', 'option'
        );
        if ($single_post_page_heading_image) { ?>
            <?php echo wp_get_attachment_image($single_post_page_heading_image, 'full', false, ['class' => 'stretched-img']); ?>
        <?php } ?>

        <div class="grid-container grid-container--s">
            <div class="cell small-12">
                <h2 class="title page-title page-title--category"><?php echo the_title(); ?></h2>
            </div>
        </div>
    </section>
    <div class="grid-container grid-container--s">
        <div class="grid-x grid-margin-x">
            <!-- BEGIN of post content -->
            <div class="large-8 medium-8 small-12 cell">
                <?php if (have_posts()) { ?>
                    <?php while (have_posts()) {
                        the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
                            <?php if (has_post_thumbnail()) { ?>
                                <div title="<?php the_title_attribute(); ?>" class="entry__thumb">
                                    <?php the_post_thumbnail('large'); ?>
                                </div>
                            <?php } ?>
                            <p class="entry__meta"><?php echo sprintf(__('Written by %s on %s', 'fwp'), get_the_author_posts_link(), get_the_time(get_option('date_format'))); ?></p>
                            <div class="entry__content clearfix">
                                <?php the_content('', true); ?>
                            </div>
                            <h6 class="entry__cat"><?php _e('Posted Under: ', 'fwp'); ?><?php the_category(', '); ?></h6>
                        </article>
                    <?php } ?>
                <?php } ?>
            </div>
            <!-- END of post content -->

            <!-- BEGIN of sidebar -->
            <div class="large-4 medium-4 small-12 cell sidebar">
                <?php get_sidebar('right'); ?>
            </div>
            <!-- END of sidebar -->
        </div>
    </div>
</main>

<?php get_footer(); ?>
