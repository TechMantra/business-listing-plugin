# Business Listing Plugin

## File Structure

<code>
business-listing-plugin/
├── includes/
│   ├── acf-fields.php
│   ├── custom-post-types.php
│   ├── gutenberg-blocks.php
│   ├── site-creation.php
│   └── user-registration.php
├── blocks/
│   ├── build/
│   └── src/
│       ├── business-details/
│       │   └── index.js
│       ├── business-services/
│       │   └── index.js
│       ├── service-product/
│       │   └── index.js
│       ├── lead/
│       │   └── index.js
│       └── index.js
├── business-listing-plugin.php
└── webpack.config.js
</code>

## How to Use

1. Install and activate the plugin.
2. Add Business Listings via the custom post type in the admin area.
3. Add Services and Products via the custom post type in the admin area.
4. Add Leads via the custom post type in the admin area.
5. Use the Gutenberg blocks to display the custom post types on pages or posts.
6. A new user will be created automatically when a new Business Listing is added.

## Requirements

- Advanced Custom Fields PRO plugin.
- WordPress 5.0+ for Gutenberg block support.

## WhatsApp Integration

Add the leads to a WhatsApp group manually or via third-party integration services.

## New Business registration form Usage
You can create a New Page: In your WordPress admin, you can create a new page to display the business signup form.
Add Shortcode: Add the shortcode [business_signup_form] to the content of this page.
