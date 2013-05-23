#Categories Tag
  Wordpress plugin to allow list of categories into your posts or pages

#Description
  Use BBCode style tags to add a list of categories into your posts or pages

##How works
```
  [categories id="2"]
```

[categories id="0"]
[categories id="2"]
[categories id="2" show_count="yes"]
[categories id="2" hide_empty="yes"]

## Installation
1. Upload the plugin to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Paste the BBCode tag for categories

#Development
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
   + out/       The plugin package to deploy. Generated by tools/release script.
   + wordpress/ Wordpress for test enviroment. Generated by tools/install-wordpress.sh script.
   + wp-cli/    Command line interface for WordPress for test enviroment. Generated by tools/install-wordpress.sh script.
```

##Recommended environment
###Testing server
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