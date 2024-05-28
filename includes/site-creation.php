<?php

function blp_create_site_for_business($post_id, $post, $update) {
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

        // Create sub-site for the business
        $site_domain = $user_login . '.' . parse_url(network_site_url(), PHP_URL_HOST);
        $site_id = wpmu_create_blog(
            $site_domain,
            '/',
            $business_name,
            $user_id,
            array( 'public' => 1 ),
            get_current_network_id()
        );

        if (!is_wp_error($site_id)) {
            // Add business details to the new site
            switch_to_blog($site_id);

            // Create pages
            wp_insert_post([
                'post_title' => 'Home',
                'post_content' => 'Welcome to ' . $business_name,
                'post_status' => 'publish',
                'post_type' => 'page',
            ]);

            wp_insert_post([
                'post_title' => 'Services',
                'post_content' => '',
                'post_status' => 'publish',
                'post_type' => 'page',
            ]);

            wp_insert_post([
                'post_title' => 'Contact',
                'post_content' => '',
                'post_status' => 'publish',
                'post_type' => 'page',
            ]);

            wp_insert_post([
                'post_title' => 'About',
                'post_content' => '',
                'post_status' => 'publish',
                'post_type' => 'page',
            ]);

            // Update home page content
            update_post_meta($post_id, 'home_content', 'Welcome to ' . $business_name);

            restore_current_blog();
        }
    }
}
add_action('save_post', 'blp_create_site_for_business', 10, 3);
