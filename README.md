#Categories Tag
  Wordpress plugin to allow list of categories into your posts or pages

#Description
  Use BBCode style tags to add a list of categories into your posts or pages

  Read more [http://lab.mabarroso.com/en/categories-tag-wordpress-plugin](http://lab.mabarroso.com/en/categories-tag-wordpress-plugin)

##How works
  Insert the BBCode style tag category
```
  [categories]
```

  The result will be similar to:
```html
  <li class="cat-item cat-item-1"><a href="http://localhost/?cat=1" title="View all posts filed under cat 1">cat 1</a>
    <ul class='children'>
      <li class="cat-item cat-item-11"><a href="http://localhost/?cat=11" title="View all posts filed under cat 1.1">cat 1.1</a></li>
      <li class="cat-item cat-item-12"><a href="http://localhost/?cat=12" title="View all posts filed under cat 1.2">cat 1.2</a></li>
      <li class="cat-item cat-item-13"><a href="http://localhost/?cat=13" title="View all posts filed under cat 1.3">cat 1.3</a></li>
    </ul>
  </li>
  <li class="cat-item cat-item-2"><a href="http://localhost/?cat=2" title="View all posts filed under cat 2">cat 2</a>
    <ul class='children'>
      <li class="cat-item cat-item-21"><a href="http://localhost/?cat=21" title="View all posts filed under cat 2.1">cat 2.1</a></li>
      <li class="cat-item cat-item-22"><a href="http://localhost/?cat=22" title="View all posts filed under cat 2.2">cat 2.2</a></li>
      <li class="cat-item cat-item-23"><a href="http://localhost/?cat=23" title="View all posts filed under cat 2.3">cat 2.3</a></li>
    </ul>
  </li>
  <li class="cat-item cat-item-3"><a href="http://localhost/?cat=3" title="View all posts filed under cat 3">cat 3</a>
    <ul class='children'>
      <li class="cat-item cat-item-31"><a href="http://localhost/?cat=31" title="View all posts filed under cat 3.1">cat 3.1</a></li>
      <li class="cat-item cat-item-32"><a href="http://localhost/?cat=32" title="View all posts filed under cat 3.2">cat 3.2</a></li>
      <li class="cat-item cat-item-33"><a href="http://localhost/?cat=33" title="View all posts filed under cat 3.3">cat 3.3</a></li>
    </ul>
  </li>
```

###Options

  *id* (number) Set the id of the parent category: ```[categories id="0"]``` for all categories, ```[categories id="2"]``` for categories with parent 2
  *show_count* (yes/no) Show the number of posts in each category: ```[categories id="2" show_count="yes"]```
  *hide_empty* (yes/no) Hide categories without posts

## Installation
1. Upload the plugin to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Paste the BBCode tag for categories

#Development
##Source code
  Fork code from [https://github.com/mabarroso/wp-categories-tag.git](https://github.com/mabarroso/wp-categories-tag.git)

  All push request will be welcomed

##Directory structure
  Versioned files
```
  -+ /
   + src/       Module source files
   + tests/     PHPUnit files
   + tools/     Automated module packager scripts
```

  Not versioned files. Autogenerated.
```
  -+ /
   + out/       The plugin package to deploy. Generated by tools/release.sh script.
   + wordpress/ Wordpress for test enviroment. Generated by tools/install-wordpress.sh script.
   + wp-cli/    Command line interface for WordPress for test enviroment. Generated by tools/install-wordpress.sh script.
```

##Recommended environment
###Testing server
#### Vagrant instalation
You can

1. Run unary test ```vagrant ssh -c "cd /vagrant; phpunit"```

2. Test in a Wordpress site [http://localhost/wordpress-site-sandbox/](http://localhost/wordpress-site-sandbox/)

3. Test in a Wordpress multisite [http://localhost/wordpress-multisite-sandbox/test1/](http://localhost/wordpress-multisite-sandbox/test1/) and [http://localhost/wordpress-multisite-sandbox/test2/](http://localhost/wordpress-multisite-sandbox/test2/)

The Wordpress admin user is named *test* with email test@test.test and password *testtest*

To install
  ```shell
    git clone https://github.com/mabarroso/wordpress-site-sandbox.git
    vagrant up
  ```

Vagrant guest port 80 must be forwaded to 8080. Any port under 1024 requires the program to be running as root. To point host port 80 to another port in

* Mac OS/X, use the ipfw utility

  ```shell
    sudo ipfw add 100 fwd 127.0.0.1,8080 tcp from any to any 80 in
  ```

* Windows, use the netsh command

  ```shell
    netsh interface portproxy add v4tov4 listenport=80 listenaddress=127.0.0.1 connectport=8080 connectaddress=127.0.0.1
  ```

* Linux, accomplish the redirection with iptables

  ```shell
    iptables -A INPUT -i eth0 -p tcp --dport 80 -j ACCEPT
    iptables -A INPUT -i eth0 -p tcp --dport 8080 -j ACCEPT
    iptables -A PREROUTING -t nat -i eth0 -p tcp --dport 80 -j REDIRECT --to-port 8080
  ```

#### Manual instalation
1. Create a test MyQSL database named *myapp_test* for user *root* and no password
  If you prefer other configuration, change the *tools/templates/wp-config.php* file.
  **Important: Be sure your database is only for tests, all data will be erased**

2. Install Wordpress

```shell
  ./tools/install-wordpress.sh
```
  This script install Wordpress, the command line interface for WordPress, configure it and install the plugin.

  A copy of wordpress-unit is already placed in tests/. If you need make configuration changes, follow the instructions here - [Unit Testing WordPress Plugins](http://stackoverflow.com/questions/9138215/unit-testing-wordpress-plugins)

###PHPUnit
  Run the following command in the repository root:

```shell
  phpunit
```

# License
  Released under the MIT license: [http://www.opensource.org/licenses/MIT](http://www.opensource.org/licenses/MIT)
