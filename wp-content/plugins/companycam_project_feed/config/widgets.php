<?php

add_action( 'widgets_init', 'companycam_sidebar_init' );
function companycam_sidebar_init() {
    register_sidebar( array(
        'name' => __( 'CompanyCam Sidebar'),
        'id' => 'companycam-sidebar',
        'description' => __( 'Sidebar to show all project feeds from CompanyCam'),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
}

// Register and load the widget
function companycam_load_widget() {
    register_widget( 'companycam_feed_widget' );
}
add_action( 'widgets_init', 'companycam_load_widget' );

// Creating the widget
class companycam_feed_widget extends WP_Widget {

    function __construct() {
        parent::__construct(

            'companycam_feed_widget',

            __('CompanyCam Projects Feed Widget'),

            array( 'description' => __( 'This Widget displays the latest feed projects from CompanyCam', 'wpb_widget_domain' ), )
        );
    }

    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );

        echo $args['before_widget'];
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];

        echo __( 'Placeholder' );
        echo $args['after_widget'];
    }

    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'New title', 'wpb_widget_domain' );
        }

        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
}