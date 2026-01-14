<?php
/**
 * Side Tabs Section.
 */
$side_tabs = get_field('side_tabs') ?: [];

if (!empty($side_tabs)) { ?>
    <section class="side_tabs">
        <div class="grid-container grid-container--s">
            <div class="grid-x align-justify">

                <?php ?>
                <div class="cell large-3">
                    <ul class="tabs vertical"
                        data-responsive-accordion-tabs="accordion large-tabs"
                        id="v-tabs"
                        data-allow-all-closed="true">

                        <?php foreach ($side_tabs as $index => $tab) {
                            $side_tab_title = $tab['side_tab_title'] ?: '';
                            $is_active = (0 === $index);
                            ?>
                            <li class="tabs-title <?php echo $is_active ? 'is-active' : ''; ?>">
                                <a href="#v-panel<?php echo $index; ?>" aria-selected="<?php echo $is_active ? 'true' : 'false'; ?>">
                                    <?php echo esc_html($side_tab_title); ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>

                <?php ?>
                <div class="cell large-8">
                    <div class="tabs-content" data-tabs-content="v-tabs">
                        <?php foreach ($side_tabs as $index => $tab) {
                            $side_tab_image_id = $tab['side_tab_image'] ?: 0;
                            $side_tab_content = $tab['side_tab_content'] ?: '';
                            $is_active = (0 === $index);
                            ?>
                            <div class="tabs-panel <?php echo $is_active ? 'is-active' : ''; ?>" id="v-panel<?php echo $index; ?>">

                                <?php if ($side_tab_image_id) { ?>
                                    <div class="tabs-panel__image">
                                        <?php echo wp_get_attachment_image($side_tab_image_id, 'full'); ?>
                                    </div>
                                <?php } ?>

                                <?php if ($side_tab_content) { ?>
                                    <div class="tabs-panel__content">
                                        <?php echo wp_kses_post($side_tab_content); ?>
                                    </div>
                                <?php } ?>

                            </div>
                        <?php } ?>
                    </div>
                </div>

            </div>
        </div>
    </section>
<?php } ?>
