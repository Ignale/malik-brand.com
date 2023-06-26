<form method="post" id="registration" class="woocommerce-form woocommerce-form-register sign-up-form register" <?php do_action('woocommerce_register_form_tag'); ?>>
  <?php do_action('woocommerce_register_form_start'); ?>
  <div class="form-field">

    <div class="status-reg">

    </div>

    <label for="reg_username">

      <?php esc_html_e('Username', 'woocommerce'); ?>&nbsp;<span class="required">*</span>

    </label>

    <input type="text" class="h-full-width c-h" name="username" id="reg_username" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" />
  </div>
  <div class="form-field">

    <label for="reg_email"><?php esc_html_e('Email address', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>

    <input type="email" class="h-full-width c-h" name="email" id="reg_email" autocomplete="email" value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>" />
  </div>

  <div class="form-field">

    <label for="s"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>

    <input type="password" class="h-full-width" name="password" id="reg_password" autocomplete="new-password" />

  </div>

  <!-- <?php do_action('woocommerce_register_form'); ?> -->

  <div class="group"> <?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>

    <button type="submit" class="btn btn--primary h-full-width" name="register" value="<?php esc_attr_e('Register', 'woocommerce'); ?>"><?php esc_html_e('Register', 'woocommerce'); ?></button>
  </div>
  <!-- <?php do_action('woocommerce_register_form_end'); ?> -->
  </div>
</form>