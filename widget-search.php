<?php

require_once(TIMEXPAPI__PLUGIN_DIR . "search-form-renderer.php");


class TimExpediaApiSearchWidget extends WP_Widget {
  /**
   * Register widget with WordPress.
   */  
  function __construct() {
    parent::__construct(
      'timexpapi_search', // Base ID
      __( 'Search Hotel', 'text_domain' ), // Name
      array( 'description' => __( 'Search Form for Hotel query', 'text_domain' ), ) // Args
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
    wp_enqueue_script('jquery-ui-datepicker');
    wp_enqueue_style('jquery-style', 'https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css');    
    wp_enqueue_script('handlebars', TIMEXPAPI__PLUGIN_URL.'js/3party/handlebars-v3.0.3.js', array());
    wp_enqueue_script('timexpapi-helpers', TIMEXPAPI__PLUGIN_URL.'js/helpers.js', array('jquery', 'handlebars'));
    wp_enqueue_script('timexpapi-templates', TIMEXPAPI__PLUGIN_URL.'js/templates.js', array('handlebars', 'timexpapi-helpers'));
    wp_enqueue_script('timexpapi-namespace', TIMEXPAPI__PLUGIN_URL.'js/namespace.js', array('jquery'));
    wp_enqueue_script('timexpapi-datepicker', TIMEXPAPI__PLUGIN_URL.'js/datepicker-module.js', array('jquery'));
    wp_enqueue_script('timexpapi-rooms', TIMEXPAPI__PLUGIN_URL.'js/rooms-module.js', array('jquery'));
    wp_enqueue_script('timexpapi-app', TIMEXPAPI__PLUGIN_URL.'js/app.js', array('jquery', 
      'timexpapi-namespace', 'timexpapi-templates', 'timexpapi-datepicker', 'timexpapi-rooms'));

    echo $args['before_widget'];
    if ( ! empty( $instance['title'] ) ) {
      echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
    }

    $params = array();
    TimExpediaApiFormRenderer::renderForm($params);

    echo $args['after_widget'];
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
