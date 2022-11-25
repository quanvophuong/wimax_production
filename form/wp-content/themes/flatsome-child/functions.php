<?php
//CF7日本語バリデーション
/*
function wpcf7_validate_mb_char( $result, $tag ) {
	$field_name	= 'your-name';
	$value		= str_replace(array("\r", "\n", ' ', '　'), '', $_POST[$field_name]); //改行とスペースを取り除く

	if (!empty($value)) {
		if (!preg_match('/[ぁ-んァ-ヶー一-龠]/u', $value)) {
			$result['valid'] = false;
			$result['reason'] = array($field_name => '正しい値を入力してください。');
		}
	}
	return $result;
}
add_filter( 'wpcf7_validate', 'wpcf7_validate_mb_char', 10, 2 );
*/

/* カスタムCSS追加 */
add_action('admin_menu', 'custom_css_hooks');
add_action('save_post', 'save_custom_css');
add_action('wp_head','insert_custom_css');
function custom_css_hooks() {
  add_meta_box('custom_css', 'Custom CSS', 'custom_css_input', 'post', 'normal', 'high');
  add_meta_box('custom_css', 'Custom CSS', 'custom_css_input', 'page', 'normal', 'high');
  add_meta_box('custom_css', 'Custom CSS', 'custom_css_input', 'area', 'normal', 'high');
}
function custom_css_input() {
  global $post;
  echo '<input type="hidden" name="custom_css_noncename" id="custom_css_noncename" value="'.wp_create_nonce('custom-css').'" />';
  echo '<textarea name="custom_css" id="custom_css" rows="5" cols="30" style="width:100%;">'.get_post_meta($post->ID,'_custom_css',true).'</textarea>';
}
function save_custom_css($post_id) {
  if (!wp_verify_nonce($_POST['custom_css_noncename'], 'custom-css')) return $post_id;
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
  $custom_css = $_POST['custom_css'];
  update_post_meta($post_id, '_custom_css', $custom_css);
}
function insert_custom_css() {
  if (is_page() || is_singular()) {
    if (have_posts()) : while (have_posts()) : the_post();
      echo '<style type="text/css">'.get_post_meta(get_the_ID(), '_custom_css', true).'</style>';
    endwhile; endif;
    rewind_posts();
  }
}
require_once('meta-box-class/my-meta-box-class.php');