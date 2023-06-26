<?php

/**
 * Template name: Bootstrap 
 */
get_header('page'); ?>
<div class="container">


  <?php while (have_posts()) : the_post(); ?>

  <?php the_title(before: '<h1 class="main-title">', after: '</h1>') ?>
  <?php the_content(); ?>

  <?php endwhile; ?>
</div>
<?php get_footer('page'); ?>