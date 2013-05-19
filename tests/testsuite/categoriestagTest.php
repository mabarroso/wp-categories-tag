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

  public function testRoot() {
    $response = $this->categoriesTag->append_content('[categories id="0"]');
    $this->assertContains('cat 1</a>',  $response);
    $this->assertContains('cat 1.1',    $response);
    $this->assertContains('cat 1.2',    $response);
    $this->assertContains('cat 1.3',    $response);
    $this->assertContains('cat 2</a>',  $response);
    $this->assertContains('cat 2.1',    $response);
    $this->assertContains('cat 2.2',    $response);
    $this->assertContains('cat 2.3',    $response);
    $this->assertContains('cat 3</a>',  $response);
    $this->assertContains('cat 3.1',    $response);
    $this->assertContains('cat 3.2',    $response);
    $this->assertContains('cat 3.3',    $response);
  }

  public function testChild() {
    $response = $this->categoriesTag->append_content('[categories id="2"]');
    $this->assertNotContains('cat 1</a>', $response);
    $this->assertNotContains('cat 1.1',   $response);
    $this->assertNotContains('cat 1.2',   $response);
    $this->assertNotContains('cat 1.3',   $response);
    $this->assertNotContains('cat 2</a>', $response);
    $this->assertContains('cat 2.1',      $response);
    $this->assertContains('cat 2.2',      $response);
    $this->assertContains('cat 2.3',      $response);
    $this->assertNotContains('cat 3</a>', $response);
    $this->assertNotContains('cat 3.1',   $response);
    $this->assertNotContains('cat 3.2',   $response);
    $this->assertNotContains('cat 3.3',   $response);
  }

  public function testShowCount() {
    $response = $this->categoriesTag->append_content('[categories id="2" show_count="yes"]');
    $this->assertContains('cat 2.1</a> (21)', $response);
    $this->assertContains('cat 2.2</a> (22)', $response);
    $this->assertContains('cat 2.3</a> (0)', $response);
  }

  public function testHideEmpty() {
    $response = $this->categoriesTag->append_content('[categories id="2" hide_empty="yes"]');
    $this->assertContains('cat 2.1', $response);
    $this->assertContains('cat 2.2', $response);
    $this->assertNotContains('cat 2.3', $response);
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
