<?php
/**
 * Initialize the custom Theme Options.
 */
add_action( 'init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 *
 * @return    void
 * @since     2.0
 */
function custom_theme_options() {

  /* OptionTree is not loaded yet, or this is not an admin request */
  if ( ! function_exists( 'ot_settings_id' ) || ! is_admin() )
    return false;

  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( ot_settings_id(), array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'content'       => array( 
        array(
          'id'        => 'option_types_help',
          'title'     => esc_html__( 'Option Types', 'shopkit' ),
          'content'   => '<p>' . esc_html__( 'Help content goes here!', 'shopkit' ) . '</p>'
        )
      ),
      'sidebar'       => '<p>' . esc_html__( 'Sidebar content goes here!', 'shopkit' ) . '</p>'
    ),
    'sections'        => array( 
      array(
        'id'          => 'option_types',
        'title'       => esc_html__( 'Option Types', 'shopkit' )
      )
    ),
    'settings'        => array( 
      array(
        'id'          => 'demo_background',
        'label'       => esc_html__( 'Background', 'shopkit' ),
        'desc'        => sprintf( esc_html__( 'The Background option type is for adding background styles to your theme either dynamically via the CSS option type below or manually with %s. The Background option type has filters that allow you to remove fields or change the defaults. For example, you can filter %s to remove unwanted fields from all Background options or an individual one. You can also filter %s. These filters allow you to fine tune the select lists for your specific needs.', 'shopkit' ), '<code>ot_get_option()</code>', '<code>ot_recognized_background_fields</code>', '<code>ot_recognized_background_repeat</code>, <code>ot_recognized_background_attachment</code>, <code>ot_recognized_background_position</code>, ' . esc_html__( 'and', 'shopkit' ) . ' <code>ot_type_background_size_choices</code>' ),
        'std'         => '',
        'type'        => 'background',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'demo_border',
        'label'       => esc_html__( 'Border', 'shopkit' ),
        'desc'        => esc_html__( 'The Border option type is used to set width, unit, style, and color values.', 'shopkit' ),
        'std'         => '',
        'type'        => 'border',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'demo_box_shadow',
        'label'       => esc_html__( 'Box Shadow', 'shopkit' ),
        'desc'        => sprintf( esc_html__( 'The Box Shadow option type is used to set %s, %s, %s, %s, %s, and %s values.', 'shopkit' ), '<code>inset</code>', '<code>offset-x</code>', '<code>offset-y</code>', '<code>blur-radius</code>', '<code>spread-radius</code>', '<code>color</code>' ),
        'std'         => '',
        'type'        => 'box-shadow',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'demo_category_checkbox',
        'label'       => esc_html__( 'Category Checkbox', 'shopkit' ),
        'desc'        => esc_html__( 'The Category Checkbox option type displays a list of category IDs. It allows the user to check multiple category IDs and will return that value as an array for use in a custom function or loop.', 'shopkit' ),
        'std'         => '',
        'type'        => 'category-checkbox',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'demo_category_select',
        'label'       => esc_html__( 'Category Select', 'shopkit' ),
        'desc'        => esc_html__( 'The Category Select option type displays a list of category IDs. It allows the user to select only one category ID and will return that value for use in a custom function or loop.', 'shopkit' ),
        'std'         => '',
        'type'        => 'category-select',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'demo_checkbox',
        'label'       => esc_html__( 'Checkbox', 'shopkit' ),
        'desc'        => esc_html__( 'The Checkbox option type displays a group of choices. It allows the user to check multiple choices and will return that value as an array for use in a custom function or loop.', 'shopkit' ),
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'no',
            'label'       => esc_html__( 'No', 'shopkit' ),
            'src'         => ''
          ),
          array(
            'value'       => 'Yes',
            'label'       => esc_html__( 'Yes', 'shopkit' ),
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'demo_colorpicker',
        'label'       => esc_html__( 'Colorpicker', 'shopkit' ),
        'desc'        => esc_html__( 'The Colorpicker option type saves a hexadecimal color code for use in CSS. Use it to modify the color of something in your theme.', 'shopkit' ),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'demo_colorpicker_opacity',
        'label'       => esc_html__( 'Colorpicker Opacity', 'shopkit' ),
        'desc'        => esc_html__( 'Colorpicker Opacity', 'shopkit' ),
        'desc'        => sprintf( esc_html__( 'The Colorpicker Opacity option type saves an rgba color value for use in CSS. To add opacity to other colorpickers add the %s class to the %s array.', 'shopkit' ), '<code>ot-colorpicker-opacity</code>', '<code>$args</code>' ),
        'std'         => '',
        'type'        => 'colorpicker-opacity',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'demo_css',
        'label'       => esc_html__( 'CSS', 'shopkit' ),
        'desc'        => '<p>' . sprintf( esc_html__( 'The CSS option type is a textarea that when used properly can add dynamic CSS to your theme from within OptionTree. Unfortunately, due server limitations you will need to create a file named %s at the root level of your theme and change permissions using %s so the server can write to the file. I have had the most success setting this single file to %s but feel free to play around with permissions until everything is working. A good starting point is %s. When the server can save to the file, CSS will automatically be updated when you save your Theme Options.', 'shopkit' ), '<code>dynamic.css</code>', '<code>chmod</code>', '<code>0777</code>', '<code>0666</code>' ) . '</p><p>' . sprintf( esc_html__( 'This example assumes you have an option with the ID of %1$s. Which means this option will automatically insert the value of %1$s into the %2$s when the Theme Options are saved.', 'shopkit' ), '<code>demo_background</code>', '<code>dynamic.css</code>' ) . '</p>',
        'std'         => '#custom {
  {{demo_background}}
}',
        'type'        => 'css',
        'section'     => 'option_types',
        'rows'        => '20',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'demo_custom_post_type_checkbox',
        'label'       => esc_html__( 'Custom Post Type Checkbox', 'shopkit' ),
        'desc'        => sprintf( esc_html__( 'The Custom Post Type Select option type displays a list of IDs from any available WordPress post type or custom post type. It allows the user to check multiple post IDs for use in a custom function or loop. Requires at least one valid %1$s in the %1$s field.', 'shopkit' ), '<code>post_type</code>' ),
        'std'         => '',
        'type'        => 'custom-post-type-checkbox',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => 'post',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'demo_custom_post_type_select',
        'label'       => esc_html__( 'Custom Post Type Select', 'shopkit' ),
        'desc'        => sprintf( esc_html__( 'The Custom Post Type Select option type displays a list of IDs from any available WordPress post type or custom post type. It will return a single post ID for use in a custom function or loop. Requires at least one valid %1$s in the %1$s field.', 'shopkit' ), '<code>post_type</code>' ),
        'std'         => '',
        'type'        => 'custom-post-type-select',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => 'post',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'demo_date_picker',
        'label'       => esc_html__( 'Date Picker', 'shopkit' ),
        'desc'        => esc_html__( 'The Date Picker option type is tied to a standard form input field which displays a calendar pop-up that allow the user to pick any date when focus is given to the input field. The returned value is a date formatted string.', 'shopkit' ),
        'std'         => '',
        'type'        => 'date-picker',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'demo_date_time_picker',
        'label'       => esc_html__( 'Date Time Picker', 'shopkit' ),
        'desc'        => esc_html__( 'The Date Time Picker option type is tied to a standard form input field which displays a calendar pop-up that allow the user to pick any date and time when focus is given to the input field. The returned value is a date and time formatted string.', 'shopkit' ),
        'std'         => '',
        'type'        => 'date-time-picker',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'demo_dimension',
        'label'       => esc_html__( 'Dimension', 'shopkit' ),
        'desc'        => esc_html__( 'The Dimension option type is used to set width and height values.', 'shopkit' ),
        'std'         => '',
        'type'        => 'dimension',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'demo_gallery',
        'label'       => esc_html__( 'Gallery', 'shopkit' ),
        'desc'        => esc_html__( 'The Gallery option type saves a comma separated list of image attachment IDs. You will need to create a front-end function to display the images in your theme.', 'shopkit' ),
        'std'         => '',
        'type'        => 'gallery',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'demo_gallery_shortcode',
        'label'       => esc_html__( 'Gallery Shortcode', 'shopkit' ),
        'desc'        => sprintf( esc_html__( 'The Gallery option type can also be saved as a shortcode by adding %s to the class attribute. Using the Gallery option type in this manner will result in a better user experience as you\'re able to save the link, column, and order settings.', 'shopkit' ), '<code>ot-gallery-shortcode</code>' ),
        'std'         => '',
        'type'        => 'gallery',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => 'ot-gallery-shortcode',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'demo_google_fonts',
        'label'       => esc_html__( 'Google Fonts', 'shopkit' ),
        'desc'        => sprintf( esc_html__( 'The Google Fonts option type will dynamically enqueue any number of Google Web Fonts into the document %1$s. As well, once the option has been saved each font family will automatically be inserted into the %2$s array for the Typography option type. You can further modify the font stack by using the %3$s filter, which is passed the %4$s, %5$s, and %6$s parameters. The %6$s parameter is being passed from %7$s, so it will be the ID of a Typography option type. This will allow you to add additional web safe fonts to individual font families on an as-need basis.', 'shopkit' ), '<code>HEAD</code>', '<code>font-family</code>', '<code>ot_google_font_stack</code>', '<code>$font_stack</code>', '<code>$family</code>', '<code>$field_id</code>', '<code>ot_recognized_font_families</code>' ),
        'std'         => array( 
          array(
            'family'    => 'opensans',
            'variants'  => array( '300', '300italic', 'regular', 'italic', '600', '600italic' ),
            'subsets'   => array( 'latin' )
          )
        ),
        'type'        => 'google-fonts',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'demo_javascript',
        'label'       => esc_html__( 'JavaScript', 'shopkit' ),
        'desc'        => '<p>' . sprintf( esc_html__( 'The JavaScript option type is a textarea that uses the %s code editor to highlight your JavaScript and display errors as you type.', 'shopkit' ), '<code>ace.js</code>' ) . '</p>',
        'std'         => '',
        'type'        => 'javascript',
        'section'     => 'option_types',
        'rows'        => '20',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'demo_link_color',
        'label'       => esc_html__( 'Link Color', 'shopkit' ),
        'desc'        => esc_html__( 'The Link Color option type is used to set all link color states.', 'shopkit' ),
        'std'         => '',
        'type'        => 'link-color',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'demo_list_item',
        'label'       => esc_html__( 'List Item', 'shopkit' ),
        'desc'        => esc_html__( 'The List Item option type allows for a great deal of customization. You can add settings to the List Item and those settings will be displayed to the user when they add a new List Item. Typical use is for creating sliding content or blocks of code for custom layouts.', 'shopkit' ),
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'settings'    => array( 
          array(
            'id'          => 'demo_list_item_content',
            'label'       => esc_html__( 'Content', 'shopkit' ),
            'desc'        => '',
            'std'         => '',
            'type'        => 'textarea-simple',
            'rows'        => '10',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          )
        )
      ),
      array(
        'id'          => 'demo_measurement',
        'label'       => esc_html__( 'Measurement', 'shopkit' ),
        'desc'        => sprintf( esc_html__( 'The Measurement option type is a mix of input and select fields. The text input excepts a value and the select lets you choose the unit of measurement to add to that value. Currently the default units are %s, %s, %s, and %s. However, you can change them with the %s filter.', 'shopkit' ), '<code>px</code>', '<code>%</code>', '<code>em</code>', '<code>pt</code>', '<code>ot_measurement_unit_types</code>' ),
        'std'         => '',
        'type'        => 'measurement',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'demo_numeric_slider',
        'label'       => esc_html__( 'Numeric Slider', 'shopkit' ),
        'desc'        => esc_html__( 'The Numeric Slider option type displays a jQuery UI slider. It will return a single numerical value for use in a custom function or loop.', 'shopkit' ),
        'std'         => '',
        'type'        => 'numeric-slider',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '-500,5000,100',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'demo_on_off',
        'label'       => esc_html__( 'On/Off', 'shopkit' ),
        'desc'        => sprintf( esc_html__( 'The On/Off option type displays a simple switch that can be used to turn things on or off. The saved return value is either %s or %s.', 'shopkit' ), '<code>on</code>', '<code>off</code>' ),
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'demo_page_checkbox',
        'label'       => esc_html__( 'Page Checkbox', 'shopkit' ),
        'desc'        => esc_html__( 'The Page Checkbox option type displays a list of page IDs. It allows the user to check multiple page IDs for use in a custom function or loop.', 'shopkit' ),
        'std'         => '',
        'type'        => 'page-checkbox',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'demo_page_select',
        'label'       => esc_html__( 'Page Select', 'shopkit' ),
        'desc'        => esc_html__( 'The Page Select option type displays a list of page IDs. It will return a single page ID for use in a custom function or loop.', 'shopkit' ),
        'std'         => '',
        'type'        => 'page-select',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'demo_post_checkbox',
        'label'       => esc_html__( 'Post Checkbox', 'shopkit' ),
        'desc'        => esc_html__( 'The Post Checkbox option type displays a list of post IDs. It allows the user to check multiple post IDs for use in a custom function or loop.', 'shopkit' ),
        'std'         => '',
        'type'        => 'post-checkbox',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'demo_post_select',
        'label'       => esc_html__( 'Post Select', 'shopkit' ),
        'desc'        => esc_html__( 'The Post Select option type displays a list of post IDs. It will return a single post ID for use in a custom function or loop.', 'shopkit' ),
        'std'         => '',
        'type'        => 'post-select',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'demo_radio',
        'label'       => esc_html__( 'Radio', 'shopkit' ),
        'desc'        => esc_html__( 'The Radio option type displays a group of choices. It allows the user to choose one and will return that value as a string for use in a custom function or loop.', 'shopkit' ),
        'std'         => '',
        'type'        => 'radio',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'yes',
            'label'       => esc_html__( 'Yes', 'shopkit' ),
            'src'         => ''
          ),
          array(
            'value'       => 'no',
            'label'       => esc_html__( 'No', 'shopkit' ),
            'src'         => ''
          ),
          array(
            'value'       => 'maybe',
            'label'       => esc_html__( 'Maybe', 'shopkit' ),
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'demo_radio_image',
        'label'       => esc_html__( 'Radio Image', 'shopkit' ),
        'desc'        => sprintf( esc_html__( 'the Radio Images option type is primarily used for layouts. However, you can filter the image list using %s. As well, you can add your own custom images using the choices array.', 'shopkit' ), '<code>ot_radio_images</code>' ),
        'std'         => 'right-sidebar',
        'type'        => 'radio-image',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'demo_select',
        'label'       => esc_html__( 'Select', 'shopkit' ),
        'desc'        => esc_html__( 'The Select option type is used to list anything you want that would be chosen from a select list.', 'shopkit' ),
        'std'         => '',
        'type'        => 'select',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => '',
            'label'       => esc_html__( '-- Choose One --', 'shopkit' ),
            'src'         => ''
          ),
          array(
            'value'       => 'yes',
            'label'       => esc_html__( 'Yes', 'shopkit' ),
            'src'         => ''
          ),
          array(
            'value'       => 'no',
            'label'       => esc_html__( 'No', 'shopkit' ),
            'src'         => ''
          ),
          array(
            'value'       => 'maybe',
            'label'       => esc_html__( 'Maybe', 'shopkit' ),
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'demo_sidebar_select',
        'label'       => esc_html__( 'Sidebar Select', 'shopkit' ),
        'desc'        => '<p>' . sprintf(  esc_html__( 'This option type makes it possible for users to select a WordPress registered sidebar to use on a specific area. By using the two provided filters, %s, and %s we can be selective about which sidebars are available on a specific content area.', 'shopkit' ), '<code>ot_recognized_sidebars</code>', '<code>ot_recognized_sidebars_{$field_id}</code>' ) . '</p><p>' . sprintf( esc_html__( 'For example, if we create a WordPress theme that provides the ability to change the Blog Sidebar and we don\'t want to have the footer sidebars available on this area, we can unset those sidebars either manually or by using a regular expression if we have a common name like %s.', 'shopkit' ), '<code>footer-sidebar-$i</code>' ) . '</p>',
        'std'         => '',
        'type'        => 'sidebar-select',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'demo_social_links',
        'label'       => esc_html__( 'Social Links', 'shopkit' ),
        'desc'        => '<p>' . sprintf( esc_html__( 'The Social Links option type utilizes a drag & drop interface to create a list of social links. There are a few filters that make extending this option type easy. You can set the %s filter to %s and turn off loading default values. Use the %s filter to change the default values that are loaded. To filter the settings array use the %s filter.', 'shopkit' ), '<code>ot_type_social_links_load_defaults</code>', '<code>false</code>', '<code>ot_type_social_links_defaults</code>', '<code>ot_social_links_settings</code>' ) . '</p>',
        'std'         => '',
        'type'        => 'social-links',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'demo_spacing',
        'label'       => esc_html__( 'Spacing', 'shopkit' ),
        'desc'        => esc_html__( 'The Spacing option type is used to set spacing values such as padding or margin in the form of top, right, bottom, and left.', 'shopkit' ),
        'std'         => '',
        'type'        => 'spacing',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'demo_tag_checkbox',
        'label'       => esc_html__( 'Tag Checkbox', 'shopkit' ),
        'desc'        => esc_html__( 'The Tag Checkbox option type displays a list of tag IDs. It allows the user to check multiple tag IDs and will return that value as an array for use in a custom function or loop.', 'shopkit' ),
        'std'         => '',
        'type'        => 'tag-checkbox',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'demo_tag_select',
        'label'       => esc_html__( 'Tag Select', 'shopkit' ),
        'desc'        => esc_html__( 'The Tag Select option type displays a list of tag IDs. It allows the user to select only one tag ID and will return that value for use in a custom function or loop.', 'shopkit' ),
        'std'         => '',
        'type'        => 'tag-select',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'demo_taxonomy_checkbox',
        'label'       => esc_html__( 'Taxonomy Checkbox', 'shopkit' ),
        'desc'        => esc_html__( 'The Taxonomy Checkbox option type displays a list of taxonomy IDs. It allows the user to check multiple taxonomy IDs and will return that value as an array for use in a custom function or loop.', 'shopkit' ),
        'std'         => '',
        'type'        => 'taxonomy-checkbox',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => 'category,post_tag',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'demo_taxonomy_select',
        'label'       => esc_html__( 'Taxonomy Select', 'shopkit' ),
        'desc'        => esc_html__( 'The Taxonomy Select option type displays a list of taxonomy IDs. It allows the user to select only one taxonomy ID and will return that value for use in a custom function or loop.', 'shopkit' ),
        'std'         => '',
        'type'        => 'taxonomy-select',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => 'category,post_tag',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'demo_text',
        'label'       => esc_html__( 'Text', 'shopkit' ),
        'desc'        => esc_html__( 'The Text option type is used to save string values. For example, any optional or required text that is of reasonably short character length.', 'shopkit' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'demo_textarea',
        'label'       => esc_html__( 'Textarea', 'shopkit' ),
        'desc'        => sprintf( esc_html__( 'The Textarea option type is a large string value used for custom code or text in the theme and has a WYSIWYG editor that can be filtered to change the how it is displayed. For example, you can filter %s, %s, %s, and %s.', 'shopkit' ), '<code>wpautop</code>', '<code>media_buttons</code>', '<code>tinymce</code>', '<code>quicktags</code>' ),
        'std'         => '',
        'type'        => 'textarea',
        'section'     => 'option_types',
        'rows'        => '15',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'demo_textarea_simple',
        'label'       => esc_html__( 'Textarea Simple', 'shopkit' ),
        'desc'        => esc_html__( 'The Textarea Simple option type is a large string value used for custom code or text in the theme. The Textarea Simple does not have a WYSIWYG editor.', 'shopkit' ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'option_types',
        'rows'        => '10',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'demo_textblock',
        'label'       => esc_html__( 'Textblock', 'shopkit' ),
        'desc'        => esc_html__( 'The Textblock option type is used only on the Theme Option page. It will allow you to create & display HTML, but has no title above the text block. You can then use the Textblock to add a more detailed set of instruction on how the options are used in your theme. You would never use this in your themes template files as it does not save a value.', 'shopkit' ),
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'demo_textblock_titled',
        'label'       => esc_html__( 'Textblock Titled', 'shopkit' ),
        'desc'        => esc_html__( 'The Textblock Titled option type is used only on the Theme Option page. It will allow you to create & display HTML, and has a title above the text block. You can then use the Textblock Titled to add a more detailed set of instruction on how the options are used in your theme. You would never use this in your themes template files as it does not save a value.', 'shopkit' ),
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'demo_typography',
        'label'       => esc_html__( 'Typography', 'shopkit' ),
        'desc'        => sprintf( esc_html__( 'The Typography option type is for adding typography styles to your theme either dynamically via the CSS option type above or manually with %s. The Typography option type has filters that allow you to remove fields or change the defaults. For example, you can filter %s to remove unwanted fields from all Background options or an individual one. You can also filter %s. These filters allow you to fine tune the select lists for your specific needs.', 'shopkit' ), '<code>ot_get_option()</code>', '<code>ot_recognized_typography_fields</code>', '<code>ot_recognized_font_families</code>, <code>ot_recognized_font_sizes</code>, <code>ot_recognized_font_styles</code>, <code>ot_recognized_font_variants</code>, <code>ot_recognized_font_weights</code>, <code>ot_recognized_letter_spacing</code>, <code>ot_recognized_line_heights</code>, <code>ot_recognized_text_decorations</code> ' . esc_html__( 'and', 'shopkit' ) . ' <code>ot_recognized_text_transformations</code>' ),
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'demo_upload',
        'label'       => esc_html__( 'Upload', 'shopkit' ),
        'desc'        => sprintf( esc_html__( 'The Upload option type is used to upload any WordPress supported media. After uploading, users are required to press the "%s" button in order to populate the input with the URI of that media. There is one caveat of this feature. If you import the theme options and have uploaded media on one site the old URI will not reflect the URI of your new site. You will have to re-upload or %s any media to your new server and change the URIs if necessary.', 'shopkit' ), apply_filters( 'ot_upload_text', esc_html__( 'Send to OptionTree', 'shopkit' ) ), 'FTP' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'demo_upload_attachment_id',
        'label'       => esc_html__( 'Upload Attachment ID', 'shopkit' ),
        'desc'        => sprintf( esc_html__( 'The Upload option type can also be saved as an attachment ID by adding %s to the class attribute.', 'shopkit' ), '<code>ot-upload-attachment-id</code>' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => 'ot-upload-attachment-id',
        'condition'   => '',
        'operator'    => 'and'
      )
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( ot_settings_id(), $custom_settings ); 
  }
  
  /* Lets OptionTree know the UI Builder is being overridden */
  global $ot_has_custom_theme_options;
  $ot_has_custom_theme_options = true;
  
}