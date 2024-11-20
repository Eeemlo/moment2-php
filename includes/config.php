<?php

$siteName = "Emma's Bucketlist"

$devMode = true; // Apply false before publishing

if ($devMode) {
    //Aktivera felmeddelanden
    error_reporting(-1);
    ini_set("display_errors", 1);
}

//Activate automatic support for including classes
spl_autoload_register(function($class_name) {
    include 'classes/' . $class_name . '.class.php';
})

if ($devMode) {
    // Local database settings
} else {
    // Deployed database settings
}