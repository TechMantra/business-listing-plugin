<?php

function blp_register_custom_post_types() {
    register_post_type('business_listing', [
        'label' => 'Business Listing',
        'public' => true,
        'supports' => ['title', 'editor'],
        'show_in_rest' => true,
    ]);

    register_post_type('service_product', [
        'label' => 'Service/Product',
        'public' => true,
        'supports' => ['title', 'editor'],
        'show_in_rest' => true,
    ]);

    register_post_type('lead', [
        'label' => 'Lead',
        'public' => true,
        'supports' => ['title', 'editor'],
        'show_in_rest' => true,
    ]);
}
add_action('init', 'blp_register_custom_post_types');
