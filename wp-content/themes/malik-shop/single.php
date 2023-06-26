<?php

get_header('page');
$slides_overview_post = rwmb_meta('slider_items');
?>

<section class="s-content s-content--single">
  <div class="container">
    <div class="row">
      <div class="column large-12">
        <article class="s-post entry format-gallery">
          <?php
          while (have_posts()) :
            the_post();
          ?>
          <?php if (is_single()) : ?>
          <?php if (rwmb_meta('on_of_gallery')) : ?>
          <div class="owl-carousel owl-theme">
            <?php foreach ($slides_overview_post as $slide) :
                  ?>
            <div>
              <?php if (strpos($slide['url'], '.mp4')) : ?>
              <video style='display: block; width: 100%' src='<?php echo $slide['url'] ?>' loop autoplay muted
                playsinline></video>
              <?php else : ?>
              <img src="<?php echo $slide['url']; ?>" alt="">
              <?php endif ?>

            </div>
            <?php endforeach; ?>
          </div>
          <?php endif; ?>
          <?php endif; ?>

          <?php endwhile; // End of the loop.
          ?>
      </div>

      <div class="s-content__primary">

        <h2 class="s-content__title s-content__title--post"><?php the_title() ?></h2>

        <ul class="s-content__post-meta">
          <li class="date"><?php the_date('j F Y') ?></li>
          <?php if (has_tag()) : ?>
          <?php the_tags('<li class="cat">', '</li><li>', '</li>') ?>
          <?php endif ?>

        </ul>

        <p class="lead">
          <?php the_content() ?>
        </p>
        <?php if (rwmb_meta('on_of_add_text')) : ?>
        <p>
          <?php rwmb_meta('additional_text_field') ?>
        </p>
        <?php endif ?>
        <div class="s-content__pagenav group">
          <h2><?php esc_html_e('See also', 'malik_shop') ?></h2>
          <?php
          // След./Пред. Пост.
          $post_nav = get_the_post_navigation(array(
            'next_text'           => '<span >' . __('Next post', 'malik_shop') . '</span>%title',
            'prev_text'           => '<span >' . __('Previous post', 'malik_shop') . '</span>%title',
          ));
          echo $post_nav;
          ?>
        </div>
      </div> <!-- end s-content__primary -->
      </article>

    </div> <!-- end column -->
  </div> <!-- end row -->


  <!-- comments
        ================================================== -->
  <div class="comments-wrap">

    <div id="comments" class="row">
      <div class="column">
        <ol class="commentlist">
          <?php comments_template(); ?>
          <!-- end comment level 1 -->
        </ol>
        <!-- END commentlist -->
      </div> <!-- end col-full -->
    </div> <!-- end comments -->
    <!-- 
	-------------------------------------------------------------'
	Comment form
	------------------------------------------------------------
 -->
    <div class="row comment-respond">

      <!-- START respond -->
      <div id="respond" class="column">

        <?php
        $commenter = wp_get_current_commenter();
        $defaults = [
          'fields'               => [
            'author' => '<div class="form-field">
            <label for="author">' . __('Name') . ($req ? ' <span class="required">*</span>' : '') . '</label>
              <input name="author" id="author"  class="h-full-width" placeholder="' . __('Name', 'malik_shop') . '" value="' . esc_attr($commenter['comment_author']) . '" type="text"' . $aria_req . $html_req . '>
            </div>',
            'email'  => '<div class="form-field">
            <label for="email">' . __('Email') . ($req ? ' <span class="required">*</span>' : '') . '</label>
              <input name="email" id="email" ' . esc_attr($commenter['comment_author_email']) . ' class="h-full-width" placeholder="' . __('E-mail', 'malik_shop') . '" value="' . esc_attr($commenter['comment_author']) . '" type="text">
            </div>',
            'url'    => '<div class="form-field">
            <label for="url">' . __('Website') . '</label>
              <input name="url" id="url" ' . esc_attr($commenter['comment_author_url']) . ' class="h-full-width" placeholder="' . __('Web site', 'malik_shop') . '" value="" type="text">
            </div>',
            'cookies' => '<p class="comment-form-cookies-consent">' .
              sprintf('<input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"%s />', $consent) . '
			 <label for="wp-comment-cookies-consent">' . __('Save my name, email, and website in this browser for the next time I comment.') . '</label>
		</p>',
          ],
          'comment_field'        => '<div class="message form-field">
          <label for="comment">' . _x('Comment', 'noun') . '</label>
              <textarea name="comment" id="cMessage" class="h-full-width" placeholder="' . __("Your message", 'malik_shop') . '"></textarea>
            </div>',
          'must_log_in'          => '<p class="must-log-in">' .
            sprintf(__('You must be <a href="%s">logged in</a> to post a comment.'), wp_login_url(apply_filters('the_permalink', get_permalink($post_id)))) . '
	 </p>',
          'logged_in_as'         => '<p class="logged-in-as ">' .
            sprintf(__('<a class= "btn btn--primary " href="%1$s" aria-label="Logged in as %2$s. Edit your profile.">Logged in as %2$s</a>. <a class="btn" href="%3$s">Logout?</a>'), get_edit_user_link(), $user_identity, wp_logout_url(apply_filters('the_permalink', get_permalink($post_id)))) . '
	 </p>',
          'comment_notes_before' => '',
          'comment_notes_after'  => '',
          'id_form'              => 'commentform',
          'id_submit'            => 'submit',
          'class_form'           => 'comment-form',
          'class_submit'         => 'submit',
          'name_submit'          => 'submit',
          'title_reply'          => __('Leave a Reply'),
          'title_reply_to'       => __('Leave a Reply to %s'),
          'title_reply_before'   => '<h3 >',
          'title_reply_after'    => '<span>' . __('Your email address will not be published', 'malik_shop') . ' </span></h3>',
          'cancel_reply_before'  => ' <small>',
          'cancel_reply_after'   => '</small>',
          'cancel_reply_link'    => __('Cancel reply'),
          'label_submit'         => __('Post Comment'),
          'submit_button'        => '<input name="%1$s" class="btn btn--primary btn-wide btn--large h-full-width" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
          'submit_field'         => '<p class="form-submit">%1$s %2$s</p>',
          'format'               => 'xhtml',
        ];

        comment_form($defaults); ?>
      </div>
    </div>
    <?php
    get_footer('page'); ?>