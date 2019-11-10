<?php
require_once 'db_connect.php';

if(!empty($_POST['nomEvenement']) && !empty($_POST['adresseEvent']) && !empty($_POST['informationsEvent'])) {

}


$sql = '
    INSERT INTO Events (event_name, date_from, date_to, event_description, event_address, event_price, id_client)
        VALUES (?, ?, ?, ?, ?, ?, ?)';

//$sth = $dbh -> prepare('SELECT * FROM Events WHERE id_client=:client_id');
//$sth->execute(array(':client_id' => $_SESSION['id']));