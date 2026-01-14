<?php

use theme\Util;

add_action('init', function () {
    Util::registerPostType(
        'testimonialss',
        'Testimonial',
        'Testimonials',
        ['supports' => ['title', 'thumbnail', 'editor'], 'has_archive' => true],
    );
});
