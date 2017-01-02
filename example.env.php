<?php
/**
 * Craft-Multi-Environment (CMS)
 * @author    nystudio107
 * @copyright Copyright (c) 2017 nystudio107
 * @link      https://nystudio107.com/
 * @package   craft-multi-environment
 * @since     1.0.4
 * @license   MIT
 *
 * This file should be renamed to '.env.php' and it should reside in your root
 * project directory.  Add '/.env.php' to your .gitignore.  See below for production
 * usage notes.
 */

// The $craftenv_vars are all auto-prefixed with CRAFTENV_ -- you can add whatever you want here
// and access them via getenv() using the prefixed name
$craftenv_vars = array(
	// The Craft environment we're running in ('local', 'staging', 'live', etc.).
	'CRAFT_ENVIRONMENT' => 'local',

	// The database server name or IP address. Usually this is 'localhost' or '127.0.0.1'.
	'DB_HOST' => 'localhost',

	// The name of the database to select.
	'DB_NAME' => 'craft',

	// The database username to connect with.
	'DB_USER' => 'root',

	// The database password to connect with.
	'DB_PASS' => 'dev',

	// The site url to use; it can be hard-coded as well
	'SITE_URL' => (isset($_SERVER['HTTPS']) ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . '/',

	// The base url environmentVariable to use for Assets; it can be hard-coded as well
	'BASE_URL' => (isset($_SERVER['HTTPS']) ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . '/',

	// The base path environmentVariable for Assets; it can be hard-coded as well
	'BASE_PATH=' . realpath(dirname(__FILE__)) . '/public/',
);

// Set all of the .env values, auto-prefixed with `CRAFTENV_`
foreach ($craftenv_vars as $key => $value) {
    putenv("CRAFTENV_$key=$value");
}

/**
 * For production environments, this .env.php file can be used, or preferrably,
 * (for security & speed), set the $_ENV variables directly from the server config.
 *
 * Apache - inside the <VirtualHost> block:

SetEnv CRAFTENV_CRAFT_ENVIRONMENT "REPLACE_ME"
SetEnv CRAFTENV_DB_HOST "REPLACE_ME"
SetEnv CRAFTENV_DB_NAME "REPLACE_ME"
SetEnv CRAFTENV_DB_USER "REPLACE_ME"
SetEnv CRAFTENV_DB_PASS "REPLACE_ME"
SetEnv CRAFTENV_SITE_URL "REPLACE_ME"
SetEnv CRAFTENV_BASE_URL "REPLACE_ME"
SetEnv CRAFTENV_BASE_PATH "REPLACE_ME"

 * Nginx - inside the server {} or location ~ \.php$ {} block:

fastcgi_param CRAFTENV_CRAFT_ENVIRONMENT "REPLACE_ME";
fastcgi_param CRAFTENV_DB_HOST "REPLACE_ME";
fastcgi_param CRAFTENV_DB_NAME "REPLACE_ME";
fastcgi_param CRAFTENV_DB_USER "REPLACE_ME";
fastcgi_param CRAFTENV_DB_PASS "REPLACE_ME";
fastcgi_param CRAFTENV_SITE_URL "REPLACE_ME";
fastcgi_param CRAFTENV_BASE_URL "REPLACE_ME";
fastcgi_param CRAFTENV_BASE_PATH "REPLACE_ME";

 */
