<?php

function blp_register_acf_fields() {
    if( function_exists('acf_add_local_field_group') ) {
        acf_add_local_field_group([
            'key' => 'group_business_listing',
            'title' => 'Business Listing Details',
            'fields' => [
                [
                    'key' => 'field_business_name',
                    'label' => 'Business Name',
                    'name' => 'business_name',
                    'type' => 'text',
                    'required' => 1,
                ],
                [
                    'key' => 'field_company_type',
                    'label' => 'Type of Company',
                    'name' => 'company_type',
                    'type' => 'select',
                    'choices' => [
                        'Pvt Ltd' => 'Pvt Ltd',
                        'LLP' => 'LLP',
                        'OPC' => 'OPC',
                    ],
                    'required' => 1,
                ],
                [
                    'key' => 'field_gst_no',
                    'label' => 'GST No.',
                    'name' => 'gst_no',
                    'type' => 'text',
                    'required' => 1,
                ],
                [
                    'key' => 'field_tan_pan',
                    'label' => 'TAN/PAN',
                    'name' => 'tan_pan',
                    'type' => 'text',
                    'required' => 1,
                ],
                [
                    'key' => 'field_location',
                    'label' => 'Location/s',
                    'name' => 'location',
                    'type' => 'text',
                    'required' => 1,
                ],
                [
                    'key' => 'field_website',
                    'label' => 'Website',
                    'name' => 'website',
                    'type' => 'url',
                ],
                [
                    'key' => 'field_social_media',
                    'label' => 'Social Media Handles',
                    'name' => 'social_media',
                    'type' => 'text',
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'business_listing',
                    ],
                ],
            ],
        ]);

        acf_add_local_field_group([
            'key' => 'group_service_product',
            'title' => 'Service/Product Details',
            'fields' => [
                [
                    'key' => 'field_service_product_description',
                    'label' => 'Description',
                    'name' => 'description',
                    'type' => 'textarea',
                    'required' => 1,
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'service_product',
                    ],
                ],
            ],
        ]);

        acf_add_local_field_group([
            'key' => 'group_lead',
            'title' => 'Lead Details',
            'fields' => [
                [
                    'key' => 'field_lead_name',
                    'label' => 'Lead Name',
                    'name' => 'lead_name',
                    'type' => 'text',
                    'required' => 1,
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'lead',
                    ],
                ],
            ],
        ]);
    }
}
add_action('acf/init', 'blp_register_acf_fields');
