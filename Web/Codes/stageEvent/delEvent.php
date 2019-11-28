<?php
require_once '../php/db_connect.php';

$sth = $dbh -> prepare('DELETE FROM Events WHERE id_event = ?');
$sth->execute([$_POST['id']]);