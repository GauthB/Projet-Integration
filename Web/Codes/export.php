<?php

require_once "php/db_connect.php";

$eventInfoQuery = $dbh->query('SELECT stage_name as NOM, nbr_entree as ENTREE, nbr_sortie as SORTIE, heure
                               FROM Nbr_Personne
                               JOIN Stages on Stages.id_stage = Nbr_Personne.id_stage
                               WHERE NOM');

$eventInfos = $eventInfoQuery->fetchAll(PDO::FETCH_ASSOC);

require 'class_csv.php';
CSV::export($eventInfos,'Export');
?>
