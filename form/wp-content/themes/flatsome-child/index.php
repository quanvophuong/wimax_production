<?php
/**
 * The blog template file.
 *
 * @package flatsome
 */
 $tax = $wp_query->get_queried_object();
 if($tax->slug == 'cloud-wifi') {
   get_template_part('cloudwifi');
   return;
 }
get_header();
?>

<div id="content" class="blog-wrapper blog-archive page-wrapper">
    <?php get_template_part( 'template-parts/posts/layout', get_theme_mod('blog_layout','right-sidebar') ); ?>
</div><!-- .page-wrapper .blog-wrapper -->

<?php get_footer(); ?>