<?php
/**
 * FAQ Section.
 */
$faq_items = get_field('faq', 'option') ?: [];

if (!empty($faq_items)) {
    $faq_section_title = get_field('faq_section_title', 'option') ?: ''; ?>
    <section class="faqs">
        <div class="grid-container grid-container--s">

            <?php if ($faq_section_title) { ?>
                <div class="faqs__title">
                    <h2 class="title"><?php echo esc_html($faq_section_title); ?></h2>
                </div>
            <?php } ?>

            <ul class="accordion" data-accordion data-allow-all-closed="true">
                <?php foreach ($faq_items as $index => $item) {
                    $faq_title = $item['faq_title'] ?: '';
                    $faq_content = $item['faq_content'] ?: '';
                    $is_active = (0 === $index);
                    ?>
                    <li class="accordion-item <?php echo $is_active ? 'is-active' : ''; ?>" data-accordion-item>
                        <a href="#" class="accordion-title a-title">
                            <?php echo esc_html($faq_title); ?>
                        </a>
                        <div class="accordion-content" data-tab-content>
                            <div class="accordion-content__inner">
                                <?php echo wp_kses_post($faq_content); ?>
                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>

        </div>
    </section>
<?php } ?>
