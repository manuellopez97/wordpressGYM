<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    wp_head();

    ?>
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
    </div>
</header>