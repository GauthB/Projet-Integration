<?php

try {
    $dbh = new PDO('mysql:host=91.216.107.248;dbname=gauth1148636_1fzru','gauth1148636_1fzru','n7ttg6wdjq');



} catch (Exception $e) {
    echo "Erreur !:" .$e -> getMessage()."<br/>";
    die();

}


$sql = <<< EOT
        SELECT * FROM Events WHERE id_event = ? ;
EOT;

try {

    $json = file_get_contents('php://input');
	  $obj = json_decode($json,true);
    $event = $obj['id_event'];


    $sth = $dbh -> prepare($sql);
    $sth -> execute(array($event));
    $infos = $sth -> fetchAll(PDO::FETCH_ASSOC);

    print_r($infos);

    $dbh=null;

} catch (Exception $e) {
    print "Erreur !:" .$e -> getMessage()."<br/>";
    die();

}
