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
    <main>
      <div class="row help">
        <div class="breadcrumb2">
          <ul>
            <li><a href="<?php echo home_url() ?>/">TOP</a></li>
            <li>ヘルプ/サポート</li>
          </ul>
        </div>
        <h2 class="t_ttl2"><small>HELP／SUPPORT</small>ヘルプ／サポート</h2>
        <div class="help_find">
          <?php echo do_shortcode('[ultimate-faq-search show_on_load="Yes"]') ?>
        </div>
        <div class="help_box_form">
          <div class="help_box_ttl">解決できない疑問は下記からご質問ください</div>
          <?php echo do_shortcode('[submit-question]') ?>
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
  <script type="text/javascript">
    window.addEventListener('DOMContentLoaded',function(){
      Array.prototype.forEach.call(document.querySelectorAll('.ufaq-faq-div'),function(el){
        var a = el.querySelector('.ewd-ufaq-post-margin');
        a.addEventListener('click',function(e){
          e.preventDefault();
          if(a.classList.contains('active')) {
            a.classList.remove('active');
            a.querySelector('h4').classList.remove('active');
            a.parentNode.nextElementSibling.classList.remove('active');
          } else {
            a.classList.add('active');
            a.querySelector('h4').classList.add('active');
            a.parentNode.nextElementSibling.classList.add('active');
          }
        })
      })
    })
  </script>
  <?php wp_footer();?>
</body>

</html>