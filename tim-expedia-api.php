<?php
/*
Plugin Name: Tim Expedia Api
Description: This plugin allows to query Expedia Affiliate Network API
Author: Tymur Morozov
Version: 1.0
*/

defined( 'ABSPATH' ) or die( 'Plugin file cannot be accessed directly.' );

if ( ! class_exists( 'TimExpediaApi' ) ) {
  class TimExpediaApi
  {

    /**
     * Tag identifier used by file includes and selector attributes.
     * @var string
     */
    protected $tag = 'mtvexpapi';
    
    /**
     * User friendly name used to identify the plugin.
     * @var string
     */
    protected $name = 'Tim Expedia Api';

    /**
     * Initiate the plugin by setting the default values and assigning any
     * required actions and filters.
     *
     * @access public
     */
    public function __construct()
    {
      if ( is_admin() ) {
        add_action('admin_menu', array( &$this, 'create_settings_page') );

        add_action('admin_init', array( &$this, 'create_settings_fields') );
      }
    }

    /**
     * Add the setting menu & page
     *
     * @access public
     */
    public function create_settings_page()
    {
      add_options_page($this->name, $this->name, 'manage_options', $this->tag, array( &$this, 'options_page_html'));
    }

    /**
     * Outputs options page
     *
     * @access public
     */
    public function options_page_html()
    {
      ?>
        <div>
          <h2><?=$this->name?></h2>
          <form action="options.php" method="post">
            <?php settings_fields($this->tag); ?>
            <?php do_settings_sections($this->tag); ?>
            <?php submit_button(); ?>
          </form>
        </div>
      <?php      
    }


    /**
     * Add settings fields
     *
     * @access public
     */
    public function create_settings_fields()
    {
      $section = $this->tag;

      register_setting( $section, $this->tag, array( &$this, 'options_validate') );
      
      add_settings_section(
        $this->tag . '_settings_section',
        'API key Settings',
        function () {
          echo '<p>Values provided by Expedia for quering API.</p>';
        },
        $section
      );

      add_settings_field(
        $this->tag . '_' . 'apiKey' . '_settings', 
        'Api Key', 
        array( &$this, 'apikey_settings_field' ),
        $section,
        $this->tag . '_settings_section');

      // add_settings_field(
      //   $this->tag . '_' . 'apiKey' . '_settings',
      //   'apiKey',
      //   array( &$this, 'apikey_settings_field' ),
      //   $section,
      //   $this->tag . '_settings_section',
      //   $options
      // );      
    }

    public function apikey_settings_field() {
      $options = get_option($this->tag);
      $atts = array(
        'id' => $this->tag . '_apikey',
        'name' => $this->tag . '[apiKey]',
        'type' => 'text' ,
        'value' => $options['apiKey']
      );
      
      array_walk( $atts, function( &$item, $key ) {
        $item = esc_attr( $key ) . '="' . esc_attr( $item ) . '"';
      } );

      echo '<input ' . implode( ' ', $atts ) . '/>';
    }

    public function options_validate($input) {
      $newinput['apiKey'] = trim($input['apiKey']);
      if(!preg_match('/^[a-z0-9]*$/i', $newinput['apiKey'])) {
        $newinput['apiKey'] = 'a';
      }
      return $newinput;      
    }
  }

  new TimExpediaApi;
}