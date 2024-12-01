<?php

// Swiper Slider
function my_theme_enqueue_swiper()
{
  wp_enqueue_style('swiper-css', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.css');
  wp_enqueue_script('swiper-js', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js');
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_swiper');