<?
// class TimExpediaApiOptionsPage 
// {
//   private static $initiated = false;

//   private static $tag = 'mtvexpapi';
//   private static $name = 'Tim Expedia Api';

//   public static function init() {
//     if ( ! self::$initiated ) {
//       self::init_hooks();
//     }
//   }
// }

class TimExpediaApiOptionsPage
{

  protected $tag = 'mtvexpapi';
  protected $name = 'Tim Expedia Api';

  public function __construct()
  {
    if ( is_admin() ) {
      add_action('admin_menu', array( &$this, 'create_settings_page') );
      add_action('admin_init', array( &$this, 'create_settings_fields') );
    }
  }

  public function create_settings_page()
  {
    add_options_page($this->name, $this->name, 'manage_options', $this->tag, array( &$this, 'options_page_html'));
  }

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
