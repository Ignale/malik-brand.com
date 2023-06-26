<?php

/*
Template Name: About
*/
get_header('page');
define('UPLOADS', 'wp-content/uploads');
?>

<?php do_action('woocommerce_before_main_content'); ?> 
<div id="primary" class="content-area">

  <main id="main" class="site-main">
    <div class="container">
     <h1>
       <?php the_title() ?>
       
     </h1>
    
       <?php the_content() ?>
  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer('page'); ?>