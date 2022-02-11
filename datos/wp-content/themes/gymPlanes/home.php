<?php
 get_header();
?>
   <main class="contenedor nosidebar">
      <ul class="listado-blog">
        <?php
        while (have_posts()): the_post();
        ?>  
          <li class="card degradar">
              <?php the_post_thumbnail('normal');?>
              <div class="contenido">
                  <a href="<?php the_permalink();?>">
                  <h3>
                      <?php the_title(); ?>
                  </h3></a>
                  <p class="meta">
                      Por: <a href="<?php get_author_posts_url(get_the_author_meta('ID')); ?>">
                      <?php echo get_the_author_meta('display_name');?>
                    </a>
                    <?php the_time(get_option('date_format'));?>
                  </p>
              </div>
          </li>
          <?php endwhile;?>
      </ul>
   </main>
<?php
 get_footer();
?>
