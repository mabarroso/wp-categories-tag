<?php
/*
Plugin Name: Categories Tag
Plugin URI: http://lab.mabarroso.com/categories-tag-wordpress-plugin
Description: Allow list categories into your posts or pages
Version: 1.0
Author: mabarroso
Author URI: http://www.mabarroso.com/
*/

if ( ! class_exists( 'CategoriesTag' ) ) :
class CategoriesTag {
  /**
   * Setup our filters
   *
   * @return void
   */
  public function __construct() {
      add_filter( 'the_content', array( $this, 'append_content' ) );
  }

  /**
   * Appends "Hello WordPress Unit Tests" to the content of every post
   *
   * @param string $content
   * @return string
   */
  public function append_content($content) {
    $show_count  = 0;
    $hide_empty  = 0;
    $category_id = 0;

		if (preg_match_all('#\[categories ([^\]]*)\]#im', $content, $tag_matches) ) {
			$i=0;
			foreach ($tag_matches[1] as $params) {
				$tag = str_replace(array('[', ']'), array("\\[", "\\]"), $tag_matches[0][$i++]);

				if (preg_match('#show_count="yes"#i', $params, $param_matches) ) {
					$show_count = 1;
				}
				if (preg_match('#hide_empty="yes"#i', $params, $param_matches) ) {
					$hide_empty = 1;
				}
				if (preg_match('#id="([^"]+)"#i', $params, $param_matches) ) {
					$category_id = $param_matches[1];
				}
				$args = array(
					'show_option_all'    => '',
					'orderby'            => 'name',
					'order'              => 'ASC',
					'style'              => 'list',
					'show_count'         => $show_count,
					'hide_empty'         => $hide_empty,
					'use_desc_for_title' => 1,
					'child_of'           => $category_id,
					'feed'               => '',
					'feed_type'          => '',
					'feed_image'         => '',
					'exclude'            => '',
					'exclude_tree'       => '',
					'include'            => '',
					'hierarchical'       => 1,
					'title_li'           => 0,
					'show_option_none'   => 0,
					'number'             => null,
					'echo'               => 1,
					'depth'              => 0,
					'current_category'   => 0,
					'pad_counts'         => 0,
					'taxonomy'           => 'category',
					'walker'             => null
				);
				ob_start();
				  wp_list_categories($args);
				  $tagContent = ob_get_contents();
        ob_end_clean();

				$content = preg_replace('#'.$tag.'#m', $tagContent, $content);
			}
		} else {
			$content .= '<hr/>not found';
		}
    return $content;
  }
}

$GLOBALS['CategoriesTag'] = new CategoriesTag();

endif;