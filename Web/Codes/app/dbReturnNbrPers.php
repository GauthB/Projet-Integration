<?php

require_once('../php/db_connect.php');


$sql = <<< EOT
        SELECT * FROM Nbr_Personne WHERE id_stage = ? ;
EOT;

try {

    $json = file_get_contents('php://input');
	  $obj = json_decode($json,true);
    $event = $obj['id'];


    $sth = $dbh -> prepare($sql);
    $sth -> execute(array($event));
    $infos = $sth -> fetchAll(PDO::FETCH_ASSOC);

    print_r($infos);

    $dbh=null;

} catch (Exception $e) {
    print "Erreur !:" .$e -> getMessage()."<br/>";
    die();

}
