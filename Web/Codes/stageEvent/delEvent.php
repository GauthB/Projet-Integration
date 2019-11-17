<?php
require_once '../db_connect.php';

$sth = $dbh -> prepare('DELETE FROM Events WHERE id_event = ?');
$sth->execute([$_POST['id']]);