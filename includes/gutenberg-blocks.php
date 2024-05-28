<?php

function blp_enqueue_block_editor_assets() {
    wp_enqueue_script(
        'blp-editor-script',
        plugins_url('blocks/build/index.js', __FILE__),
        array('wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-data'),
        filemtime(plugin_dir_path(__FILE__) . 'blocks/build/index.js')
    );

    wp_enqueue_style(
        'blp-editor-style',
        plugins_url('blocks/build/index.css', __FILE__),
        array('wp-edit-blocks'),
        filemtime(plugin_dir_path(__FILE__) . 'blocks/build/index.css')
    );
}
add_action('enqueue_block_editor_assets', 'blp_enqueue_block_editor_assets');

function blp_register_custom_blocks() {
    register_block_type('blp/business-details', array(
        'editor_script' => 'blp-editor-script',
        'render_callback' => 'blp_render_business_details_block',
    ));

    register_block_type('blp/business-services', array(
        'editor_script' => 'blp-editor-script',
        'render_callback' => 'blp_render_business_services_block',
    ));
}
add_action('init', 'blp_register_custom_blocks');

function blp_render_business_details_block($attributes) {
    // Render business details block
    ob_start();
    ?>
    <div class="business-details">
        <p>Business Name: <?php echo esc_html(get_field('business_name')); ?></p>
        <p>Type of Company: <?php echo esc_html(get_field('company_type')); ?></p>
        <p>GST No.: <?php echo esc_html(get_field('gst_no')); ?></p>
        <p>TAN/PAN: <?php echo esc_html(get_field('tan_pan')); ?></p>
        <p>Location/s: <?php echo esc_html(get_field('location')); ?></p>
        <p>Website: <a href="<?php echo esc_url(get_field('website')); ?>"><?php echo esc_url(get_field('website')); ?></a></p>
        <p>Social Media: <?php echo esc_html(get_field('social_media')); ?></p>
    </div>
    <?php
    return ob_get_clean();
}

function blp_render_business_services_block($attributes) {
    // Render business services block
    ob_start();
    $services = new WP_Query(array(
        'post_type' => 'service_product',
        'posts_per_page' => -1,
        'author' => get_current_user_id(),
    ));
    ?>
    <div class="business-services">
        <h2>Services</h2>
        <ul>
            <?php while ($services->have_posts()): $services->the_post(); ?>
                <li><?php the_title(); ?></li>
            <?php endwhile; wp_reset_postdata(); ?>
        </ul>
    </div>
    <?php
    return ob_get_clean();
}
