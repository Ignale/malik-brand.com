<?php

/*
Template Name: How works
*/
get_header('page');
define('UPLOADS', 'wp-content/uploads');
?>

<?php do_action('woocommerce_before_main_content'); ?> 
<div id="primary" class="content-area">
    

  <main id="main" class="site-main">
    <div class = 'row'>
      <div class= 'pn_wrap col-lg-3'>
          <div class="page_navigation">
            <div class = "pnvl"> 
              <a href="#oplata-i-dostavka"><?php esc_html_e('Payment and delivery ', 'malik_shop') ?></a> <br>
            </div>
            <div class = "pnvl"> 
              <a href="#mezhdunaronaya-dostavka"><?php esc_html_e('Internetional delivery', 'malik_shop') ?></a> <br>
            </div>
            <div class = "pnvl"> 
              <a href="#vozvrat-tovara"><?php esc_html_e('Purchase returns', 'malik_shop') ?></a>
            </div>
          </div>
        </div>
        <div class= 'col-lg-9'>  
         <h1>
       <?php the_title() ?>
            </h1>
    
       <?php the_content() ?>
        </div>
        </div>
    
  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer('page'); ?>