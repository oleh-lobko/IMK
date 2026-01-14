<?php
/**
 * Footer.
 */
?>

<footer class="footer">
    <div class="grid-container grid-container--s">
        <div class="grid-x grid-margin-x footer__container">
            <div class="cell large-3">
                <div class="footer__logo">
                    <?php if ($footer_logo = get_field('footer_logo', 'options')) {
                        echo wp_get_attachment_image($footer_logo['id'], 'medium');
                    } else {
                        show_custom_logo();
                    } ?>
                </div>
            </div>

            <div class="cell large-6 footer__menus">
                <?php if (has_nav_menu('footer-first-menu')) { ?>
                    <div class="footer__menu">
                        <div class="footer__menu-links">
                            <?php wp_nav_menu([
                                'theme_location' => 'footer-first-menu',
                                'container' => false,
                                'items_wrap' => '%3$s',
                                'depth' => 1,
                            ]); ?>
                        </div>
                    </div>
                <?php } ?>

                <?php if (has_nav_menu('footer-second-menu')) { ?>
                    <div class="footer__menu">
                        <div class="footer__menu-links">
                            <?php wp_nav_menu([
                                'theme_location' => 'footer-second-menu',
                                'container' => false,
                                'items_wrap' => '%3$s',
                                'depth' => 1,
                            ]); ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if (has_nav_menu('footer-third-menu')) { ?>
                    <div class="footer__menu">
                        <div class="footer__menu-links">
                            <?php wp_nav_menu([
                                'theme_location' => 'footer-third-menu',
                                'container' => false,
                                'items_wrap' => '%3$s',
                                'depth' => 1,
                            ]); ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php $socials_text = get_field('social_media_title', 'option');
            if ($socials_text) { ?>
            <div class="cell large-3 footer__sp">
                    <h3 class="footer__title title"><?php echo esc_html(
                            $socials_text
                        ); ?></h3>
                <?php } ?>
                <?php get_template_part('parts/socials'); ?>
                <?php if ($copyright = get_field('copyright', 'options')) { ?>
                    <div class="footer__copy"><?php echo $copyright; ?></div>
                <?php } ?>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
