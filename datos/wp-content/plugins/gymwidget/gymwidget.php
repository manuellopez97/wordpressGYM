<?php
/*
 Plugin Name:  Gym Widget
 Author: Javier
 Plugin URI:
 Author URI:
 Description: Plugin para añadir Widget al Gym
 Version: 1.0.0
*/
// Registrar Custom Post Type
if (!defined("ABSPATH")) die();
class jag_widget extends WP_Widget {
    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'jag_widget', // Base ID
            esc_html__( 'Gym Title', 'text_domain' ), // Name
            array( 'description' => esc_html__( 'Widget para Gym', 'text_domain' ), ) // Args
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
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }

        $cantidad= $instance['cantidad'];
        if (empty($cantidad))
         {
             $cantidad=3;
         }

        ?>
        <ul class="lado">
        <?php
         $arg=array(
           'post_type' => 'nueva_opt',
           'posts_per_page' => $cantidad,
           'orderby' => 'rand'
           
         );
          $clases= new WP_Query($arg);

          while( $clases->have_posts()): $clases->the_post();?>
         
          <li class="e_lado">
              <div class="imagen">
              <?php the_post_thumbnail('thumbnail');?>
              </div>
              <div class="contenido">
                  <a href="<?php  the_permalink(); ?>">
                      <h4><?php the_title();?></h4>
                  </a>
                 
                      <?php  //the_field();
                      $dias= get_field('dias_clase');
                      $horai= get_field('hora_inicio');
                      $horaf= get_field('hora_fin');
                      echo "<h5> $dias <br> $horai a $horaf </h5>";
                      ?>
                 
             
              </div>
          </li>
          <?php endwhile;
          wp_reset_postdata();
       
        ?>
    </ul>
   

        <?php echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        $cantidad = ! empty( $instance['cantidad'] ) ? $instance['cantidad'] : esc_html__( '', 'text_domain' );
        ?>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'cantidad' ) ); ?>"><?php esc_attr_e( 'Cantidad:', 'text_domain' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'cantidad' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'cantidad' ) ); ?>" type="text" value="<?php echo esc_attr( $cantidad ); ?>">
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
        $instance['cantidad'] = ( ! empty( $new_instance['cantidad'] ) ) ? sanitize_text_field( $new_instance['cantidad'] ) : '';

        return $instance;
    }

} // class Foo_Widget

// registro el widget
function register_jag_widget() {
    register_widget( 'jag_widget' );
}
add_action( 'widgets_init', 'register_jag_widget' );