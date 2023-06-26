<?php

/*
Template Name: How we works
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
              <a href="#oplata-i-dostavka">Оплата и доставка</a> <br>
            </div>
            <div class = "pnvl"> 
              <a href="#mezhdunaronaya-dostavka">Международная доставка</a> <br>
            </div>
            <div class = "pnvl"> 
              <a href="#vozvrat-tovara">Возврат товара</a>
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