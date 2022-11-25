<?php
  if(get_post_meta($post->ID,'isCloudwifi',true) == 2):
 ?>
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
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/cloudwifi/assets/css/flatsome.css">
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/cloudwifi/assets/css/page.css">
  <?php wp_head() ?>
</head>

<body class="p_blog single-post">

  <div id="container" class="container">
    <header id="header" class="header header2">
      <?php get_template_part('templates/templates','header') ?>
    </header>
    <!-- end header -->
    <main>
      <div class="row">
        <div class="breadcrumb2">
          <ul>
            <li><a href="/">TOP</a></li>
            <li><?php the_title() ?></li>
          </ul>
        </div>
        <div class="blog_main">
          <div class="blog_l">
            <div class="blog_l_head">
              <?php $category_detail=get_the_category($post->ID); ?>
              <ul class="list_cat">
                <?php
                  foreach($category_detail as $cd):
                ?>
                <li><a href="<?php echo get_category_link($cd->term_id) ?>"><?php echo $cd->cat_name; ?></a></li>
              <?php endforeach; ?>
              </ul>
              <h1 class="ttl2"><?php the_title() ?></h1>
              <ul class="pub_up">
                <li class="pub"><i class="fas fa-clock"></i><?php the_time('Y.m.d');  ?></li>
                <li class="up"><i class="fas fa-sync-alt"></i><?php the_modified_time('Y.m.d');  ?></li>
              </ul>
            </div>
            <div class="blog_l_main">
              <div class="entry-content single-page">
                <?php the_content() ?>
              </div>
              <div class="list_img">
                <h3>最近の投稿</h3>
                <ul>
                  <?php
                    $lastest = apply_filters('get_3_lastes','');
                    while($lastest->have_posts()):$lastest->the_post()
                  ?>
                  <li>
                    <a href="<?php the_permalink() ?>">
                      <figure>
                        <?php the_post_thumbnail( 'medium' ); ?>
                      </figure>
                      <h4><?php the_title() ?></h4>
                    </a>
                  </li>
                <?php endwhile;wp_reset_query(); ?>
                </ul>
              </div>
              <div class="list_img">
                <h3>関連記事</h3>
                <ul>
                  <?php
                    $same = apply_filters('same_cw','');
                    while($same->have_posts()):$same->the_post()
                  ?>
                  <li>
                    <a href="<?php the_permalink() ?>">
                      <figure>
                        <?php the_post_thumbnail( 'medium' ); ?>
                      </figure>
                      <h4><?php the_title() ?></h4>
                    </a>
                  </li>
                <?php endwhile;wp_reset_query(); ?>
                </ul>
              </div>
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
  <script>
	$(function () {
	  var hd_size = $('.header').innerHeight();
	  var pos = 0;
	  $(window).on('scroll', function () {
	    var current_pos = $(this).scrollTop();
	    if (current_pos < pos || current_pos == 0) {
	      $('.header').css({ 'top': 0 });
	    } else {
	      $('.header').css({ 'top': '-' + hd_size + 'px' });
	    }
	    pos = current_pos;
	  });
	});
	$(function () {
	  var hd_size = $('.conver').innerHeight();
	  var pos = 0;
	  $(window).on('scroll', function () {
	    var current_pos = $(this).scrollTop();
	    if (current_pos < pos || current_pos == 0) {
	      $('.conver').css({ 'bottom': 0 });
	    } else {
	      $('.conver').css({ 'bottom': '-' + hd_size + 'px' });
	    }
	    pos = current_pos;
	  });
	});
</script>
  <?php wp_footer();?>
</body>

</html>
<?php else: ?>
  <?php
  /**
   * The blog template file.
   *
   * @package flatsome
   */
  get_header();


  ?>

  <div id="content" class="blog-wrapper blog-single page-wrapper">
    <?php get_template_part( 'template-parts/posts/layout', get_theme_mod('blog_post_layout','right-sidebar') ); ?>
  </div><!-- #content .page-wrapper -->

  <?php get_footer(); ?>
<?php endif; ?>