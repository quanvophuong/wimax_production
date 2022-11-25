<?php
/**
 * The template for displaying all pages.
 *
 * @package flatsome
 */
 if(get_post_meta($post->ID,'isCloudwifi',true) == 2 && ($post->post_name == 'help')) {
   get_template_part('help');
   return;
 }

if(flatsome_option('pages_template') != 'default') {

  // Get default template from theme options.
  get_template_part('page', flatsome_option('pages_template'));
  return;

} else {
  if(get_post_meta($post->ID,'isCloudwifi',true) == 2) : ?>
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
    <?php wp_head(); ?>
  </head>
  <body class="p_blog p_ichiran p_help">
    <div id="container" class="container">
      <header id="header" class="header header2">
        <?php get_template_part('templates/templates','header') ?>
      </header>
  <?php else: ?>
    <?php get_header(); ?>
  <?php endif; do_action( 'flatsome_before_page' );  ?>
<div id="content" class="content-area page-wrapper" role="main hola">
  <div class="row row-main">
    <div class="large-12 col">
      <div class="col-inner">

        <?php if(get_theme_mod('default_title', 0)){ ?>
        <header class="entry-header">
          <h1 class="entry-title mb uppercase"><?php the_title(); ?></h1>
        </header><!-- .entry-header -->
        <?php } ?>

        <?php while ( have_posts() ) : the_post(); ?>
          <?php do_action( 'flatsome_before_page_content' ); ?>

            <?php the_content(); ?>

            <?php if ( comments_open() || '0' != get_comments_number() ){
              comments_template(); } ?>

          <?php do_action( 'flatsome_after_page_content' ); ?>
        <?php endwhile; // end of the loop. ?>
      </div><!-- .col-inner -->
    </div><!-- .large-12 -->
  </div><!-- .row -->
</div>

<?php
do_action( 'flatsome_after_page' );
if(get_post_meta($post->ID,'isCloudwifi',true) == 2) : ?>
<footer id="footer" class="footer">
  <?php get_template_part('templates/templates','footer') ?>
</footer>
</div>
<script src="<?php echo get_stylesheet_directory_uri() ?>/cloudwifi/assets/js/libs.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/cloudwifi/assets/js/base.js"></script>
<?php wp_footer();?>
<?php else: ?>
  <?php get_footer(); ?>
<?php endif; } ?>