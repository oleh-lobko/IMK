<?php
/**
 * Video Section.
 */
$video_url = get_field('video_url') ?: '';
$video_image_id = get_field('video_image') ?: 0;

if (is_array($video_image_id)) {
    $video_image_id = $video_image_id['id'];
}

if (!empty($video_url)) { ?>
    <section class="video">
        <div class="grid-container grid-container--s">
            <a class="video__item" href="<?php echo esc_url($video_url); ?>"
               data-fancybox
               data-width="1440"
               data-height="846">
                <div class="video__wrapper">
                    <?php if ($video_image_id) { ?>
                        <?php echo wp_get_attachment_image($video_image_id, 'full', false, ['class' => 'video__image']); ?>
                    <?php } ?>
                </div>
            </a>
        </div>
    </section>
<?php } ?>
