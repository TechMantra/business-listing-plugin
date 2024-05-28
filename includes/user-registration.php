<?php

function blp_create_user_for_business($post_id, $post, $update) {
    if ($post->post_type != 'business_listing' || $update) {
        return;
    }

    $business_name = get_field('business_name', $post_id);
    $user_login = sanitize_user($business_name);
    $user_email = sanitize_email($user_login . '@example.com');
    $user_pass = wp_generate_password();
    $user_id = wp_create_user($user_login, $user_pass, $user_email);

    if (!is_wp_error($user_id)) {
        wp_update_post([
            'ID' => $post_id,
            'post_author' => $user_id,
        ]);

        wp_mail($user_email, 'Your Business Listing Account', "Username: $user_login\nPassword: $user_pass");
    }
}
add_action('save_post', 'blp_create_user_for_business', 10, 3);
