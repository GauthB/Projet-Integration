<?php
require_once '../php/db_connect.php';

$sth = $dbh->prepare('DELETE FROM Stages WHERE id_stage = ?');
$sth->execute([$_POST['id']]);