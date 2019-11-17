<?php
require_once 'db_connect.php';
session_start();

if($_POST['nomEvent'] != -1 && !empty($_POST['']) && is_numeric($_POST['lat']) && is_numeric($_POST['long']) && is_numeric($_POST['nbPart'])) {

    $sql = '
    INSERT INTO Stages (stage_name, stage_latitude, stage_longitude, max_people, hour_from, hour_to, id_event
        VALUES (?, ?, ?, ?, ?, ?, ?)';

    $sth = $dbh -> prepare($sql);
    $sth->execute([$_POST['nameStage'], $_POST['lat'], $_POST['long'], $_POST['nbPart'], $_POST['heureDebut'], $_POST['heurefin'], $_POST['nomEvent']]);

    header('Location: admin.php');
}