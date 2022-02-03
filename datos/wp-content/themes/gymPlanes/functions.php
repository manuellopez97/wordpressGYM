<?php
// para activas menús
function yoo_menus()
{
    register_nav_menus(array(
          'menu-principal' => __(' Menú Principal','a')
    ));
}
 add_action('init','yoo_menus');

 // styles y scripts

 function yoo_scripts_styles()
 {
    wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css',array(),'8.0.1');
    wp_enqueue_style('slickcss', get_template_directory_uri() . '/css/slicknav.min.css',array(),'8.0.1');
    wp_enqueue_style('style',get_stylesheet_uri(),array('normalize'),'1.0.0');
    wp_enqueue_script('slicknav', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array('jquery'), '1.0.10', true);
    wp_enqueue_script('mijs', get_template_directory_uri() . '/js/mijs.js', array('jquery','slicknav'), '1.0.10', true);
 }
 add_action('wp_enqueue_scripts','yoo_scripts_styles');

 //activar imagenes destacadas
function yoo_imagen()
{
    add_theme_support('post-thumbnails');
    //agregar imágenes personalizadas
    // instalar plugin Regenerate Thumbnails, se encuentra en herramientas.
    add_image_size("normal", 640, 480, true);
    add_image_size("bajo", 320, 200, true);
    add_image_size("web", 800, 600, true);
    add_image_size("alto", 1024, 768, true);
}
add_action('after_setup_theme','yoo_imagen');

function yoo_listado_clases()
 {?>
    <ul class="listadoclases">
        <?php
         $arg=array(
           'post_type' => 'nueva_opt',
           'post_per_page' => 10,
           'order' => 'ASC',
           'orderby' => 'title'
         );
          $clases= new WP_Query($arg);
          while( $clases->have_posts()): $clases->the_post();?>
         
          <li class="clase card">
              <?php the_post_thumbnail('normal');?>
              <div class="contenido">
                  <a href="<?php  the_permalink(); ?>">
                      <h3><?php the_title();?></h3>
                  </a>
                  <p>
                      <?php
                      $dias= get_field('dias_clase');
                      $horai= get_field('hora_inicio');
                      $horaf= get_field('hora_fin');
                      echo " $dias - $horai a $horaf";
                      ?>
                  </p>
             
              </div>
          </li>
          <?php endwhile;
       
        ?>
    </ul>

<?php
 }

?>