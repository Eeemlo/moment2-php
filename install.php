<?php
include("includes/config.php");

$db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);

if($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

//Create table
    $sql = "CREATE TABLE IF NOT EXISTS m2_bucketlist(
        id INT(5) PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(56) NOT NULL,
        description VARCHAR(164) NOT NULL,
        priority INT(1) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );";

    // Send SQL query to server
    if ($db->multi_query($sql)) {
    
    } else {
        echo "Error creating table.";
    }