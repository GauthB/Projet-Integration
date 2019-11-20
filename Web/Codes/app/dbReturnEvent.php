<?php

require_once('../db_connect.php');


$sql = <<< EOT
        SELECT * FROM Events;
EOT;

try {

    $sth = $dbh -> prepare($sql);
    $sth -> execute();
    $infos = $sth -> fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($infos);

    $dbh=null;

} catch (Exception $e) {
    print "Erreur !:" .$e -> getMessage()."<br/>";
    die();

}
