<?php
require_once '../db_connect.php';
session_start();

if(!empty($_POST['nomEvenement']) && !empty($_POST['dateFrom']) && !empty($_POST['dateTo']) && !empty($_POST['adresseEvent'])) {
    $sql = '
    INSERT INTO Events (event_name, date_from, date_to, event_description, event_address, event_price, id_client)
        VALUES (?, ?, ?, ?, ?, ?, ?)';

    $sth = $dbh -> prepare($sql);
    $sth->execute([$_POST['nomEvenement'], $_POST['dateFrom'], $_POST['dateTo'], $_POST['informationsEvent'], $_POST['adresseEvent'], '', $_SESSION['id']]);

    header('Location: ../admin.php');
}
