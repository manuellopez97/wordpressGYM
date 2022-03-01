<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    wp_head();
    $imagen_id= get_field('imagen_portada');
    $imagen= wp_get_attachment_image_src($imagen_id, "full")[0];

    ?>
<style>
    .site-header{
    background-image:linear-gradient(rgba(0,0,0,.2)),rgba(0,0,0,.7),url('<?php echo $imagen; ?>');
    height: auto;
    background-size:cover;
    background-position: center center;
    min-height: 40rem;
    }

    .site-header .slicknav_menu{
        background-color: transparent;
    }
    .centrado{
        color:white;
        text-align: center;
        padding-top: 5rem;
    }
</style>

</head>
<body>
<header class="site-header">
    <div class="contenedor">
        <div class="navegacion">
            <div class="logo">
                <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="">
            </div>
              <?php
              $opts= array(
                  'theme_location' => 'menu-principal',
                  'container'=> 'nav',
                  'container_class'=> 'menucss'
              );
              wp_nav_menu($opts);
              ?>
        </div>
    <div class="centrado">
        <h1> <?php the_field('titulo_portada')?></h1>
        <p><?php the_field('contenido_portada') ?></p>
    </div>
</div>
</header>