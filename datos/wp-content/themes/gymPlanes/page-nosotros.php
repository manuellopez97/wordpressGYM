<?php 

get_header();?>
<main class="pagina contenedor">
        <div class="contenidop ">
        <?php
            while (have_posts()): the_post();    
        ?>
        <h1 class="titulopage"><?php the_title()?></h1>
        <!--  Comando para detectar si hay has_post_thumbnail() -->
        <!-- Tamaños thumbail, medium, large y full -->
        <p><?php the_content()?></p>
        <?php
        endwhile;
        yoo_listado_instructores();
        ?>    
</div>
</main>
<?php get_footer();?>