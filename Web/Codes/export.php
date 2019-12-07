<?php
//header('Content-Type: text/csv');
//header('Content-Disposition: attachement; filename="stats.csv"');

require_once "php/db_connect.php";

$eventInfoQuery = $dbh->query('SELECT stage_name, nbr_entree, nbr_sortie, heure 
                               FROM Nbr_Personne 
                               join Stages on Stages.id_stage = Nbr_Personne.id_stage');

$eventInfos = $eventInfoQuery->fetchAll(PDO::FETCH_ASSOC);
$data = array();
foreach ($eventInfos as $d){
    $data[] = array(
        'Nom du stage' => $d->stage_name,
        'Nombre entree' => $d->nbr_entree,
        'Nombre entree' => $d->nbr_sortie,
        'heure'      => $d->heure
    );
}
print_r($data);
