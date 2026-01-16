<?php
/**
 * Home Tabs Section.
 */
$tabs = get_field('tabs') ?: [];
$section_id = 'tabs';

if (!empty($tabs)) {
    $tabs_link_text = get_field('tabs_link_text') ?: '';

    $category_link = '';
    if ($tabs_link_text) {
        $category = get_category_by_slug('uncategorized');
        if ($category) {
            $category_link = get_category_link($category->term_id);
        }
    }
    ?>

    <section class="h-tabs" id="<?php echo esc_attr($section_id); ?>">
        <div class="grid-container">
            <div class="h-tabs__content">

                <?php /* Desktop Navigation */ ?>
                <ul class="tabs show-for-large" data-tabs id="h-tabs" data-allow-all-closed="true">
                    <?php foreach ($tabs as $index => $tab) {
                        $is_active = (0 === $index); ?>
                        <li class="tabs-title <?php echo $is_active ? 'is-active' : ''; ?>">
                            <a href="#panel<?php echo $index; ?>v" aria-selected="<?php echo $is_active ? 'true' : 'false'; ?>">
                                <?php echo esc_html($tab['tab_title']); ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>

                <?php /* Mobile Navigation */ ?>
                <div class="h-tabs__select-box">
                    <select id="h-tabs-select" class="hide-for-large h-tabs__select" aria-label="Select service">
                        <?php foreach ($tabs as $index => $tab) { ?>
                            <option value="#panel<?php echo $index; ?>v">
                                <?php echo esc_html($tab['tab_title']); ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <?php /* Content Blocks */ ?>
                <div class="tabs-content" data-tabs-content="h-tabs">
                    <?php foreach ($tabs as $index => $tab) {
                        $main = $tab['tab_main_content'] ?: '';
                        $sub = $tab['tab_sub_content'] ?: '';
                        $is_active = (0 === $index);
                        ?>
                        <div class="tabs-panel <?php echo $is_active ? 'is-active' : ''; ?>" id="panel<?php echo $index; ?>v">

                            <?php if ($main) { ?>
                                <div class="tabs-panel__main">
                                    <div class="tabs-panel__box">
                                        <div class="tabs-panel__content">
                                            <?php echo wp_kses_post($main); ?>
                                        </div>
                                    </div>

                                    <?php if ($tabs_link_text && $category_link) { ?>
                                        <div class="tabs-panel__link link">
                                            <a aria-label="<?php echo esc_attr($tabs_link_text); ?>" href="<?php echo esc_url($category_link); ?>">
                                                <?php echo esc_html($tabs_link_text); ?>
                                            </a>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>

                            <?php if ($sub) { ?>
                                <div class="tabs-panel__sub">
                                    <div class="tabs-panel__content">
                                        <?php echo wp_kses_post($sub); ?>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                    <?php } ?>
                </div>

            </div>
        </div>
    </section>
<?php } ?>
