<?php
/**
 * Archive.
 *
 * Standard loop for the archive page
 */
get_header('inner'); ?>
<main class="main-content">
    <section class="heading rel-content">
        <?php $posts_page_heading_image = get_field(
            'posts_page_heading_image', 'option'
        );
        if ($posts_page_heading_image) { ?>
            <?php echo wp_get_attachment_image($posts_page_heading_image, 'full', false, ['class' => 'stretched-img']); ?>
        <?php } ?>

        <div class="grid-container grid-container--s">
            <div class="cell small-12">
                <h2 class="title page-title page-title--category"><?php echo get_the_archive_title(); ?></h2>
            </div>
        </div>
    </section>
    <div class="grid-container">
        <div class="grid-x grid-margin-x posts-list">
            <!-- BEGIN of Archive Content -->
            <div class="large-8 small-12 cell">
                <?php if (have_posts()) { ?>
                    <?php while (have_posts()) {
                        the_post(); ?>
                        <?php get_template_part(
                            'parts/loop',
                            'post'
                        ); // Post item?>
                    <?php } ?>
                <?php } ?>
                <!-- BEGIN of pagination -->
                <?php foundation_pagination(); ?>
                <!-- END of pagination -->
            </div>
            <!-- END of Archive Content -->
            <!-- BEGIN of Sidebar -->
            <div class="large-4 small-12 cell sidebar">
                <?php get_sidebar('right'); ?>
            </div>
            <!-- END of Sidebar -->
        </div>
    </div>
</main>
<?php get_footer(); ?>
