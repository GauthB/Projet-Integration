<?php

try {
    $dbh = new PDO('mysql:host=91.216.107.248;dbname=gauth1148636_1fzru','gauth1148636_1fzru','n7ttg6wdjq');



} catch (Exception $e) {
    echo "Erreur !:" .$e -> getMessage()."<br/>";
    die();

}

$sql = <<< EOT
        SELECT * FROM Events;
EOT;

try {
    $sth = $dbh -> prepare($sql);
    $sth -> execute();
    $infos = $sth -> fetchAll(PDO::FETCH_ASSOC);

    print_r($infos);

    $dbh=null;

} catch (Exception $e) {
    print "Erreur !:" .$e -> getMessage()."<br/>";
    die();

}
