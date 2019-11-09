<?php
require_once "db_connect.php";
$errors = array();
$messages = array();

if($_POST['subEvent']){



    $sql2 = 'INSERT INTO Events (event_name,date_from,date_to,event_description,event_adress,id_client ) VALUES (?,?,?,?,?,?,?)';

    $sth2 = $dbh->prepare($sql2);
    $sth2->execute([$_POST['nomEvenement'], $_POST['dateFrom'], $_POST['dateTo'], $_POST['informationsEvent'], $_POST['adresseEvent'],'test']);
    array_push($messages, 'Nouveau évènement ajouté');

}

