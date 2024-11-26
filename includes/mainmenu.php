
<?php include("includes/config.php"); ?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $title ?> | <?php $siteName ?></title>
    <link rel="stylesheet" href="css/layout.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Codystar:wght@300;400&family=Red+Hat+Text:ital,wght@0,300..700;1,300..700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    
<?php
// Array of pages
$pages = array(
    "index.php" => "Hem",
    "bucketlist.php" => "Bucketlist"
);
?>

<!--Container used to apply bg-image-->
<div class="bg">

<!--Main menu nav-links-->
<header>
<nav id="mainMenu">
    <ul>
        <?php
        // Loop through array of pages
        foreach ($pages as $url => $title) {
            // Check if page is active
            $current = basename($_SERVER["SCRIPT_FILENAME"]);

            // Echo a link for each page and check if active
            if ($url == $current) {
                echo "<li class='current'><a href='$url'>$title</a></li>";
            } else {
                echo "<li><a href='$url'>$title</a></li>";
            }
        }
        ?>
    </ul>
    </header>

    <!--Container to position contents relative-->
    <div class="wrap">
    <!--Content container used to apply bg-image-->
        <div class="contentBg"></div>
    <!--Container used to hold content-->
        <div class="content">

    <main>
