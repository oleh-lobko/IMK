<?php
/**
 * Contact Form Section.
 */
$contact_form_obj = get_field('contact_form_item');
$form_description = get_field('contact_form_description') ?: '';
$form_bg_id = get_field('contact_form_background') ?: 0;
$form_id = 0;
$section_id = 'contacts';
if (!empty($contact_form_obj)) {
    $form_id = is_array($contact_form_obj) ? $contact_form_obj['id'] : $contact_form_obj;
}

if ($form_id) { ?>
    <section class="contact-form" id="<?php echo esc_attr($section_id); ?>" <?php echo bg($form_bg_id); ?>>
        <div class="grid-container">
            <div class="contact-form__wrapper">

                <?php if ($form_description) { ?>
                    <div class="contact-form__description">
                        <h2 class="contact-form__title title">
                            <?php echo wp_kses_post($form_description); ?>
                        </h2>
                    </div>
                <?php } ?>

                <div class="contact-form__item">
                    <?php
                    gravity_form($form_id, false, false, false, null, true);
                    ?>
                </div>

            </div>
        </div>
    </section>
<?php } ?>
