<?php

if(isset($_POST['name'])) {
    $name = $_POST['name'];

    //Lagra i sessionsvariabel
    session_start();
    $_SESSION['name'] = $name;

    header("Location: index.php");
}