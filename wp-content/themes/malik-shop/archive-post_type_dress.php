<?php
// Template name: Primerochnaya
// 

get_header('page') ?>

<?php
do_action('woocommerce_before_main_content'); ?>
<section class="s-bricks with-top-sep">
  <div class="masonry">
    <!-- brick-wrapper -->
    <div class="bricks-wrapper h-group">
      <div class="grid-sizer">
      </div>
      <?php
      $query = new WP_Query ([
                'post_type'=>'post_type_dress',
                'posts_per_page' =>-1
            ]);
      if ($query->have_posts()) : 
        while ($query->have_posts()) :
          $query->the_post(); ?>
      <article class="brick entry format-standard animate-this">

        <div class="entry__thumb">
          <a href="<?php the_permalink() ?>" title='<?php the_title_attribute(); ?>' class="thumb-link">
            <?php the_post_thumbnail('large') ?>
          </a>
        </div> <!-- end entry__thumb -->

        <div class="entry__text">
          <div class="entry__header">

            <div class="entry__meta">
              <span class="entry__cat-links">
                <a href="<?php the_permalink() ?>"> <?php __('Watch', 'malik_shop') ?> </a>
              </span>
            </div>

            <h1 class="entry__title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h1>

          </div>
          <div class="entry__excerpt">
            <?php the_excerpt() ?>
          </div>
        </div> <!-- end entry__text -->

      </article> <!-- end entry -->
      <?php endwhile ?>
      
      <?php endif ?>
    </div> <!-- end brick-wrapper -->

  </div> <!-- end masonry -->

</section> <!-- end s-bricks -->

<?php get_footer('page') ?>