<?php
/**
 * Initialize the custom Meta Boxes. 
 */
add_action( 'admin_init', 'custom_meta_boxes' );

/**
 * Meta Boxes demo code.
 *
 * You can find all the available option types in demo-theme-options.php.
 *
 * @return    void
 * @since     2.0
 */
function custom_meta_boxes() {
  
  /**
   * Create a custom meta boxes array that we pass to 
   * the OptionTree Meta Box API Class.
   */
  $my_meta_box = array(
    'id'          => 'demo_meta_box',
    'title'       => esc_html__( 'Demo Meta Box', 'shopkit' ),
    'desc'        => '',
    'pages'       => array( 'post' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'label'       => esc_html__( 'Conditions', 'shopkit' ),
        'id'          => 'demo_conditions',
        'type'        => 'tab'
      ),
      array(
        'label'       => esc_html__( 'Show Gallery', 'shopkit' ),
        'id'          => 'demo_show_gallery',
        'type'        => 'on-off',
        'desc'        => sprintf( esc_html__( 'Shows the Gallery when set to %s.', 'shopkit' ), '<code>on</code>' ),
        'std'         => 'off'
      ),
      array(
        'label'       => '',
        'id'          => 'demo_textblock',
        'type'        => 'textblock',
        'desc'        => esc_html__( 'Congratulations, you created a gallery!', 'shopkit' ),
        'operator'    => 'and',
        'condition'   => 'demo_show_gallery:is(on),demo_gallery:not()'
      ),
      array(
        'label'       => esc_html__( 'Gallery', 'shopkit' ),
        'id'          => 'demo_gallery',
        'type'        => 'gallery',
        'desc'        => sprintf( esc_html__( 'This is a Gallery option type. It displays when %s.', 'shopkit' ), '<code>demo_show_gallery:is(on)</code>' ),
        'condition'   => 'demo_show_gallery:is(on)'
      ),
      array(
        'label'       => esc_html__( 'More Options', 'shopkit' ),
        'id'          => 'demo_more_options',
        'type'        => 'tab'
      ),
      array(
        'label'       => esc_html__( 'Text', 'shopkit' ),
        'id'          => 'demo_text',
        'type'        => 'text',
        'desc'        => esc_html__( 'This is a demo Text field.', 'shopkit' )
      ),
      array(
        'label'       => esc_html__( 'Textarea', 'shopkit' ),
        'id'          => 'demo_textarea',
        'type'        => 'textarea',
        'desc'        => esc_html__( 'This is a demo Textarea field.', 'shopkit' )
      )
    )
  );
  
  /**
   * Register our meta boxes using the 
   * ot_register_meta_box() function.
   */
  if ( function_exists( 'ot_register_meta_box' ) )
    ot_register_meta_box( $my_meta_box );

}