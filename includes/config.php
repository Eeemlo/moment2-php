<?php

$siteName = "Emma's Bucketlist";

/*Apply false before publishing*/
$devMode = true;


if ($devMode) {
    /*Activate error messages*/
    error_reporting(-1);
    ini_set("display_errors", 1);
}

/*Activate automatic support for including classes*/
spl_autoload_register(function ($class_name) {
    include 'classes/' . $class_name . '.class.php';
});

if ($devMode) {
    // Local database settings
    define("DBHOST", "localhost");
    define("DBUSER", "EmmaL");
    define("DBPASS", "EmmaL");
    define("DBDATABASE", "wordpress1");
} else {
    // Deployed database settings
    define("DBHOST", "");
    define("DBUSER", "");
    define("DBPASS", "");
    define("DBDATABASE", "");
}


