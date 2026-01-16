<?php
$testimonials = get_field('testimonials_select') ?: [];
$button_text = get_field('testimonials_button_text') ?: '';
$archive_link = get_post_type_archive_link('testimonialss');
$section_id = 'slider';

if (!empty($testimonials)) { ?>
    <section class="testimonials" id="<?php echo esc_attr($section_id); ?>">
        <div class="grid-container grid-container--s">

            <div class="testimonials__slider">
                <?php foreach ($testimonials as $post) {
                setup_postdata($post);
                    $testimonial_title = get_the_title();
                    $testimonial_content = get_the_content();
                    $testimonial_img_id = get_post_thumbnail_id($post->ID);
                    ?>
                    <div class="testimonial">
                        <?php if ($testimonial_img_id) { ?>
                            <div class="testimonial__image">
                                <?php echo wp_get_attachment_image($testimonial_img_id, 'thumbnail', false, ['class' => 'of-cover']); ?>
                            </div>
                        <?php } ?>

                        <?php if ($testimonial_title) { ?>
                            <h2 class="testimonial__title title">
                                <?php echo esc_html($testimonial_title); ?>
                            </h2>
                        <?php } ?>

                        <?php if ($testimonial_content) { ?>
                            <div class="testimonial__content">
                                <?php echo wp_kses_post($testimonial_content); ?>
                            </div>
                        <?php } ?>
                    </div>
                <?php } wp_reset_postdata(); ?>
            </div>

            <?php if ($button_text && $archive_link) { ?>
                <div class="testimonials__link">
                    <a href="<?php echo esc_url($archive_link); ?>" aria-label="<?php echo esc_attr($button_text); ?>">
                        <?php echo esc_html($button_text); ?>
                    </a>
                </div>
            <?php } ?>

        </div>
    </section>
<?php } ?>
