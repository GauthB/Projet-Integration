<?php
require_once '../db_connect.php';

$sth = $dbh -> prepare('DELETE FROM Clients WHERE id_client = ?');
$sth->execute([$_POST['id']]);