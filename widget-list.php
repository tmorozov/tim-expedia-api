<?php

require_once(TIMEXPAPI__PLUGIN_DIR . "expedia_api_wrapper/expedia-api.php");
require_once(TIMEXPAPI__PLUGIN_DIR . "hotel-list-renderer.php");

class TimExpediaApiListWidget extends WP_Widget {
  /**
   * Register widget with WordPress.
   */  
  function __construct() {
    parent::__construct(
      'timexpapi_list', // Base ID
      __( 'Hotels List', 'text_domain' ), // Name
      array( 'description' => __( 'Hotel list from Expedia', 'text_domain' ), ) // Args
    );
  }

  /**
   * Front-end display of widget.
   *
   * @see WP_Widget::widget()
   *
   * @param array $args     Widget arguments.
   * @param array $instance Saved values from database.
   */
  public function widget( $args, $instance ) {
    echo $args['before_widget'];
    if ( ! empty( $instance['title'] ) ) {
      echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
    }
    
    $api_public_key = 'cbrzfta369qwyrm9t5b8y8kf'; // If you get authentication Error
    $customer_id = '55505'; // Change this to your own customer ID.
    $currency_code = 'USD';
    $minor_rev = 99;
    $locale = 'en_US' ;

    // initiate the API object
    $myapi = new API( $customer_id , $api_public_key );

    // set some basics parameters
    $myapi->set_customer_session_id( session_id() );
    $myapi->set_customer_ip_address($_SERVER['REMOTE_ADDR']);
    $myapi->set_customer_user_agent($_SERVER['HTTP_USER_AGENT']);
    $myapi->set_currency_code($currency_code);
    $myapi->set_minor_rev($minor_rev);
    $myapi->set_locale($locale);

    // get hotels list for specified destination
    // lang=en
    // currency=USD
    // destination=Kiev
    // checkin=05%2F15%2F2015
    // checkout=05%2F16%2F2015
    // roomsCount=1
    // rooms%5B0%5D.adultsCount=1
    // rooms%5B0%5D.childrenCount=0
 
    $params = TimExpediaApiListWidget::parseParams();
    $hotels = $myapi->getHotelList($params);
    TimExpediaApiListRenderer::renderHotelList($hotels);

    echo $args['after_widget'];
  }

  private static function parseParams() {
    $params = array();
    $params['destinationString'] = $_GET['destination'];
    $params['arrivalDate'] = $_GET['checkin'];
    $params['departureDate'] = $_GET['checkout'];

    // TODO: load from settings
    $params['numberOfResults'] = 500;

    foreach ($_GET['rooms'] as $key => $value) {
      // $value['adultsCount'];// . ",13,6";
      $roomGuests = count($value['children']) > 0 ?  $value['adultsCount'].",".implode(",", $value['children']) : $value['adultsCount'];
      $params['room' . ($key+1)] = $roomGuests;
    }

    return $params;
  }

  /**
   * Back-end widget form.
   *
   * @see WP_Widget::form()
   *
   * @param array $instance Previously saved values from database.
   */
  public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
    </p>
    <?php 
  }

  /**
   * Sanitize widget form values as they are saved.
   *
   * @see WP_Widget::update()
   *
   * @param array $new_instance Values just sent to be saved.
   * @param array $old_instance Previously saved values from database.
   *
   * @return array Updated safe values to be saved.
   */
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

    return $instance;
  }

}
