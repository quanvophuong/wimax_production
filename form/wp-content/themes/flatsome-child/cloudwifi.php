<!DOCTYPE html>
<!--[if IE 9 ]> <html <?php language_attributes(); ?> class="ie9 <?php flatsome_html_classes(); ?>"> <![endif]-->
<!--[if IE 8 ]> <html <?php language_attributes(); ?> class="ie8 <?php flatsome_html_classes(); ?>"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> class="<?php flatsome_html_classes(); ?>"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php bloginfo('description'); ?>">
  <meta name="Keywords" content="<?php bloginfo('keywords'); ?>">
  <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' |'; } ?> <?php bloginfo('name'); ?></title>
  <meta property="og:locale" content="ja_JP">
  <meta property="og:title" content="<?php bloginfo('name')?>">
  <meta property="og:description" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:image" content="">
  <meta property="og:type" content="website">
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/cloudwifi/assets/css/normalize.css">
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/cloudwifi/assets/css/common.css">
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/cloudwifi/assets/css/page.css">
  <style media="screen">
    #main-menu {
      display: none!important;
    }
  </style>
</head>

<body class="p_blog p_ichiran">
  <div id="container" class="container">
    <header id="header" class="header header2">
      <?php get_template_part('templates/templates','header') ?>
    </header>
    <main>
      <?php $tax = $wp_query->get_queried_object(); ?>
      <div class="row">
        <div class="breadcrumb2">
          <ul>
            <li><a href="/">TOP</a></li>
            <li><?php echo $tax->name ?></li>
          </ul>
        </div>
        <div class="blog_main">
          <div class="blog_l">
            <div class="blog_list">
              <?php if ( have_posts() ) : ?>

              <?php
                // Create IDS
                $ids = array();
                while ( have_posts() ) : the_post();
                  array_push($ids, get_the_ID());
                ?>
                <a href="<?php the_permalink() ?>" class="post">
                  <div class="time"><?php the_time('d') ?><small><?php the_time('m月') ?></small></div>
                  <figure>
                    <?php the_post_thumbnail( 'medium' ); ?>
                  </figure>
                  <div class="txt">
                    <h3><?php the_title() ?></h3>
                    <p>
                      <?php
                      $excerpt      = get_the_excerpt();
                      $excerpt_more = apply_filters( 'excerpt_more', ' [...]' );
                      echo flatsome_string_limit_words( $excerpt, 15 ) . $excerpt_more;
                      ?>
                    </p>
                  </div>
                </a>
                <?php
                endwhile; // end of the loop.
                $ids = implode(',', $ids);
                // echo $ids;
              ?>

              <?php //echo do_shortcode('[blog_posts type="row" image_width="40" depth="' . flatsome_option('blog_posts_depth') . '" depth_hover="' . flatsome_option('blog_posts_depth_hover') . '" text_align="' . get_theme_mod( 'blog_posts_title_align', 'center' ) . '" style="vertical" columns="1" ids="' . $ids . '"]'); ?>

              <?php flatsome_posts_pagination(); ?>

              <?php else : ?>

                <?php get_template_part( 'template-parts/posts/content','none'); ?>

              <?php endif; ?>

            </div>
          </div>
          <div class="blog_r">
            <?php
              if(is_active_sidebar('sidebar-extra')){
                dynamic_sidebar('sidebar-extra');
              }
            ?>
          </div>
        </div>
      </div>
    </main>
    <!-- end main -->
    <footer id="footer" class="footer">
      <?php get_template_part('templates/templates','footer') ?>
    </footer>
  </div>
  <script src="<?php echo get_stylesheet_directory_uri() ?>/cloudwifi/assets/js/libs.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri() ?>/cloudwifi/assets/js/base.js"></script>
  <?php wp_footer();?>
</body>

</html>