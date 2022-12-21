<?php
function gavias_content_builder_set_elements(){
   return $shortcodes = array(
    'gva_column',
    'gva_row',
    'gva_accordion',
    'gva_box_color', 
    'gva_box_hover', 
    'gva_call_to_action',
    'gva_carousel_content',
    'gva_chart',
    'gva_code',
    'gva_text',
    'gva_text_noeditor',
    'gva_counter',
    'gva_drupal_block',
    'gva_heading',
    'gva_icon_box_classic',
    'gva_icon_box_color',
    'gva_image',
    'gva_our_team',
    'gva_pricing_item',
    'gva_progress',
    'gva_progress_work',
    'gva_tabs',
    'gva_tabs_content',
    'gva_video_box',
    'gva_gmap',
    'gva_button',
    'gva_view',
    'gva_quote_text',
    'gva_image_content',
    'gva_images_parallax',
    'gva_services_carousel',
    'gva_gallery',
    'gva_our_partners',
    'gva_download',
    'gva_socials',
    'gva_instagram',
    'gva_text_rotate',
    'gva_quotes_rotator',
    'gva_links',
    'gva_work_process',
    'gva_job_box',
  );
}

function gavias_merge_atts( $pairs, $atts, $shortcode = '' ) {
    $atts = (array)$atts;
    $out = array();
    foreach($pairs as $name => $default) {
        if ( array_key_exists($name, $atts) )
            $out[$name] = $atts[$name];
        else
            $out[$name] = $default;
    }
    return $out;
}

