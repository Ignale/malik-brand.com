<!DOCTYPE html>
<html lang="ru">
<?php
$lang = get_locale();
global $WOOCS;
switch ($lang) {
  case 'ru_RU':
    $WOOCS->current_currency = 'RUB';
    $WOOCS->storage->set_val('woocs_current_currency', 'RUB');
    break;
  case 'en_US':
    $WOOCS->current_currency = 'USD';
    $WOOCS->storage->set_val('woocs_current_currency', 'USD');
    break;

  default:
    $WOOCS->current_currency = 'USD';
    $WOOCS->storage->set_val('woocs_current_currency', 'USD');
    break;
}
?>

<head>
  <meta name="facebook-domain-verification" content="onigmgnk2vj10s41inuzp8klp86iol" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
  <meta charset="utf-8">

  <title>malik-brand</title>
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/favicon.ico " type="image/x-icon">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-CM8LX2HW2C"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-CM8LX2HW2C');
    console.log('Google connected')
  </script>

  <!-- Top.Mail.Ru counter -->
  <script type="text/javascript">
    var _tmr = window._tmr || (window._tmr = []);
    _tmr.push({
      id: "3305747",
      type: "pageView",
      start: (new Date()).getTime()
    });
    (function(d, w, id) {
      if (d.getElementById(id)) return;
      var ts = d.createElement("script");
      ts.type = "text/javascript";
      ts.async = true;
      ts.id = id;
      ts.src = "https://top-fwz1.mail.ru/js/code.js";
      var f = function() {
        var s = d.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(ts, s);
      };
      if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
      } else {
        f();
      }
    })(document, window, "tmr-code");
    console.log('mail.ru connected')
  </script>
  <noscript>
    <div><img src="https://top-fwz1.mail.ru/counter?id=3305747;js=na" style="position:absolute;left:-9999px;" alt="Top.Mail.Ru" /></div>
  </noscript>
  <!-- /Top.Mail.Ru counter -->

  <!-- Yandex.Metrika counter -->
  <script type="text/javascript">
    (function(m, e, t, r, i, k, a) {
      m[i] = m[i] || function() {
        (m[i].a = m[i].a || []).push(arguments)
      };
      m[i].l = 1 * new Date();
      k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
    })
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(85226839, "init", {
      clickmap: true,
      trackLinks: true,
      accurateTrackBounce: true,
      webvisor: true,
      ecommerce: "dataLayer"

    });
    console.log('Yandex connected')
  </script>

  <noscript>
    <div><img src="https://mc.yandex.ru/watch/85226839" style="position:absolute; left:-9999px;" alt="" /></div>
  </noscript>
  <!-- /Yandex.Metrika counter -->

  <script type="text/javascript">
    ! function() {
      var t = document.createElement("script");
      t.type = "text/javascript", t.async = !0, t.src = 'https://vk.com/js/api/openapi.js?169', t.onload = function() {
        VK.Retargeting.Init("VK-RTRG-1290246-5DOcL"), VK.Retargeting.Hit()
      }, document.head.appendChild(t)
    }();
  </script><noscript><img src="https://vk.com/rtrg?p=VK-RTRG-1290246-5DOcL" style="position:fixed; left:-999px;" alt="" /></noscript>
</head>


<body id='top' <?php body_class(); ?>>
  <header>
    <?php echo remove_shortcode('[woocs ]'); ?>
    <div class="opacity-banner">
      <div class="banner" style="background-image: url(<?php if (get_theme_mod('banner_img')) {
                                                          echo get_theme_mod('banner_img');
                                                        } ?>);">
        <div class="close">✕</div>
        <div class="stamp">
          <img src="<?php echo get_template_directory_uri() ?>/assets/img/stamp-black.png" alt="">
        </div>
        <div class="banner_text">
          <?php if (get_theme_mod('banner_title')) { ?>
            <h2>
              <?php echo get_theme_mod('banner_title') ?>
            </h2>
          <?php } ?>
          <p>Успейте купить платье</p>
          <p>С БЕСПЛАТНОЙ</p>
          <p>доставкой до 25 июня!</p>
        </div>

      </div>
    </div>
    <div class="login-opacity scr-sm">
      <div class="login-box">
        <div class="close-form">
          <div class="line-1"></div>
          <div class="line-2"></div>
        </div>
        <div class="login-snip">
          <input id="tab-1" type="radio" name="tab" class="sign-in" checked>
          <label for="tab-1" class="tab"><?php esc_html_e("Login", "malik_shop") ?></label>
          <input id="tab-2" type="radio" name="tab" class="sign-up">
          <label for="tab-2" class="tab"><?php esc_html_e('Register', 'woocommerce'); ?></label>
          <div class="login-space">
            <?php wc_get_template('parts/wc-form-login.php') ?>
            <?php wc_get_template('parts/wc-form-reg.php') ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mx-auto p-0">
          <div class="card">
          </div>
        </div>
      </div>
      <div class="nav-wrap">
        <nav id="nav-wrap-page">
          <div class="container">
            <div class="row align-items-center justify-content-between">
              <div class="col-md-2 col-4 logo-bg align-self-center">
                <a href="<?php echo get_home_url() ?>">
                  <img src="<?php echo get_template_directory_uri() ?>/assets/img/logo_white.png" alt=""></a>
              </div>
              <div class=" col-md-10 col-8">
                <div class="row">
                  <?php wp_nav_menu([
                    'theme_location'  => 'top',
                    'menu'            => '',
                    'container'       => 'div',
                    'container_class' => 'position-sm flex-fill align-self-center',
                    'menu_class'      => '',
                    'menu_id'         => 'nav_page',
                    'fallback_cb'     => '',
                    'items_wrap'      => '<ul id="%1$s" class= "row nav_menu__page">%3$s</ul>',
                  ]); ?>
                  <?php wp_nav_menu([
                    'theme_location'  => 'lang',
                    'menu'            => '',
                    'container'       => 'div',
                    'container_class' => 'col-md-1 lang-menu col-3 align-self-center',
                    'menu_class'      => '',
                    'menu_id'         => 'lang',
                    'fallback_cb'     => '',
                    'items_wrap'      => '<ul id="%1$s" class= "row nav_menu__page">%3$s</ul>',
                  ]); ?>
                  <div class="col-md-1 cart-menu col-3 align-self-center">
                    <div class="cart_label">
                      <?php
                      global $woocommerce; ?>
                      <a href="<?php echo $woocommerce->cart->get_cart_url() ?>" onclick="ym(85226839,'reachGoal','korzina1')" class="basket-btn basket-btn_fixed-xs">
                        <svg width="18" height="25" viewBox="0 0 18 19" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <path d="M 0 17L -0.548292 16.9567L -0.595159 17.55L 0 17.55L 0 17ZM 16 17L 16 17.55L 16.5952 17.55L 16.5483 16.9567L 16 17ZM 15.0408 4.85714L 15.5891 4.81383L 15.5491 4.30714L 15.0408 4.30714L 15.0408 4.85714ZM 0.959184 4.85714L 0.959184 4.30714L 0.450916 4.30714L 0.410892 4.81383L 0.959184 4.85714ZM 0 17.55L 16 17.55L 16 16.45L 0 16.45L 0 17.55ZM 16.5483 16.9567L 15.5891 4.81383L 14.4925 4.90045L 15.4517 17.0433L 16.5483 16.9567ZM 0.410892 4.81383L -0.548292 16.9567L 0.548292 17.0433L 1.50748 4.90045L 0.410892 4.81383ZM 4.57143 4.30714L 0.959184 4.30714L 0.959184 5.40714L 4.57143 5.40714L 4.57143 4.30714ZM 5.12143 4.85714C 5.12143 3.9614 5.31497 2.84478 5.78921 1.97343C 6.25236 1.12244 6.94923 0.55 8 0.55L 8 -0.55C 6.43853 -0.55 5.42111 0.348712 4.82304 1.44759C 4.23605 2.52609 4.02143 3.83805 4.02143 4.85714L 5.12143 4.85714ZM 15.0408 4.30714L 11.7551 4.30714L 11.7551 5.40714L 15.0408 5.40714L 15.0408 4.30714ZM 11.7551 4.30714L 4.57143 4.30714L 4.57143 5.40714L 11.7551 5.40714L 11.7551 4.30714ZM 8 0.55C 9.06391 0.55 9.84791 1.13761 10.3914 2.00301C 10.9425 2.88066 11.2051 3.9912 11.2051 4.85714L 12.3051 4.85714C 12.3051 3.80825 11.9962 2.49022 11.3229 1.41801C 10.6419 0.333547 9.54833 -0.55 8 -0.55L 8 0.55ZM 5.12143 7.84615L 5.12143 4.85714L 4.02143 4.85714L 4.02143 7.84615L 5.12143 7.84615ZM 12.3051 7.84615L 12.3051 4.85714L 11.2051 4.85714L 11.2051 7.84615L 12.3051 7.84615Z" transform="translate(1 1)" fill="#000"></path>
                        </svg>
                        <span class="basket-btn__counter"><?php echo sprintf($woocommerce->cart->cart_contents_count); ?></span>
                      </a>
                    </div>
                  </div>
                  <?php if (is_user_logged_in()) : ?>
                    <div class="hello col-md-2 col-3 login-menu align-self-center">
                      <div class="scr-sm">
                        <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')) ?>">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M10 9.408l2.963 2.592-2.963 2.592v-1.592h-8v-2h8v-1.592zm-2-4.408v4h-8v6h8v4l8-7-8-7zm6-3c-1.787 0-3.46.474-4.911 1.295l.228.2 1.396 1.221c1.004-.456 2.114-.716 3.287-.716 4.411 0 8 3.589 8 8s-3.589 8-8 8c-1.173 0-2.283-.26-3.288-.715l-1.396 1.221-.228.2c1.452.82 3.125 1.294 4.912 1.294 5.522 0 10-4.477 10-10s-4.478-10-10-10z" />
                          </svg>
                        </a>
                      </div>
                      <div class="scr-bg">
                        <?php
                        $current_user = wp_get_current_user();
                        printf(
                          __('Hello %s,', 'woocommerce'),
                          '<a class = "hello" href=" ' . get_permalink(get_option('woocommerce_myaccount_page_id')) . '"> ' . esc_html($current_user->display_name) . '</a>'
                        ); ?>
                      </div>

                    </div>
                  <?php else : ?>
                    <div class="col-md-1 col-3 login-menu align-self-center">
                      <div class="login-logo">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                          <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm0 22c-3.123 0-5.914-1.441-7.749-3.69.259-.588.783-.995 1.867-1.246 2.244-.518 4.459-.981 3.393-2.945-3.155-5.82-.899-9.119 2.489-9.119 3.322 0 5.634 3.177 2.489 9.119-1.035 1.952 1.1 2.416 3.393 2.945 1.082.25 1.61.655 1.871 1.241-1.836 2.253-4.628 3.695-7.753 3.695z" />
                        </svg>
                      </div>
                    </div>
                  <?php endif ?>
                </div>
              </div>
            </div>
          </div>
          <a class="mobile-btn" href="#nav-wrap-page" title="Show navigation">Show
            navigation</a>
          <a class="mobile-btn" href="#" title="Hide navigation">Hide
            navigation</a>
        </nav>
      </div>
    </div>
  </header>