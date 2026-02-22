<?php
function toposel_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'toposel_setup');

function toposel_styles() {
    wp_enqueue_style('toposel-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'toposel_styles');

add_action('acf/init', function() {
    if (!function_exists('acf_add_local_field_group')) return;

    acf_add_local_field_group(array(
        'key' => 'group_announcement',
        'title' => 'Announcement Bar',
        'fields' => array(
            array(
                'key' => 'field_ann_text',
                'label' => 'Announcement Text',
                'name' => 'announcement_text',
                'type' => 'text',
                'default_value' => 'Sign up and get 20% off to your first order.',
            ),
            array(
                'key' => 'field_ann_link_text',
                'label' => 'Link Text',
                'name' => 'announcement_link_text',
                'type' => 'text',
                'default_value' => 'Sign Up Now',
            ),
            array(
                'key' => 'field_ann_link_url',
                'label' => 'Link URL',
                'name' => 'announcement_link_url',
                'type' => 'url',
            ),
        ),
        'location' => array(array(array(
            'param' => 'page_template',
            'operator' => '==',
            'value' => 'page-home.php',
        ))),
    ));

    acf_add_local_field_group(array(
        'key' => 'group_hero',
        'title' => 'Hero Banner',
        'fields' => array(
            array(
                'key' => 'field_hero_img',
                'label' => 'Hero Image',
                'name' => 'hero_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_hero_head',
                'label' => 'Heading',
                'name' => 'hero_heading',
                'type' => 'textarea',
                'rows' => 3,
                'default_value' => 'FIND CLOTHES THAT MATCHES YOUR STYLE',
            ),
            array(
                'key' => 'field_hero_sub',
                'label' => 'Subheading',
                'name' => 'hero_subheading',
                'type' => 'textarea',
                'rows' => 3,
                'default_value' => 'Browse through our diverse range of meticulously crafted garments.',
            ),
            array(
                'key' => 'field_hero_btn_text',
                'label' => 'Button Text',
                'name' => 'hero_button_text',
                'type' => 'text',
                'default_value' => 'Shop Now',
            ),
            array(
                'key' => 'field_hero_btn_link',
                'label' => 'Button Link',
                'name' => 'hero_button_link',
                'type' => 'url',
            ),
        ),
        'location' => array(array(array(
            'param' => 'page_template',
            'operator' => '==',
            'value' => 'page-home.php',
        ))),
    ));

    acf_add_local_field_group(array(
        'key' => 'group_brands',
        'title' => 'Brand Logos',
        'fields' => array(
            array(
                'key' => 'field_brand_1',
                'label' => 'Brand 1 Name',
                'name' => 'brand_1_name',
                'type' => 'text',
                'default_value' => 'VERSACE',
            ),
            array(
                'key' => 'field_brand_2',
                'label' => 'Brand 2 Name',
                'name' => 'brand_2_name',
                'type' => 'text',
                'default_value' => 'ZARA',
            ),
            array(
                'key' => 'field_brand_3',
                'label' => 'Brand 3 Name',
                'name' => 'brand_3_name',
                'type' => 'text',
                'default_value' => 'GUCCI',
            ),
            array(
                'key' => 'field_brand_4',
                'label' => 'Brand 4 Name',
                'name' => 'brand_4_name',
                'type' => 'text',
                'default_value' => 'PRADA',
            ),
            array(
                'key' => 'field_brand_5',
                'label' => 'Brand 5 Name',
                'name' => 'brand_5_name',
                'type' => 'text',
                'default_value' => 'Calvin Klein',
            ),
        ),
        'location' => array(array(array(
            'param' => 'page_template',
            'operator' => '==',
            'value' => 'page-home.php',
        ))),
    ));

    acf_add_local_field_group(array(
        'key' => 'group_new_arrivals',
        'title' => 'New Arrivals Section',
        'fields' => array(
            array(
                'key' => 'field_na_cat',
                'label' => 'Product Category',
                'name' => 'new_arrivals_category',
                'type' => 'taxonomy',
                'taxonomy' => 'product_cat',
                'field_type' => 'select',
                'return_format' => 'id',
            ),
            array(
                'key' => 'field_na_count',
                'label' => 'Kitne Products Dikhane Hain',
                'name' => 'new_arrivals_count',
                'type' => 'number',
                'default_value' => 2,
                'min' => 1,
                'max' => 8,
            ),
        ),
        'location' => array(array(array(
            'param' => 'page_template',
            'operator' => '==',
            'value' => 'page-home.php',
        ))),
    ));
});