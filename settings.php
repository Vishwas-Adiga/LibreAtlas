<?php
/**
 * settings.php
 *
 * This is the settings file of this project. This file must be required in index.php in order to be included everywhere in this software.
 * Globals and project settings will be declared here.
 *
 * @author MigDinny (https://github.com/MigDinny)
 */

/* Settings >> SETUP */

// Switch on/off ERROR REPORTING (1 = on, 2 = off) (can be overridden by php.ini)
error_reporting(1);

// App Folder >> folder in which this app is
$appFolder = 'LibreAtlas';

// App Name >> which will appear everywhere
$appname = 'LibreAtlas';

// Google Maps API KEY >> get your own at https://developers.google.com/maps/documentation/javascript/adding-a-google-map#key
$maps_api_key = 'AIzaSyDVfEN1F0MVVQHt1nqCOIVrcWqSyHQ4AjI';

// Database credentials
$username = 'root';
$password = 'root';
$databaseName = 'libreatlas';
$host = 'localhost';
$encoding = 'utf8';

/* Constants & Globals Declaration */
$GLOBALS['appname'] = $appname;
$GLOBALS['maps_api_key'] = $maps_api_key;
$GLOBALS['root'] = $_SERVER['DOCUMENT_ROOT'] . '/' . $appFolder; // ex: C:/wamp64/www/LibreAtlas
$GLOBALS['core'] = $GLOBALS['root'] . '/core'; // ex: C:/wamp64/www/LibreAtlas/core
$GLOBALS['classes'] = $GLOBALS['core'] . '/classes'; // ex: C:/wamp64/www/LibreAtlas/core/classes
$GLOBALS['contents'] = $GLOBALS['core'] . '/contents'; // ex: C:/wamp64/www/LibreAtlas/core/contents
$GLOBALS['sources'] = $GLOBALS['core'] . '/sources'; // ex: C:/wamp64/www/LibreAtlas/core/sources

/* Loading all libraries needed for the program to run */
require_once($GLOBALS['classes'] . '/meekrodb.2.3.class.php');
require_once($GLOBALS['classes'] . '/RequestHandler.class.php');
require_once($GLOBALS['classes'] . '/Wizard.class.php');

/* Setting up the Database Handler */
DB::$user = $username;
DB::$password = $password;
DB::$dbName = $databaseName;
DB::$host = $host;
DB::$encoding = $encoding;
?>
