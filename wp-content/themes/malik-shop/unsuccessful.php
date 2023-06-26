<?php
get_header('page'); ?>

<div id="primary" class="content-area">

  <main id="main" class="site-main">

    <?php
    while (have_posts()) : the_post(); ?>
    <div class="container">
      Оплата не была произведена
    </div>

    <?php endwhile; // End of the loop.
    ?>

  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer('page'); ?>