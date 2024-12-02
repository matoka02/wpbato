<?php
add_action('wp_enqueue_scripts', 'bado_scripts');
function bado_scripts()
{
    // Styles
    wp_enqueue_style(
        'bado-style',
        get_template_directory_uri() . '/assets/scss/app.min.css',
        array(),
        _VERSION
    );

    //Scripts
    wp_enqueue_script('jquery');
    wp_enqueue_script(
        'bado-script',
        get_template_directory_uri() . '/assets/js/app.min.js',
        array(),
        _VERSION,
        true
    );
}
