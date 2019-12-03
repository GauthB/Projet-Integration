<?php
header('Content-Type: text/csv');
header('Content-Disposition: attachement; filename="stats.csv"');

require_once "php/db_connect.php";

$eventInfoQuery = $dbh->query('SELECT stage_name, nbr_entree, nbr_sortie, heure 
                               FROM Nbr_Personne 
                               join Stages on Stages.id_stage = Nbr_Personne.id_stage');

$eventInfos = $eventInfoQuery->fetchAll(PDO::FETCH_ASSOC);
?>"Nom de la scene";"Nombre entrees";"Nombre sorties";"Heure"<?php
foreach($eventInfos as $e){
    echo "\n".'"'.$e->stage_name.'";"'.$e->nbr_entree.'";"'.$e->nbr_sortie.'";"'.$e->heure.'"';
}?>
