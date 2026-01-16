<?php
/**
 * Category.
 *
 * Standard loop for the category page
 */
get_header(); ?>
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
            <!-- BEGIN Category Content -->
            <div class="small-12 large-8 cell">
                <?php if (have_posts()) { ?>
                    <?php while (have_posts()) {
                        the_post(); ?><!-- BEGIN of Post -->
                        <?php get_template_part('parts/loop', 'post'); // Post item?>
                    <?php } ?>
                <?php } ?>
                <!-- BEGIN of pagination -->
                <?php foundation_pagination(); ?>
                <!-- END of pagination -->
            </div>
            <!-- END Category Content -->
            <!-- BEGIN of Sidebar -->
            <div class="small-12 large-4 cell sidebar">
                <?php get_sidebar('right'); ?>
            </div>
            <!-- END of Sidebar -->
        </div>
    </div>
</main>
<?php get_footer(); ?>
