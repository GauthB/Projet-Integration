<?php

require_once('../php/db_connect.php');


$sql = <<< EOT
        SELECT * FROM Events;
EOT;

try {

    $json = file_get_contents('php://input');
	  $obj = json_decode($json,true);
    $event = $obj['id'];


    $sth = $dbh -> prepare($sql);
    $sth -> execute();
    $infos = $sth -> fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($infos);

    $dbh=null;

} catch (Exception $e) {
    print "Erreur !:" .$e -> getMessage()."<br/>";
    die();

}
