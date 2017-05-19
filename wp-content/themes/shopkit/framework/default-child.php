<?php

function shopkit_general_settings( $custom_settings ) {

$custom_settings['settings']['logo_image']['std'] = esc_url( untrailingslashit( get_template_directory_uri() ) . '/demos/material/images/logo.png' );
$custom_settings['settings']['logo_image_link']['std'] = '';
$custom_settings['settings']['site_title_font']['std'] = array (
  'font-color' => '',
  'font-family' => '',
  'font-size' => '30px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '',
  'letter-spacing' => '',
  'line-height' => '36px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['site_description_font']['std'] = array (
  'font-color' => '',
  'font-family' => '',
  'font-size' => '',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => 'normal',
  'letter-spacing' => '',
  'line-height' => '',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['favorites_icon']['std'] = '';
$custom_settings['settings']['favorites_ipad57']['std'] = '';
$custom_settings['settings']['favorites_ipad72']['std'] = '';
$custom_settings['settings']['favorites_ipad114']['std'] = '';
$custom_settings['settings']['favorites_ipad144']['std'] = '';
$custom_settings['settings']['seo_publisher']['std'] = '';
$custom_settings['settings']['fb_publisher']['std'] = '';
$custom_settings['settings']['header_elements']['std'] = array (
  2 => 
  array (
    'title' => 'Top Bar',
    'select_element' => 'elements-bar',
    'fullwidth' => 'off',
  ),
  0 => 
  array (
    'title' => 'Header',
    'select_element' => 'elements-bar',
    'fullwidth' => 'off',
  ),
  1 => 
  array (
    'title' => 'Menu Bar',
    'select_element' => 'elements-bar',
    'fullwidth' => 'off',
  ),
);
$custom_settings['settings']['footer_elements']['std'] = array (
  2 => 
  array (
    'title' => 'Shop Information',
    'select_element' => 'widget-section',
    'fullwidth' => 'off',
  ),
  3 => 
  array (
    'title' => 'Shop Widgets',
    'select_element' => 'widget-section',
    'fullwidth' => 'off',
  ),
  1 => 
  array (
    'title' => 'Footer Bar',
    'select_element' => 'elements-bar',
    'fullwidth' => 'off',
  ),
  0 => 
  array (
    'title' => 'Footer',
    'select_element' => 'widget-section',
    'fullwidth' => 'off',
  ),
);
$custom_settings['settings']['content_padding']['std'] = '90px 0';
$custom_settings['settings']['content_font']['std'] = array (
  'font-color' => '#888888',
  'font-family' => 'inc-raleway',
  'font-size' => '14px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '',
  'letter-spacing' => '',
  'line-height' => '28px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['content_link']['std'] = '#ff3d00';
$custom_settings['settings']['content_link_hover']['std'] = '#222222';
$custom_settings['settings']['content_separator']['std'] = '#bbbbbb';
$custom_settings['settings']['content_button_font']['std'] = array (
  'font-color' => '#ff3d00',
  'font-family' => '',
  'font-size' => '18px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '',
  'letter-spacing' => '',
  'line-height' => '48px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['content_button_hover_font']['std'] = array (
  'font-color' => '#222222',
  'font-family' => '',
  'font-size' => '18px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '',
  'letter-spacing' => '',
  'line-height' => '48px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['content_button_style']['std'] = 'bordered';
$custom_settings['settings']['content_background']['std'] = array (
  'background-color' => '#ffffff',
  'background-repeat' => '',
  'background-attachment' => '',
  'background-position' => '',
  'background-size' => '',
  'background-image' => '',
);
$custom_settings['settings']['content_boxshadow']['std'] = array (
  'offset-y' => '0',
);
$custom_settings['settings']['content_h1_font']['std'] = array (
  'font-color' => '#222222',
  'font-family' => '',
  'font-size' => '36px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '42px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['content_h2_font']['std'] = array (
  'font-color' => '#222222',
  'font-family' => '',
  'font-size' => '30px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '36px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['content_h3_font']['std'] = array (
  'font-color' => '#222222',
  'font-family' => '',
  'font-size' => '24px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '30px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['content_h4_font']['std'] = array (
  'font-color' => '#222222',
  'font-family' => '',
  'font-size' => '18px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '28px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['content_h5_font']['std'] = array (
  'font-color' => '#222222',
  'font-family' => '',
  'font-size' => '16px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '28px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['content_h6_font']['std'] = array (
  'font-color' => '#222222',
  'font-family' => '',
  'font-size' => '14px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '28px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['_wrapper_background']['std'] = '';
$custom_settings['settings']['_wrapper_boxshadow']['std'] = '';
$custom_settings['settings']['_header_background']['std'] = '';
$custom_settings['settings']['_header_boxshadow']['std'] = array (
  'offset-x' => '0',
  'offset-y' => '0',
  'blur-radius' => '15px',
  'spread-radius' => '0',
  'color' => 'rgba(0,0,0,0.3)',
);
$custom_settings['settings']['_footer_background']['std'] = '';
$custom_settings['settings']['_footer_boxshadow']['std'] = '';
$custom_settings['settings']['page_title']['std'] = 'content';
$custom_settings['settings']['page_comments']['std'] = 'on';
$custom_settings['settings']['blog_style']['std'] = 'full';
$custom_settings['settings']['post_comments']['std'] = 'on';
$custom_settings['settings']['404_image']['std'] = '';
$custom_settings['settings']['wrapper_padding']['std'] = '';
$custom_settings['settings']['wrapper_mode']['std'] = 'shopkit-central';
$custom_settings['settings']['wrapper_width']['std'] = '4096';
$custom_settings['settings']['inner_wrapper_width']['std'] = '1340';
$custom_settings['settings']['columns_margin']['std'] = '60';
$custom_settings['settings']['rows_margin']['std'] = '60';
$custom_settings['settings']['custom_css']['std'] = '#top_bar_section .shopkit-section-left .shopkit-layout-element:first-child {display:none;}
.home #top_bar_section .shopkit-section-left .shopkit-layout-element:first-child {display:inline-block;}';
$custom_settings['settings']['responsive_tablet_mode']['std'] = '1024';
$custom_settings['settings']['responsive_tablet_css']['std'] = '';
$custom_settings['settings']['responsive_mobile_mode']['std'] = '840';
$custom_settings['settings']['responsive_mobile_css']['std'] = '';
$custom_settings['settings']['sidebar_heading']['std'] = 'h4';
$custom_settings['settings']['left_sidebar_1']['std'] = 'off';
$custom_settings['settings']['left_sidebar_width_1']['std'] = '200';
$custom_settings['settings']['left_sidebar_2']['std'] = 'off';
$custom_settings['settings']['left_sidebar_width_2']['std'] = '200';
$custom_settings['settings']['right_sidebar_1']['std'] = 'on';
$custom_settings['settings']['right_sidebar_width_1']['std'] = '250';
$custom_settings['settings']['right_sidebar_1_visibility']['std'] = array (
  0 => 'shopkit-responsive-low',
  1 => 'shopkit-responsive-medium',
);
$custom_settings['settings']['right_sidebar_2']['std'] = 'on';
$custom_settings['settings']['right_sidebar_width_2']['std'] = '250';
$custom_settings['settings']['right_sidebar_2_visibility']['std'] = array (
  0 => 'shopkit-responsive-low',
  1 => 'shopkit-responsive-medium',
);
$custom_settings['settings']['sidebars']['std'] = array (
  0 => 
  array (
    'title' => 'Single Product Layout',
    'display_condition' => 'is_product||is_cart||is_checkout||is_account_page',
    'left_sidebar_1' => 'off',
    'left_sidebar_width_1' => '200',
    'left_sidebar_2' => 'off',
    'left_sidebar_width_2' => '200',
    'right_sidebar_1' => 'on',
    'right_sidebar_width_1' => '300',
    'right_sidebar_1_visibility' => 
    array (
      0 => 'shopkit-responsive-low',
      1 => 'shopkit-responsive-medium',
    ),
    'right_sidebar_2' => 'off',
    'right_sidebar_width_2' => '200',
  ),
  1 => 
  array (
    'title' => 'WooCommerce Layout',
    'display_condition' => 'is_woocommerce',
    'left_sidebar_1' => 'on',
    'left_sidebar_width_1' => '300',
    'left_sidebar_2' => 'off',
    'left_sidebar_width_2' => '200',
    'right_sidebar_1' => 'off',
    'right_sidebar_width_1' => '200',
    'right_sidebar_2' => 'off',
    'right_sidebar_width_2' => '200',
  ),
);
$custom_settings['settings']['wc_columns']['std'] = '3';
$custom_settings['settings']['wc_category_columns']['std'] = '4';
$custom_settings['settings']['wc_per_page']['std'] = '9';
$custom_settings['settings']['wc_orderby']['std'] = 'shopkit-orderby-bc';
$custom_settings['settings']['wc_product_style']['std'] = 'none';
$custom_settings['settings']['wc_image_effect']['std'] = 'zoom-fade';
$custom_settings['settings']['wc_shop_title']['std'] = 'off';
$custom_settings['settings']['wc_shop_rating']['std'] = 'off';
$custom_settings['settings']['wc_shop_price']['std'] = 'off';
$custom_settings['settings']['wc_shop_desc']['std'] = 'on';
$custom_settings['settings']['wc_shop_add_to_cart']['std'] = 'off';
$custom_settings['settings']['wc_image_position']['std'] = 'imageleft';
$custom_settings['settings']['wc_thumbnails_columns']['std'] = '4';
$custom_settings['settings']['wc_single_image_size']['std'] = '2';
$custom_settings['settings']['wc_upsell_columns']['std'] = '4';
$custom_settings['settings']['wc_related_columns']['std'] = '4';
$custom_settings['settings']['wc_product_sidebars']['std'] = 'off';
$custom_settings['settings']['wc_single_rating']['std'] = 'off';
$custom_settings['settings']['wc_single_price']['std'] = 'off';
$custom_settings['settings']['wc_single_desc']['std'] = 'off';
$custom_settings['settings']['wc_single_add_to_cart']['std'] = 'off';
$custom_settings['settings']['wc_single_meta']['std'] = 'off';
$custom_settings['settings']['wc_single_upsells']['std'] = 'off';
$custom_settings['settings']['wc_product_tabs']['std'] = 'off';
$custom_settings['settings']['wc_single_related']['std'] = 'off';
	return $custom_settings;

}
add_filter( 'shopkit_general_settings_args', 'shopkit_general_settings' );


function shopkit_section_header_settings( $custom_settings ) {
$custom_settings['settings']['header_elements_align']['std'] = 'shopkit-sections-leftright';
$custom_settings['settings']['header_elements_on_left']['std'] = array (
  0 => 
  array (
    'title' => 'Logo',
    'select_element' => 'logo',
    'text' => '',
    'social_network' => 'facebook',
    'icon' => 'line-icon',
    'woo_cart_icon' => 'line-icon',
    'image' => '',
    'image_hover' => '',
    'url' => '',
    'menu' => 'none',
    'menu_style' => 'shopkit-menu-nomargin',
    'menu_effect' => 'none',
    'menu_font' => '',
    'menu_font_hover' => '',
    'menu_background_active' => '',
    'menu_submenu_font' => '',
    'menu_submenu_font_hover' => '',
    'menu_submenu_background' => '',
    'menu_submenu_background_active' => '',
    'height' => 'shopkit-height-60',
    'class' => '',
  ),
  1 => 
  array (
    'title' => 'Site Title',
    'select_element' => 'site-title',
    'text' => '',
    'social_network' => 'facebook',
    'icon' => 'line-icon',
    'woo_cart_icon' => 'line-icon',
    'image' => '',
    'image_hover' => '',
    'url' => '',
    'menu' => 'none',
    'menu_style' => 'shopkit-menu-nomargin',
    'menu_effect' => 'none',
    'menu_font' => '',
    'menu_font_hover' => '',
    'menu_background_active' => '',
    'menu_submenu_font' => '',
    'menu_submenu_font_hover' => '',
    'menu_submenu_background' => '',
    'menu_submenu_background_active' => '',
    'height' => 'shopkit-height-30',
    'class' => '',
  ),
);
$custom_settings['settings']['header_elements_on_right']['std'] = array (
  1 => 
  array (
    'title' => 'Search',
    'select_element' => 'woo-search',
    'text' => '',
    'social_network' => 'facebook',
    'icon' => 'line-icon',
    'woo_cart_icon' => 'line-icon',
    'image' => '',
    'image_hover' => '',
    'url' => '',
    'menu' => 'none',
    'menu_style' => 'shopkit-menu-nomargin',
    'menu_effect' => 'none',
    'menu_font' => '',
    'menu_font_hover' => '',
    'menu_background_active' => '',
    'menu_submenu_font' => '',
    'menu_submenu_font_hover' => '',
    'menu_submenu_background' => '',
    'menu_submenu_background_active' => '',
    'height' => 'shopkit-height-48',
    'class' => '',
  ),
  3 => 
  array (
    'title' => 'Break',
    'select_element' => 'break',
    'text' => '',
    'social_network' => 'facebook',
    'icon' => 'line-icon',
    'woo_cart_icon' => 'line-icon',
    'image' => '',
    'image_hover' => '',
    'url' => '',
    'menu' => 'none',
    'menu_style' => 'shopkit-menu-nomargin',
    'menu_effect' => 'none',
    'menu_font' => '',
    'menu_font_hover' => '',
    'menu_background_active' => '',
    'menu_submenu_font' => '',
    'menu_submenu_font_hover' => '',
    'menu_submenu_background' => '',
    'menu_submenu_background_active' => '',
    'height' => 'shopkit-height-30',
    'class' => '',
    'element_visibility' => 
    array (
      0 => 'shopkit-responsive-low',
      1 => 'shopkit-responsive-medium',
    ),
  ),
  4 => 
  array (
    'title' => 'Cart Text',
    'select_element' => 'text',
    'text' => 'Visit our <a href="#"><strong>Shop</strong></a> or go to the <a href="#"><strong>Checkout</strong></a>!',
    'social_network' => 'facebook',
    'icon' => 'line-icon',
    'woo_cart_icon' => 'line-icon',
    'image' => '',
    'image_hover' => '',
    'url' => '',
    'menu' => 'none',
    'menu_style' => 'shopkit-menu-nomargin',
    'menu_effect' => 'none',
    'menu_font' => '',
    'menu_font_hover' => '',
    'menu_background_active' => '',
    'menu_submenu_font' => '',
    'menu_submenu_font_hover' => '',
    'menu_submenu_background' => '',
    'menu_submenu_background_active' => '',
    'height' => 'shopkit-height-30',
    'class' => '',
    'element_visibility' => 
    array (
      0 => 'shopkit-responsive-low',
      1 => 'shopkit-responsive-medium',
    ),
  ),
  2 => 
  array (
    'title' => 'Separator',
    'select_element' => 'separator',
    'text' => '',
    'social_network' => 'facebook',
    'icon' => 'line-icon',
    'woo_cart_icon' => 'line-icon',
    'image' => '',
    'image_hover' => '',
    'url' => '',
    'menu' => 'none',
    'menu_style' => 'shopkit-menu-nomargin',
    'menu_effect' => 'none',
    'menu_font' => '',
    'menu_font_hover' => '',
    'menu_background_active' => '',
    'menu_submenu_font' => '',
    'menu_submenu_font_hover' => '',
    'menu_submenu_background' => '',
    'menu_submenu_background_active' => '',
    'height' => 'shopkit-height-36',
    'class' => '',
  ),
  0 => 
  array (
    'title' => 'Cart',
    'select_element' => 'woo-cart',
    'text' => '',
    'social_network' => 'facebook',
    'icon' => 'line-icon',
    'woo_cart_icon' => 'line-icon',
    'image' => '',
    'image_hover' => '',
    'url' => '',
    'menu' => 'none',
    'menu_style' => 'shopkit-menu-nomargin',
    'menu_effect' => 'none',
    'menu_font' => '',
    'menu_font_hover' => '',
    'menu_background_active' => '',
    'menu_submenu_font' => '',
    'menu_submenu_font_hover' => '',
    'menu_submenu_background' => '',
    'menu_submenu_background_active' => '',
    'height' => 'shopkit-height-48',
    'class' => '',
  ),
);
$custom_settings['settings']['header_outer_elements_align']['std'] = 'middle';
$custom_settings['settings']['header_inner_elements_align']['std'] = 'middle';
$custom_settings['settings']['header_padding']['std'] = '20px 0';
$custom_settings['settings']['header_font']['std'] = array (
  'font-color' => '#888888',
  'font-family' => '',
  'font-size' => '',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '',
  'letter-spacing' => '',
  'line-height' => '',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['header_link']['std'] = '#ff3d00';
$custom_settings['settings']['header_link_hover']['std'] = '#222222';
$custom_settings['settings']['header_separator']['std'] = '#dddddd';
$custom_settings['settings']['header_button_font']['std'] = array (
  'font-color' => '#ff3d00',
  'font-family' => '',
  'font-size' => '18px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '',
  'letter-spacing' => '',
  'line-height' => '48px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['header_button_hover_font']['std'] = array (
  'font-color' => '#222222',
  'font-family' => '',
  'font-size' => '18px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '',
  'letter-spacing' => '',
  'line-height' => '48px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['header_button_style']['std'] = 'bordered';
$custom_settings['settings']['header_background']['std'] = array (
  'background-color' => '#fafafa',
  'background-repeat' => '',
  'background-attachment' => '',
  'background-position' => '',
  'background-size' => '',
  'background-image' => '',
);
$custom_settings['settings']['header_boxshadow']['std'] = '';
$custom_settings['settings']['header_h1_font']['std'] = array (
  'font-color' => '#222222',
  'font-family' => '',
  'font-size' => '36px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '42px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['header_h2_font']['std'] = array (
  'font-color' => '#222222',
  'font-family' => '',
  'font-size' => '30px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '36px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['header_h3_font']['std'] = array (
  'font-color' => '#222222',
  'font-family' => '',
  'font-size' => '24px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '30px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['header_h4_font']['std'] = array (
  'font-color' => '#222222',
  'font-family' => '',
  'font-size' => '18px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '28px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['header_h5_font']['std'] = array (
  'font-color' => '#222222',
  'font-family' => '',
  'font-size' => '16px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '28px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['header_h6_font']['std'] = array (
  'font-color' => '#222222',
  'font-family' => '',
  'font-size' => '14px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '28px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['header_type']['std'] = 'normal';
$custom_settings['settings']['header_type_height']['std'] = 'shopkit-height-30';
$custom_settings['settings']['header_condition']['std'] = '';
	return $custom_settings;

}
add_filter( 'shopkit_section_header_args', 'shopkit_section_header_settings' );


function shopkit_section_footer_settings( $custom_settings ) {
$custom_settings['settings']['footer_sidebar_heading']['std'] = 'h4';
$custom_settings['settings']['footer_rows']['std'] = array (
  1 => 
  array (
    'title' => 'Footer #1',
    'select_element' => 'widget-4-columns-4',
  ),
  0 => 
  array (
    'title' => 'Footer #2',
    'select_element' => 'widget-7-columns-3',
  ),
);
$custom_settings['settings']['footer_padding']['std'] = '90px 0 30px';
$custom_settings['settings']['footer_font']['std'] = array (
  'font-color' => '#cccccc',
  'font-family' => '',
  'font-size' => '',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '',
  'letter-spacing' => '',
  'line-height' => '',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['footer_link']['std'] = '#ff3d00';
$custom_settings['settings']['footer_link_hover']['std'] = '#cccccc';
$custom_settings['settings']['footer_separator']['std'] = '#888888';
$custom_settings['settings']['footer_button_font']['std'] = array (
  'font-color' => '#ff3d00',
  'font-family' => '',
  'font-size' => '18px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '',
  'letter-spacing' => '',
  'line-height' => '48px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['footer_button_hover_font']['std'] = array (
  'font-color' => '#cccccc',
  'font-family' => '',
  'font-size' => '18px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '',
  'letter-spacing' => '',
  'line-height' => '48px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['footer_button_style']['std'] = 'bordered';
$custom_settings['settings']['footer_background']['std'] = array (
  'background-color' => '#222222',
  'background-repeat' => '',
  'background-attachment' => '',
  'background-position' => '',
  'background-size' => '',
  'background-image' => '',
);
$custom_settings['settings']['footer_boxshadow']['std'] = '';
$custom_settings['settings']['footer_h1_font']['std'] = array (
  'font-color' => '#ffffff',
  'font-family' => '',
  'font-size' => '36px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '42px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['footer_h2_font']['std'] = array (
  'font-color' => '#ffffff',
  'font-family' => '',
  'font-size' => '12px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '36px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['footer_h3_font']['std'] = array (
  'font-color' => '#ffffff',
  'font-family' => '',
  'font-size' => '24px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '30px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['footer_h4_font']['std'] = array (
  'font-color' => '#ffffff',
  'font-family' => '',
  'font-size' => '18px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '28px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['footer_h5_font']['std'] = array (
  'font-color' => '#ffffff',
  'font-family' => '',
  'font-size' => '16px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '27px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['footer_h6_font']['std'] = array (
  'font-color' => '#ffffff',
  'font-family' => '',
  'font-size' => '14px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '28px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['footer_margin_override']['std'] = 'off';
$custom_settings['settings']['footer_columns_margin']['std'] = '30';
$custom_settings['settings']['footer_rows_margin']['std'] = '60';
$custom_settings['settings']['footer_type']['std'] = 'normal';
$custom_settings['settings']['footer_type_height']['std'] = 'shopkit-height-30';
$custom_settings['settings']['footer_condition']['std'] = '';
	return $custom_settings;

}
add_filter( 'shopkit_section_footer_args', 'shopkit_section_footer_settings' );


function shopkit_section_menu_bar_settings( $custom_settings ) {
$custom_settings['settings']['menu_bar_elements_align']['std'] = 'shopkit-sections-leftright';
$custom_settings['settings']['menu_bar_elements_on_left']['std'] = array (
  0 => 
  array (
    'title' => 'Main Menu',
    'select_element' => 'menu',
    'text' => '',
    'social_network' => 'facebook',
    'icon' => 'line-icon',
    'woo_cart_icon' => 'line-icon',
    'image' => '',
    'image_hover' => '',
    'url' => '',
    'menu' => 'all-pages',
    'menu_style' => 'shopkit-menu-nomargin',
    'menu_effect' => 'underline-reveal',
    'menu_font' => 
    array (
      'font-color' => '#222222',
      'font-family' => '',
      'font-size' => '',
      'font-style' => '',
      'font-variant' => '',
      'font-weight' => '600',
      'letter-spacing' => '',
      'line-height' => '48px',
      'text-decoration' => '',
      'text-transform' => '',
    ),
    'menu_font_hover' => '#ff3d00',
    'menu_background_active' => '#ff3d00',
    'menu_submenu_font' => 
    array (
      'font-color' => '#cccccc',
      'font-family' => '',
      'font-size' => '12px',
      'font-style' => '',
      'font-variant' => '',
      'font-weight' => '600',
      'letter-spacing' => '',
      'line-height' => '36px',
      'text-decoration' => '',
      'text-transform' => '',
    ),
    'menu_submenu_font_hover' => '#ffffff',
    'menu_submenu_background' => '#222222',
    'menu_submenu_background_active' => '#ff3d00',
    'height' => 'shopkit-height-24',
    'class' => '',
  ),
);
$custom_settings['settings']['menu_bar_elements_on_right']['std'] = array (
  0 => 
  array (
    'title' => 'Login/Register',
    'select_element' => 'login-registration',
    'text' => '',
    'social_network' => 'facebook',
    'icon' => 'line-icon',
    'woo_cart_icon' => 'line-icon',
    'image' => '',
    'image_hover' => '',
    'url' => '',
    'menu' => 'none',
    'menu_style' => 'shopkit-menu-nomargin',
    'menu_effect' => 'none',
    'menu_font' => '',
    'menu_font_hover' => '',
    'menu_background_active' => '',
    'menu_submenu_font' => '',
    'menu_submenu_font_hover' => '',
    'menu_submenu_background' => '',
    'menu_submenu_background_active' => '',
    'height' => 'shopkit-height-24',
    'class' => '',
  ),
);
$custom_settings['settings']['menu_bar_outer_elements_align']['std'] = 'middle';
$custom_settings['settings']['menu_bar_inner_elements_align']['std'] = 'middle';
$custom_settings['settings']['menu_bar_padding']['std'] = '';
$custom_settings['settings']['menu_bar_font']['std'] = array (
  'font-color' => '#888888',
  'font-family' => '',
  'font-size' => '',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['menu_bar_link']['std'] = '#222222';
$custom_settings['settings']['menu_bar_link_hover']['std'] = '#ff3d00';
$custom_settings['settings']['menu_bar_separator']['std'] = '#dddddd';
$custom_settings['settings']['menu_bar_button_font']['std'] = array (
  'font-color' => '#ff3d00',
  'font-family' => '',
  'font-size' => '18px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '',
  'letter-spacing' => '',
  'line-height' => '48px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['menu_bar_button_hover_font']['std'] = array (
  'font-color' => '#222222',
  'font-family' => '',
  'font-size' => '18px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '',
  'letter-spacing' => '',
  'line-height' => '48px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['menu_bar_button_style']['std'] = 'bordered';
$custom_settings['settings']['menu_bar_background']['std'] = array (
  'background-color' => '#f4f4f4',
  'background-repeat' => '',
  'background-attachment' => '',
  'background-position' => '',
  'background-size' => '',
  'background-image' => '',
);
$custom_settings['settings']['menu_bar_boxshadow']['std'] = array (
  'color' => '#0a0a0a',
);
$custom_settings['settings']['menu_bar_h1_font']['std'] = array (
  'font-color' => '#222222',
  'font-family' => '',
  'font-size' => '36px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '42px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['menu_bar_h2_font']['std'] = array (
  'font-color' => '#222222',
  'font-family' => '',
  'font-size' => '30px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '36px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['menu_bar_h3_font']['std'] = array (
  'font-color' => '#222222',
  'font-family' => '',
  'font-size' => '24px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '30px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['menu_bar_h4_font']['std'] = array (
  'font-color' => '#222222',
  'font-family' => '',
  'font-size' => '18px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '28px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['menu_bar_h5_font']['std'] = array (
  'font-color' => '#222222',
  'font-family' => '',
  'font-size' => '16px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '28px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['menu_bar_h6_font']['std'] = array (
  'font-color' => '#222222',
  'font-family' => '',
  'font-size' => '14px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '28px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['menu_bar_type']['std'] = 'normal';
$custom_settings['settings']['menu_bar_type_height']['std'] = 'shopkit-height-30';
$custom_settings['settings']['menu_bar_condition']['std'] = '';
	return $custom_settings;

}
add_filter( 'shopkit_section_menu_bar_args', 'shopkit_section_menu_bar_settings' );


function shopkit_section_top_bar_settings( $custom_settings ) {
$custom_settings['settings']['top_bar_elements_align']['std'] = 'shopkit-sections-leftright';
$custom_settings['settings']['top_bar_elements_on_left']['std'] = array (
  0 => 
  array (
    'title' => 'Welcome!',
    'select_element' => 'text',
    'text' => 'Welcome to ShopKit!',
    'social_network' => 'facebook',
    'icon' => 'line-icon',
    'woo_cart_icon' => 'line-icon',
    'image' => '',
    'image_hover' => '',
    'url' => '',
    'menu' => 'none',
    'menu_style' => 'shopkit-menu-nomargin',
    'menu_effect' => 'none',
    'menu_font' => '',
    'menu_font_hover' => '',
    'menu_background_active' => '',
    'menu_submenu_font' => '',
    'menu_submenu_font_hover' => '',
    'menu_submenu_background' => '',
    'menu_submenu_background_active' => '',
    'height' => 'shopkit-height-30',
    'class' => '',
  ),
  1 => 
  array (
    'title' => 'Breadcrumbs',
    'select_element' => 'breadcrumbs',
    'text' => '',
    'social_network' => 'facebook',
    'icon' => 'line-icon',
    'woo_cart_icon' => 'line-icon',
    'image' => '',
    'image_hover' => '',
    'url' => '',
    'menu' => 'none',
    'menu_style' => 'shopkit-menu-nomargin',
    'menu_effect' => 'none',
    'menu_font' => '',
    'menu_font_hover' => '',
    'menu_background_active' => '',
    'menu_submenu_font' => '',
    'menu_submenu_font_hover' => '',
    'menu_submenu_background' => '',
    'menu_submenu_background_active' => '',
    'height' => 'shopkit-height-30',
    'class' => '',
  ),
);
$custom_settings['settings']['top_bar_elements_on_right']['std'] = array (
  2 => 
  array (
    'title' => 'Text',
    'select_element' => 'text',
    'text' => 'All in one WooCommerce theme!',
    'social_network' => 'facebook',
    'icon' => 'line-icon',
    'woo_cart_icon' => 'line-icon',
    'image' => '',
    'image_hover' => '',
    'url' => '',
    'menu' => 'none',
    'menu_style' => 'shopkit-menu-nomargin',
    'menu_effect' => 'none',
    'menu_font' => '',
    'menu_font_hover' => '',
    'menu_background_active' => '',
    'menu_submenu_font' => '',
    'menu_submenu_font_hover' => '',
    'menu_submenu_background' => '',
    'menu_submenu_background_active' => '',
    'height' => 'shopkit-height-30',
    'class' => '',
  ),
);
$custom_settings['settings']['top_bar_outer_elements_align']['std'] = 'middle';
$custom_settings['settings']['top_bar_inner_elements_align']['std'] = 'middle';
$custom_settings['settings']['top_bar_padding']['std'] = '2px 0 4px';
$custom_settings['settings']['top_bar_font']['std'] = array (
  'font-color' => '#cccccc',
  'font-family' => 'inc-raleway',
  'font-size' => '11px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '',
  'letter-spacing' => '',
  'line-height' => '',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['top_bar_link']['std'] = '#ffffff';
$custom_settings['settings']['top_bar_link_hover']['std'] = '#e52d27';
$custom_settings['settings']['top_bar_separator']['std'] = '#cccccc';
$custom_settings['settings']['top_bar_button_font']['std'] = array (
  'font-color' => '#ffffff',
  'font-family' => '',
  'font-size' => '18px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '',
  'letter-spacing' => '',
  'line-height' => '48px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['top_bar_button_hover_font']['std'] = array (
  'font-color' => '#e52d27',
  'font-family' => '',
  'font-size' => '18px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '',
  'letter-spacing' => '',
  'line-height' => '48px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['top_bar_button_style']['std'] = 'filled';
$custom_settings['settings']['top_bar_background']['std'] = array (
  'background-color' => '#444444',
  'background-repeat' => '',
  'background-attachment' => '',
  'background-position' => '',
  'background-size' => '',
  'background-image' => '',
);
$custom_settings['settings']['top_bar_boxshadow']['std'] = '';
$custom_settings['settings']['top_bar_h1_font']['std'] = array (
  'font-color' => '#ffffff',
  'font-family' => '',
  'font-size' => '36px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '42px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['top_bar_h2_font']['std'] = array (
  'font-color' => '#ffffff',
  'font-family' => '',
  'font-size' => '30px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '36px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['top_bar_h3_font']['std'] = array (
  'font-color' => '#ffffff',
  'font-family' => '',
  'font-size' => '24px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '30px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['top_bar_h4_font']['std'] = array (
  'font-color' => '#ffffff',
  'font-family' => '',
  'font-size' => '18px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '14px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['top_bar_h5_font']['std'] = array (
  'font-color' => '#ffffff',
  'font-family' => '',
  'font-size' => '16px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '28px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['top_bar_h6_font']['std'] = array (
  'font-color' => '#ffffff',
  'font-family' => '',
  'font-size' => '14px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '28px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['top_bar_type']['std'] = 'normal';
$custom_settings['settings']['top_bar_type_height']['std'] = 'shopkit-height-30';
$custom_settings['settings']['top_bar_condition']['std'] = '';
$custom_settings['settings']['top_bar_visibility']['std'] = array (
  0 => 'shopkit-responsive-low',
  1 => 'shopkit-responsive-medium',
);
	return $custom_settings;

}
add_filter( 'shopkit_section_top_bar_args', 'shopkit_section_top_bar_settings' );


function shopkit_section_footer_bar_settings( $custom_settings ) {
$custom_settings['settings']['footer_bar_elements_align']['std'] = 'shopkit-sections-leftright';
$custom_settings['settings']['footer_bar_elements_on_left']['std'] = array (
  0 => 
  array (
    'title' => 'Logo',
    'select_element' => 'logo',
    'text' => '',
    'social_network' => 'facebook',
    'icon' => 'line-icon',
    'woo_cart_icon' => 'line-icon',
    'image' => '',
    'image_hover' => '',
    'url' => '',
    'menu' => 'none',
    'menu_style' => 'shopkit-menu-nomargin',
    'menu_effect' => 'none',
    'menu_font' => '',
    'menu_font_hover' => '',
    'menu_background_active' => '',
    'menu_submenu_font' => '',
    'menu_submenu_font_hover' => '',
    'menu_submenu_background' => '',
    'menu_submenu_background_active' => '',
    'height' => 'shopkit-height-48',
    'class' => '',
  ),
  2 => 
  array (
    'title' => 'Separator',
    'select_element' => 'separator',
    'text' => '',
    'social_network' => 'facebook',
    'icon' => 'line-icon',
    'woo_cart_icon' => 'line-icon',
    'image' => '',
    'image_hover' => '',
    'url' => '',
    'menu' => 'none',
    'menu_style' => 'shopkit-menu-nomargin',
    'menu_effect' => 'none',
    'menu_font' => '',
    'menu_font_hover' => '',
    'menu_background_active' => '',
    'menu_submenu_font' => '',
    'menu_submenu_font_hover' => '',
    'menu_submenu_background' => '',
    'menu_submenu_background_active' => '',
    'height' => 'shopkit-height-30',
    'class' => '',
    'element_visibility' => 
    array (
      0 => 'shopkit-responsive-low',
      1 => 'shopkit-responsive-medium',
    ),
  ),
  1 => 
  array (
    'title' => 'Footer Text',
    'select_element' => 'text',
    'text' => 'ShopKit - All in one WooCommerce theme!',
    'social_network' => 'facebook',
    'icon' => 'line-icon',
    'woo_cart_icon' => 'line-icon',
    'image' => '',
    'image_hover' => '',
    'url' => '',
    'menu' => 'none',
    'menu_style' => 'shopkit-menu-nomargin',
    'menu_effect' => 'none',
    'menu_font' => '',
    'menu_font_hover' => '',
    'menu_background_active' => '',
    'menu_submenu_font' => '',
    'menu_submenu_font_hover' => '',
    'menu_submenu_background' => '',
    'menu_submenu_background_active' => '',
    'height' => 'shopkit-height-30',
    'class' => '',
    'element_visibility' => 
    array (
      0 => 'shopkit-responsive-low',
      1 => 'shopkit-responsive-medium',
    ),
  ),
);
$custom_settings['settings']['footer_bar_elements_on_right']['std'] = array (
  0 => 
  array (
    'title' => 'Facebook',
    'select_element' => 'social-network',
    'text' => '',
    'social_network' => 'facebook',
    'icon' => 'line-icon',
    'woo_cart_icon' => 'line-icon',
    'image' => '',
    'image_hover' => '',
    'url' => '',
    'menu' => 'none',
    'menu_style' => 'shopkit-menu-nomargin',
    'menu_effect' => 'none',
    'menu_font' => '',
    'menu_font_hover' => '',
    'menu_background_active' => '',
    'menu_submenu_font' => '',
    'menu_submenu_font_hover' => '',
    'menu_submenu_background' => '',
    'menu_submenu_background_active' => '',
    'height' => 'shopkit-height-36',
    'class' => '',
  ),
  1 => 
  array (
    'title' => 'Twitter',
    'select_element' => 'social-network',
    'text' => '',
    'social_network' => 'twitter',
    'icon' => 'line-icon',
    'woo_cart_icon' => 'line-icon',
    'image' => '',
    'image_hover' => '',
    'url' => '',
    'menu' => 'none',
    'menu_style' => 'shopkit-menu-nomargin',
    'menu_effect' => 'none',
    'menu_font' => '',
    'menu_font_hover' => '',
    'menu_background_active' => '',
    'menu_submenu_font' => '',
    'menu_submenu_font_hover' => '',
    'menu_submenu_background' => '',
    'menu_submenu_background_active' => '',
    'height' => 'shopkit-height-36',
    'class' => '',
  ),
);
$custom_settings['settings']['footer_bar_outer_elements_align']['std'] = 'middle';
$custom_settings['settings']['footer_bar_inner_elements_align']['std'] = 'middle';
$custom_settings['settings']['footer_bar_padding']['std'] = '20px 0';
$custom_settings['settings']['footer_bar_font']['std'] = array (
  'font-color' => '#222222',
  'font-family' => '',
  'font-size' => '',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['footer_bar_link']['std'] = '#ff3d00';
$custom_settings['settings']['footer_bar_link_hover']['std'] = '#222222';
$custom_settings['settings']['footer_bar_separator']['std'] = '#dddddd';
$custom_settings['settings']['footer_bar_button_font']['std'] = array (
  'font-color' => '#ff3d00',
  'font-family' => '',
  'font-size' => '18px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '',
  'letter-spacing' => '',
  'line-height' => '48px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['footer_bar_button_hover_font']['std'] = array (
  'font-color' => '#222222',
  'font-family' => '',
  'font-size' => '18px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '',
  'letter-spacing' => '',
  'line-height' => '48px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['footer_bar_button_style']['std'] = 'bordered';
$custom_settings['settings']['footer_bar_background']['std'] = array (
  'background-color' => '#f4f4f4',
  'background-repeat' => '',
  'background-attachment' => '',
  'background-position' => '',
  'background-size' => '',
  'background-image' => '',
);
$custom_settings['settings']['footer_bar_boxshadow']['std'] = array (
  'offset-x' => '0',
  'offset-y' => '0',
  'blur-radius' => '15px',
  'spread-radius' => '0',
  'color' => 'rgba(0,0,0,0.3)',
);
$custom_settings['settings']['footer_bar_h1_font']['std'] = array (
  'font-color' => '#222222',
  'font-family' => '',
  'font-size' => '36px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '42px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['footer_bar_h2_font']['std'] = array (
  'font-color' => '#222222',
  'font-family' => '',
  'font-size' => '30px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '36px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['footer_bar_h3_font']['std'] = array (
  'font-color' => '#222222',
  'font-family' => '',
  'font-size' => '24px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '30px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['footer_bar_h4_font']['std'] = array (
  'font-color' => '#222222',
  'font-family' => '',
  'font-size' => '18px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '28px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['footer_bar_h5_font']['std'] = array (
  'font-color' => '#222222',
  'font-family' => '',
  'font-size' => '16px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '28px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['footer_bar_h6_font']['std'] = array (
  'font-color' => '#222222',
  'font-family' => '',
  'font-size' => '14px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '28px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['footer_bar_type']['std'] = 'normal';
$custom_settings['settings']['footer_bar_type_height']['std'] = 'shopkit-height-30';
$custom_settings['settings']['footer_bar_condition']['std'] = '';
	return $custom_settings;

}
add_filter( 'shopkit_section_footer_bar_args', 'shopkit_section_footer_bar_settings' );


function shopkit_section_shop_information_settings( $custom_settings ) {
$custom_settings['settings']['shop_information_sidebar_heading']['std'] = 'h3';
$custom_settings['settings']['shop_information_rows']['std'] = array (
  0 => 
  array (
    'title' => 'Shop Information Row',
    'select_element' => 'widget-4-columns-4',
  ),
);
$custom_settings['settings']['shop_information_padding']['std'] = '0';
$custom_settings['settings']['shop_information_font']['std'] = array (
  'font-color' => '#bbbbbb',
  'font-family' => '',
  'font-size' => '12px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '',
  'letter-spacing' => '',
  'line-height' => '18px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['shop_information_link']['std'] = '#ff3d00';
$custom_settings['settings']['shop_information_link_hover']['std'] = '#222222';
$custom_settings['settings']['shop_information_separator']['std'] = '#aaaaaa';
$custom_settings['settings']['shop_information_button_font']['std'] = array (
  'font-color' => '#ff3d00',
  'font-family' => '',
  'font-size' => '18px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '',
  'letter-spacing' => '',
  'line-height' => '48px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['shop_information_button_hover_font']['std'] = array (
  'font-color' => '#222222',
  'font-family' => '',
  'font-size' => '18px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '',
  'letter-spacing' => '',
  'line-height' => '48px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['shop_information_button_style']['std'] = 'bordered';
$custom_settings['settings']['shop_information_background']['std'] = '';
$custom_settings['settings']['shop_information_boxshadow']['std'] = '';
$custom_settings['settings']['shop_information_h1_font']['std'] = array (
  'font-color' => '#222222',
  'font-family' => '',
  'font-size' => '36px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '42px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['shop_information_h2_font']['std'] = array (
  'font-color' => '#222222',
  'font-family' => '',
  'font-size' => '30px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '36px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['shop_information_h3_font']['std'] = array (
  'font-color' => '#222222',
  'font-family' => '',
  'font-size' => '24px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '30px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['shop_information_h4_font']['std'] = array (
  'font-color' => '#888888',
  'font-family' => '',
  'font-size' => '14px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '20px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['shop_information_h5_font']['std'] = array (
  'font-color' => '#888888',
  'font-family' => '',
  'font-size' => '13px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '20px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['shop_information_h6_font']['std'] = array (
  'font-color' => '#888888',
  'font-family' => '',
  'font-size' => '12px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '20px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['shop_information_margin_override']['std'] = 'off';
$custom_settings['settings']['shop_information_columns_margin']['std'] = '30';
$custom_settings['settings']['shop_information_rows_margin']['std'] = '60';
$custom_settings['settings']['shop_information_type']['std'] = 'normal';
$custom_settings['settings']['shop_information_type_height']['std'] = 'shopkit-height-30';
$custom_settings['settings']['shop_information_condition']['std'] = 'is_woocommerce';
	return $custom_settings;

}
add_filter( 'shopkit_section_shop_information_args', 'shopkit_section_shop_information_settings' );


function shopkit_section_shop_widgets_settings( $custom_settings ) {
$custom_settings['settings']['shop_widgets_sidebar_heading']['std'] = 'h4';
$custom_settings['settings']['shop_widgets_rows']['std'] = array (
  0 => 
  array (
    'title' => 'Product Widgets',
    'select_element' => 'widget-4-columns-4',
    'element_visibility' => 
    array (
      0 => 'shopkit-responsive-low',
    ),
  ),
);
$custom_settings['settings']['shop_widgets_padding']['std'] = '60px 0 0';
$custom_settings['settings']['shop_widgets_font']['std'] = array (
  'font-color' => '#888888',
  'font-family' => '',
  'font-size' => '',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '',
  'letter-spacing' => '',
  'line-height' => '',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['shop_widgets_link']['std'] = '#222222';
$custom_settings['settings']['shop_widgets_link_hover']['std'] = '#ff3d00';
$custom_settings['settings']['shop_widgets_separator']['std'] = '#dddddd';
$custom_settings['settings']['shop_widgets_button_font']['std'] = array (
  'font-color' => '#222222',
  'font-family' => '',
  'font-size' => '18px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '',
  'letter-spacing' => '',
  'line-height' => '48px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['shop_widgets_button_hover_font']['std'] = array (
  'font-color' => '#ff3d00',
  'font-family' => '',
  'font-size' => '18px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '',
  'letter-spacing' => '',
  'line-height' => '48px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['shop_widgets_button_style']['std'] = 'bordered';
$custom_settings['settings']['shop_widgets_background']['std'] = array (
  'background-color' => '#fafafa',
  'background-repeat' => '',
  'background-attachment' => '',
  'background-position' => '',
  'background-size' => '',
  'background-image' => '',
);
$custom_settings['settings']['shop_widgets_boxshadow']['std'] = '';
$custom_settings['settings']['shop_widgets_h1_font']['std'] = array (
  'font-color' => '#222222',
  'font-family' => '',
  'font-size' => '36px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '42px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['shop_widgets_h2_font']['std'] = array (
  'font-color' => '#222222',
  'font-family' => '',
  'font-size' => '30px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '36px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['shop_widgets_h3_font']['std'] = array (
  'font-color' => '#222222',
  'font-family' => '',
  'font-size' => '24px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '30px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['shop_widgets_h4_font']['std'] = array (
  'font-color' => '#222222',
  'font-family' => '',
  'font-size' => '18px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '28px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['shop_widgets_h5_font']['std'] = array (
  'font-color' => '#222222',
  'font-family' => '',
  'font-size' => '16px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '28px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['shop_widgets_h6_font']['std'] = array (
  'font-color' => '#222222',
  'font-family' => '',
  'font-size' => '14px',
  'font-style' => '',
  'font-variant' => '',
  'font-weight' => '600',
  'letter-spacing' => '',
  'line-height' => '28px',
  'text-decoration' => '',
  'text-transform' => '',
);
$custom_settings['settings']['shop_widgets_margin_override']['std'] = 'off';
$custom_settings['settings']['shop_widgets_columns_margin']['std'] = '30';
$custom_settings['settings']['shop_widgets_rows_margin']['std'] = '60';
$custom_settings['settings']['shop_widgets_type']['std'] = 'normal';
$custom_settings['settings']['shop_widgets_type_height']['std'] = 'shopkit-height-30';
$custom_settings['settings']['shop_widgets_condition']['std'] = 'is_woocommerce';

return $custom_settings;

}
add_filter( 'shopkit_section_shop_widgets_args', 'shopkit_section_shop_widgets_settings' );

function shopkit_activate() {

	if ( ( $thememod = get_theme_mod( 'shopkit_demo_installed' ) ) === false && get_option( 'shopkit_demo_installed', false ) ) {

		$widgets = array ( 'wp_inactive_widgets'=> array ( 0=> 'text-18', 1=> 'text-19', 2=> 'text-20', 3=> 'nav_menu-10', 4=> 'nav_menu-11', 5=> 'nav_menu-12', 6=> 'text-16', 7=> 'text-17', 8=> 'prdctfltr-4', 9=> 'prdctfltr-5', 10=> 'text-14', 11=> 'woocommerce_product_categories-2', 12=> 'woocommerce_products-5', 13=> 'woocommerce_recent_reviews-2', ), 'sidebar-1'=> array (), 'sidebar-2'=> array (), 'sidebar-3'=> array ( 0=> 'woocommerce_top_rated_products-4', 1=> 'woocommerce_product_tag_cloud-4', 2=> 'woocommerce_product_search-3', 3=> 'woocommerce_recently_viewed_products-3', ), 'sidebar-4'=> array ( 0=> 'text-9', 1=> 'search-3', 2=> 'recent-posts-3', 3=> 'recent-comments-3', 4=> 'tag_cloud-2', ), 'shop-information-1'=> array ( 0=> 'text-10', ), 'shop-information-2'=> array ( 0=> 'text-11', ), 'shop-information-3'=> array ( 0=> 'text-12', ), 'shop-information-4'=> array ( 0=> 'text-13', ), 'shop-widgets-1'=> array ( 0=> 'woocommerce_products-2', ), 'shop-widgets-2'=> array ( 0=> 'woocommerce_top_rated_products-2', ), 'shop-widgets-3'=> array ( 0=> 'woocommerce_products-3', ), 'shop-widgets-4'=> array ( 0=> 'woocommerce_products-4', ), 'footer-1'=> array ( 0=> 'text-2', ), 'footer-2'=> array ( 0=> 'text-3', ), 'footer-3'=> array ( 0=> 'text-4', ), 'footer-4'=> array ( 0=> 'text-5', ), 'footer-5'=> array ( 0=> 'text-6', ), 'footer-6'=> array ( 0=> 'text-7', ), 'footer-7'=> array ( 0=> 'text-8', ), 'shopkit-cl-single-product-layout-3'=> array ( 0=> 'woocommerce_top_rated_products-3', 1=> 'woocommerce_product_tag_cloud-2', 2=> 'woocommerce_product_search-2', 3=> 'woocommerce_recently_viewed_products-2', ), 'shopkit-cl-woocommerce-layout-1'=> array ( 0=> 'text-15', 1=> 'prdctfltr-3', ) );

		update_option( 'sidebars_widgets', $widgets );
		set_theme_mod( 'shopkit_demo_installed', time() );

	}

}
add_action( 'after_switch_theme', 'shopkit_activate' );

?>