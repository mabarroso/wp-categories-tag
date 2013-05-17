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
    public function append_content( $content ) {
        return $content . "<p>Hello WordPress Unit Tests</p>";
    }
}

$GLOBALS['CategoriesTag'] = new CategoriesTag();

endif;