  <!-- footer
    ================================================== -->
  <footer class="s-footer">

    <div class="s-footer__main">

      <div class="row">


        <div class="col-lg-2 col-md-3 col-7 align-self-top s-footer__site-links">
          <h5><?php esc_html_e('Menu', 'malik_shop') ?></h5>
          <?php wp_nav_menu([
            'theme_location'  => 'bottom',
            'menu'            => '',
            'container'       => false,
            'container_class' => '',
            'menu_class'      => '',
            'menu_id'         => '',
            'fallback_cb'     => '',
            'items_wrap'      => '<ul>%3$s</ul>',
          ]); ?>

        </div> <!-- end s-footer__site-links -->
        <?php wp_nav_menu([
                    'theme_location'  => 'lang',
                    'menu'            => '',
                    'container'       => 'div',
                    'container_class' => 'col-md-1 lang-menu lang-menu__footer col-lg-1 col-3 align-self-top',
                    'menu_class'      => '',
                    'menu_id'         => 'lang',
                    'fallback_cb'     => '',
                    'items_wrap'      => '<ul id="%1$s" class= "row lan nav_menu__page">%3$s</ul>',
                  ]); ?>

        <div class="col-lg-3 col-md-4 flex-column   s-footer__social-links">
          <h5><?php esc_html_e("We're on the social media", 'malik_shop') ?></h5>
          <div class="d-flex align-self-top flex-row justify-content-around">
            <!--<div>-->
            <!--  <a href="#0">-->
            <!--    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">-->
            <!--      <path-->
            <!--        d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />-->
            <!--    </svg>-->
            <!--  </a>-->
            <!--</div>-->
            <!--<div>-->
            <!--  <a href='https://www.instagram.com/malik___brand/'>-->
            <!--    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">-->
            <!--      <path-->
            <!--        d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />-->
            <!--    </svg>-->
            <!--  </a>-->
            <!--</div>-->
            <div>
              <a onclick = "ym(85226839,'reachGoal','contactVK')" href="https://vk.com/malik___brand">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                  <path class="st0"
                    d="M13.162 18.994c.609 0 .858-.406.851-.915-.031-1.917.714-2.949 2.059-1.604 1.488 1.488 1.796 2.519 3.603 2.519h3.2c.808 0 1.126-.26 1.126-.668 0-.863-1.421-2.386-2.625-3.504-1.686-1.565-1.765-1.602-.313-3.486 1.801-2.339 4.157-5.336 2.073-5.336h-3.981c-.772 0-.828.435-1.103 1.083-.995 2.347-2.886 5.387-3.604 4.922-.751-.485-.407-2.406-.35-5.261.015-.754.011-1.271-1.141-1.539-.629-.145-1.241-.205-1.809-.205-2.273 0-3.841.953-2.95 1.119 1.571.293 1.42 3.692 1.054 5.16-.638 2.556-3.036-2.024-4.035-4.305-.241-.548-.315-.974-1.175-.974h-3.255c-.492 0-.787.16-.787.516 0 .602 2.96 6.72 5.786 9.77 2.756 2.975 5.48 2.708 7.376 2.708z" />
                </svg>
              </a>

            </div>
          </div>

        </div> <!-- end s-footer__social links -->

        <div class="col-lg-6 col-md-4  s-footer__subscribe">

          <h5><?php esc_html_e('Subscribe', 'malik_shop') ?></h5>

          <p><?php esc_html_e('Stay on top of the changes.', 'malik_shop') ?><a class='vk-link' href='https://vk.com/app5898182_-204107197#s=1981623/?utm_source=website' target="_blank"><?php esc_html_e(' Subscribe to our newsletter', 'malik_shop')?></a></p>

          <div class="subscribe-form">
          

            <!--<form id="mc-form" class="group" novalidate="true">-->

            <!--  <input type="email" value="" name="dEmail" class="email" id="mc-email"-->
            <!--    placeholder="<?php esc_html_e('Write and press enter', 'malik_shop') ?>" required="">-->

            <!--  <input type="submit" name="subscribe">-->

            <!--  <label for="mc-email" class="subscribe-message"></label>-->

            <!--</form>-->

          </div>

        </div> <!-- end s-footer__subscribe -->

      </div> <!-- end row -->

    </div> <!-- end s-footer__main -->

    <div class="s-footer__bottom">
      <div class="row">
        <div class="column">
          <div class="ss-copyright">
            <span>MALIK-BRAND 2020-2023</a></span>
          </div> <!-- end ss-copyright -->
        </div>
      </div>

      <div class="ss-go-top">
        <a class="smoothscroll" title="Back to Top" href="#top">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M6 4h12v2H6zm5 10v6h2v-6h5l-6-6-6 6z" />
          </svg>
        </a>
      </div> <!-- end ss-go-top -->
    </div> <!-- end s-footer__bottom -->

  </footer>

  </footer> <!-- Footer End-->
  <?php wp_footer(); ?>
  </body>

  </html>