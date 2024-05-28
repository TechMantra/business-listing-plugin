<?php

function blp_send_whatsapp_message($number, $message) {
    // Here you need to integrate with a WhatsApp API like Twilio or WhatsApp Business API
    // The following is just a placeholder for the actual API call
    $api_url = 'https://api.whatsapp.com/send?phone=' . $number . '&text=' . urlencode($message);
    wp_remote_get($api_url);
}

function blp_notify_new_lead($post_id, $post, $update) {
    if ($post->post_type != 'lead' || $update) {
        return;
    }

    $business_id = get_field('business', $post_id);
    $business_user_id = get_post_field('post_author', $business_id);
    $whatsapp_number = get_user_meta($business_user_id, 'whatsapp_number', true);
    $lead_details = get_the_title($post_id) . ': ' . get_the_content($post_id);

    if ($whatsapp_number) {
        blp_send_whatsapp_message($whatsapp_number, 'New lead: ' . $lead_details);
    }
}
add_action('save_post', 'blp_notify_new_lead', 10, 3);
