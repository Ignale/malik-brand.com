<?php

/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.1.0
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
echo do_shortcode('[lwa template="default" remember="0"]');
?>
<!--<form class="login" id="login" method="post">-->
<!--  <p class="status_login">-->
<!--  </p>-->
<!--  <div class="form-field">-->
<!--    <label for="user_login" class="label"><?php esc_html_e('Username or email address', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>-->
<!--    <input type="text" class=" h-full-width c-h" name="user_login" id="user_login" autocomplete="user_login" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" />-->
<!--  </div>-->
<!--  <div class="form-field"><label for="user_pass"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>-->
<!--    <input class=" h-full-width c-h" type="password" name="user_pass" id="user_pass" autocomplete="current-password" />-->
<!--  </div>-->
<!--  <div class="group">-->
<!--    <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">-->
<!--      <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e('Remember me', 'woocommerce'); ?></span>-->
<!--    </label>-->
<!--  </div>-->
<!--  <div class="group">-->
<!--    <?php wp_nonce_field('ajax-login-nonce', 'security'); ?>-->
<!--    <button type="submit" id="main-login" class="btn btn--primary h-full-width" name="login" value="<?php esc_attr_e('Log in', 'woocommerce'); ?>"><?php esc_html_e('Log in', 'woocommerce'); ?></button>-->
<!--  </div>-->
<!--  <div class="foot">-->
<!--    <a href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Lost your password?', 'woocommerce'); ?></a>-->
<!--  </div>-->
<!--</form>-->