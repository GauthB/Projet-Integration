<?php
require_once '../php/db_connect.php';
session_start();
print_r($_POST);

if($_POST['idEvent'] != -1 && !empty($_POST['stageName']) && is_numeric($_POST['lat']) && is_numeric($_POST['long']) && is_numeric($_POST['nbPart'])) {

    $sql = '
    INSERT INTO Stages (stage_name, stage_latitude, stage_longitude, max_people, hour_from, hour_to, id_event)
        VALUES (?, ?, ?, ?, ?, ?, ?)';

    $sth = $dbh -> prepare($sql);
    $sth->execute([$_POST['stageName'], $_POST['lat'], $_POST['long'], $_POST['nbPart'], $_POST['heureDebut'], $_POST['heurefin'], $_POST['idEvent']]);

    header('Location: ../admin.php');
}