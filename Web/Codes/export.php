<?php
session_start();
if(!isset($_SESSION['id'])) {
    header('Location: index.php');
    exit;
}
require_once "db_connect.php";
require_once "esp-data.php";

$req = $dbh->prepare('SELECT stage_name, id_stage, nbr_entree, nbr_sortie, nbr_actuel, heure FROM evenements');
$req->execute();
$data = $req->fetchAll();
require 'class_csv.php';
CSV::export($data,'stat_event');
?>
