<!DOCTYPE html>
<html lang="ru">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
  <?php wp_head(); ?>

  <meta charset="utf-8">
  <title>malik-brand</title>
  <link rel="icon" href="<?php echo get_template_directory_uri()?>/favicon.ico" type="image/x-icon">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="facebook-domain-verification" content="onigmgnk2vj10s41inuzp8klp86iol" />
  <script type="text/javascript">
  ! function() {
    var t = document.createElement("script");
    t.type = "text/javascript", t.async = !0, t.src = 'https://vk.com/js/api/openapi.js?169', t.onload = function() {
      VK.Retargeting.Init("VK-RTRG-1290246-5DOcL"), VK.Retargeting.Hit()
    }, document.head.appendChild(t)
  }();
  </script><noscript><img src="https://vk.com/rtrg?p=VK-RTRG-1290246-5DOcL" style="position:fixed; left:-999px;"
      alt="" /></noscript>
      
</head>

<body <?php body_class(); ?>>
  <header>
    <div class="element-with-video-bg jquery-background-video-wrapper">
      <nav id="nav-wrap">
        <div class="container">
          <div class="row">
            <div class="col-md-3 col-6 logo-bg">
              <a href="<?php echo get_home_url() ?>">
                <img src="<?php echo get_template_directory_uri() ?>/assets/img/logo_black.png" alt=""></a>
            </div>
            <?php wp_nav_menu([
              'theme_location'  => 'top',
              'menu'            => '',
              'container'       => 'div',
              'container_class' => 'col-md-9 align-self-center',
              'menu_class'      => '',
              'menu_id'         => 'nav',
              'fallback_cb'     => '',
              'items_wrap'      => '<ul id="%1$s" class= "row nav_menu">%3$s</ul>',
            ]); ?>
          </div>
        </div>
        <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show
          navigation</a>
        <a class="mobile-btn" href="#" title="Hide navigation">Hide
          navigation</a>
      </nav> <!-- end #nav-wrap -->

      <div class="container sl_section h-75">
        <div class="row bd-highlight mb-3 d-flex align-items-center h-100 flex-column ">
          <div class="p-2 mt-auto bd-highlight slogan">
            <?php esc_html_e('creating style, not clothing', 'malik_shop') ?>
          </div>
          <a href="<?php echo get_permalink(wc_get_page_id('shop')); ?>" class=" mt-auto p-3 bd-highlight to_shop">
            <?php esc_html_e('start shopping', 'malik_shop') ?> </a>
        </div>
      </div>

      <div class="">
        <video class="preview-video jquery-background-video" loop autoplay muted playsinline>
          <source src="<?php echo get_template_directory_uri() . '/assets/img/preview.mp4' ?>" type="video/mp4">
          <source src="<?php echo get_template_directory_uri() . '/assets/img/preview.ogv' ?>" type="video/ogv">
          <source src="<?php echo get_template_directory_uri() . '/assets/img/preview.webm' ?>" type="video/webm">
        </video>
        <div class="opacity"></div>
      </div>



    </div>


  </header>