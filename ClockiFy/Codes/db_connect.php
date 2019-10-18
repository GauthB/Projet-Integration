<?php

$servername = "91.216.107.248";
$username = "gauth1148636_1fzru";
$password = "n7ttg6wdjq";
$dbname = "gauth1148636_1fzru";

try {
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    // set the PDO error mode to exception
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //echo "Connection success";
} catch (PDOException $e) {
    error_log("Connection failed: " . $e->getMessage());
    //echo "Connection failed: " . $e->getMessage();
}
