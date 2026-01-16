<?php
/**
 * Plans Comparison Table.
 */
$features = get_terms([
    'taxonomy' => 'feature',
    'hide_empty' => true,
]) ?: [];

$plans = get_field('plans_select') ?: [];
$plans_button_text = get_field('plans_button_text') ?: '';
$features_count = count($features);
$plans_count = count($plans);
$section_id = 'tables';
if (!empty($features) && !empty($plans)) { ?>
    <section class="plans" id="<?php echo esc_attr($section_id); ?>">
        <div class="grid-container grid-container--s">
            <div class="plans__table"
                 style="grid-template-rows: 60px repeat(<?php echo esc_attr($features_count + 1); ?>, 53px);
                     grid-template-columns: 1.23fr repeat(<?php echo esc_attr($plans_count); ?>, 1fr);">
                <div class="plans__col show-for-large">
                    <div class="plans__cell plans__cell--label"></div>
                    <?php foreach ($features as $feature) { ?>
                        <div class="plans__cell">
                            <?php echo esc_html($feature->name); ?>
                        </div>
                    <?php } ?>
                    <div class="plans__cell plans__cell--bottom"></div>
                </div>
                <?php foreach ($plans as $post) {
                setup_postdata($post);
                    $plan_id = $post->ID;
                    $plan_color = get_field('plan_background_color', $plan_id) ?: 'transparent';
                    $plan_terms = get_the_terms($plan_id, 'feature') ?: [];
                    $plan_feature_ids = wp_list_pluck($plan_terms, 'term_id');
                    ?>
                    <div class="plans__col">
                        <div class="plans__cell plans__cell--label" style="background-color: <?php echo esc_attr($plan_color); ?>">
                            <h3 class="plans__plan-title"><?php echo get_the_title($plan_id); ?></h3>
                        </div>

                        <?php foreach ($features as $feature) {
                            $has_feature = in_array($feature->term_id, $plan_feature_ids);
                            ?>
                            <div class="plans__cell <?php echo $has_feature ? 'plans__cell--ticked' : 'plans__cell--none'; ?>"
                                 data-feature="<?php echo esc_attr($feature->name); ?>"
                                 style="background-color: <?php echo esc_attr($plan_color); ?>">
                            </div>
                        <?php } ?>

                        <div class="plans__cell plans__cell--bottom" style="background-color: <?php echo esc_attr($plan_color); ?>">
                            <a href="<?php echo get_the_permalink($plan_id); ?>">
                                <?php echo esc_html($plans_button_text); ?>
                            </a>
                        </div>
                    </div>
                <?php } wp_reset_postdata(); ?>

            </div>
        </div>
    </section>
<?php } ?>
