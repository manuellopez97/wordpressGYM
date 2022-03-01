<?php
get_header('inicio');
?>
<main class="pagina contenedor">
        <div class="contenidop ">
        <?php
        
        yoo_listado_instructores(2)

        ?>
        <a href="http://localhost/instructores/"><button class="botoncito">Ver a nuestros instructores</button></a>    
<br><br>
        <?php
        yoo_listado_clases(2)
        ?>
        <a href="http://localhost/clases/"><button class="botoncito">Ver todas nuestras clases</button></a>
</div>
</main>
<?php
get_footer();
?>