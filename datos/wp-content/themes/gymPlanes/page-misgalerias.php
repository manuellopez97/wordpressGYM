<?php 
/*
* Template Name: Galeria para las fotos
*/
get_header();?>
<main class="pagina contenedor">
        <div class="contenidop ">
        <?php
            while (have_posts()): the_post();    
        ?>
        <h1 class="titulopage"><?php the_title()?></h1>
        <!--  Comando para detectar si hay has_post_thumbnail() -->
        <!-- Tamaños thumbail, medium, large y full -->
        <?php the_post_thumbnail('bajo', array( 'class' => 'imagendestacada')) ?>
        
        <?php
            $galeria= get_post_gallery( get_the_ID(), false );
            $fotos= explode(',',$galeria['ids']);
            /*echo "<pre>";
            //var_dump($galeria);
            var_dump($galeria['ids']);
            var_dump($fotos);
            echo "</pre>";*/
        ?>
        <ul class="galeria-imagenes contenido">
            <?php
                $indice=1;
                foreach($fotos as $foto):
                    if ($indice==4 || $indice==6):
                        $tipo='rectangu';
                    else:
                        $tipo='cuadrado';
                    endif;
                    $imagen= wp_get_attachment_image_src( $foto,$tipo )[0];
                    $imagent= wp_get_attachment_image_src( $foto,'large' )[0];
                    /*echo "<pre>";
                    var_dump($imagen);
                    echo "</pre>";*/?>
                   
                      <li>
                        <a href="<?php echo $imagent; ?>" data-lightbox="mio">
                        <img src="<?php echo $imagen?>"></a>
                    </li>

           
               <?php $indice++; endforeach;
            ?>
        </ul>  
        <?php
        endwhile;
        ?>    
</div>
</main>
<?php get_footer();?>