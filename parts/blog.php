<?php
/**
 * Blog Section.
 */
$blog_posts = get_field('blog_posts') ?: [];
$blog_title = get_field('blog_section_title') ?: '';
$blog_label = get_field('blog_link') ?: '';
$category_url = '';

if ($blog_label) {
    $category = get_category_by_slug('uncategorized');
    if ($category) {
        $category_url = get_category_link($category->term_id);
    }
}
if (!empty($blog_posts)) { ?>
    <section class="blog-section">
        <div class="grid-container grid-container--s">

            <?php if ($blog_title) { ?>
                <div class="blog-section__title">
                    <h2 class="title"><?php echo esc_html($blog_title); ?></h2>
                </div>
            <?php } ?>

            <div class="grid-x grid-margin-x blog-section__grid">
                <?php foreach ($blog_posts as $post) {
                setup_postdata($post);
                    $post_id = $post->ID;
                    $post_date = get_the_date('d.m', $post_id);
                    $post_year = get_the_date('Y', $post_id);
                    $permalink = get_the_permalink($post_id);
                    $post_title = get_the_title($post_id);
                    $thumbnail_id = get_post_thumbnail_id($post_id);
                    $post_excerpt = wp_trim_words(get_the_content(), 17);
                    ?>
                    <div class="cell medium-6 post-card">
                        <a href="<?php echo esc_url($permalink); ?>" class="post-card__link">
                            <div class="post-card__date">
                                <p><?php echo esc_html($post_date); ?></p>
                                <p><?php echo esc_html($post_year); ?></p>
                            </div>

                            <h3 class="post-card__title">
                                <?php echo esc_html($post_title); ?>
                            </h3>

                            <?php if ($thumbnail_id) { ?>
                                <div class="post-card__img">
                                    <?php echo wp_get_attachment_image($thumbnail_id, 'large', false, ['class' => 'of-cover']); ?>
                                </div>
                            <?php } ?>

                            <?php if ($post_excerpt) { ?>
                                <div class="post-card__content">
                                    <p><?php echo wp_kses_post($post_excerpt); ?></p>
                                </div>
                            <?php } ?>
                        </a>
                    </div>
                <?php } wp_reset_postdata(); ?>
            </div>

            <?php if ($blog_label && $category_url) { ?>
                <div class="blog-section__link link">
                    <a href="<?php echo esc_url($category_url); ?>">
                        <?php echo esc_html($blog_label); ?>
                    </a>
                </div>
            <?php } ?>

        </div>
    </section>
<?php } ?>
