<?php
session_start();
if(!isset($_SESSION['id'])) {
    header('Location: index.php');
    exit;
}
require_once "db_connect.php";
require_once "esp-data.php";
?>"Nom de scène";"ID";"Entrées";"Sorties";"Actuel";"Heure"