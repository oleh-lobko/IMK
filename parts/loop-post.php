<!-- BEGIN of Post -->
<article id="post-<?php the_ID(); ?>" <?php post_class('preview preview--' . get_post_type()); ?>>
    <div class="grid-x preview__container">
        <?php if (has_post_thumbnail()) { ?>
            <div class="small-12 medium-4 cell text-center medium-text-left">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <?php the_post_thumbnail('medium', ['class' => 'preview__thumb']); ?>
                </a>
            </div>
        <?php } ?>
        <div class="small-12 medium-auto cell preview__content">
            <h3 class="preview__title title">
                <a href="<?php the_permalink(); ?>"
                   title="<?php echo esc_attr(sprintf(__('Permalink to %s', 'fwp'), the_title_attribute('echo=0'))); ?>"
                   rel="bookmark"><?php echo get_the_title() ?: __('No title', 'fwp'); ?>
                </a>
            </h3>
            <p class="preview__excerpt">
                <?php echo wp_trim_words(get_the_content(), 17); ?>
            </p>
            <p class="preview__meta"><?php echo sprintf(__('Written by %s on %s', 'fwp'), get_the_author_posts_link(), get_the_time(get_option('date_format'))); ?></p>
        </div>
    </div>
</article>
<!-- END of Post -->
