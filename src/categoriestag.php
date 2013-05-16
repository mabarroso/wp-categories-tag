<?php if ( ! defined( 'ABSPATH' ) ) exit;

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