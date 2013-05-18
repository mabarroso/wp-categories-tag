<?php
include_once __DIR__."/../../src/categoriestag.php";

class CategoriesTagTest extends WP_UnitTestCase {
  public $plugin_slug = 'categories_tag';

  public function setUp() {
    parent::setUp();
    global $wpdb;
    $taxonomyFixtures = file_get_contents(__DIR__.'/../fixtures/taxonomy.sql');
    $sql = explode("\n", preg_replace('#/\*PREFIX\*/wp_#', $wpdb->prefix, $taxonomyFixtures));
    foreach ($sql as $sqlLine) {
      $sqlLine && $wpdb->query($sqlLine);
    }

    $this->categoriesTag = $GLOBALS['CategoriesTag'];
  }

  public function testAppendContent() {
    $this->assertEquals('[categories id="2"]', $this->categoriesTag->append_content('[categories id="2"]'), '->append_content() appends text' );
  }

  /**
   * A contrived example using some WordPress functionality
   */
  public function testPostTitle() {
    // This will simulate running WordPress' main query.
    // See wordpress-tests/lib/testcase.php
    $this->go_to('http://example.org/?p=1');

    // Now that the main query has run, we can do tests that are more functional in nature
    /* @var $wp_query WP_Query */
    global $wp_query;
    $post = $wp_query->get_queried_object();
    $this->assertEquals('Hello world!', $post->post_title );
  }
}