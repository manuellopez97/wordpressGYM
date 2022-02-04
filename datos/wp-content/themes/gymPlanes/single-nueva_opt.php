<?php get_header();?>
<main class="pagina contenedor considebar">
        <div class="contenidop ">
        <?php
            while (have_posts()): the_post();    
        ?>
        <h1 class="titulopage"><?php the_title()?></h1>
        <!--  Comando para detectar si hay has_post_thumbnail() -->
        <!-- Tamaños thumbail, medium, large y full -->
        <?php the_post_thumbnail('bajo', array( 'class' => 'imagendestacada')) ?>
        <p><?php the_content()?></p>
        <?php
        endwhile;
        ?>    
</div>
<aside class="sidebar">
    <?php
    dynamic_sidebar('sidebar1');
    ?>
</aside>
</main>
<?php get_footer();?>