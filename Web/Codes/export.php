<?php
//header('Content-Type: text/csv');
//header('Content-Disposition: attachement; filename="stats.csv"');

require_once "php/db_connect.php";


/*
$sth = $dbh -> prepare('SELECT * FROM Stages JOIN Events ON Stages.id_event = Events.id_event WHERE id_client=:client_id');
$sth->execute(array(':client_id' => $_SESSION['id']));
$stageInfo = $sth -> fetchAll(PDO::FETCH_ASSOC);
$sth->closeCursor();

foreach ($stageInfo as $stage) {
    $data[] = array(
        $stage["event_name"] . '</td><td>' .
        $stage["stage_name"] . '</td><td>' .
        $stage["stage_latitude"] . '</td><td>' .
        $stage["stage_longitude"] . '</td><td>' .
        $stage["max_people"] . '</td><td>' .
        $stage["hour_from"] . '</td><td>' .
        $stage["hour_to"] . '</td><td>');
        echo "'<span class=\"close btnDelStage\" data-idStage=\"' . $stage[id_stage] . '\"><i class=\"fas fa-backspace suppr\" style=\"margin-right:2.5rem\"></i></span></td></tr>'";
}
*/

$eventInfoQuery = $dbh->query('SELECT stage_name as NOM, nbr_entree as ENTREE, nbr_sortie as SORTIE, heure
                               FROM Nbr_Personne
                               JOIN Stages on Stages.id_stage = Nbr_Personne.id_stage
                               WHERE NOM');

$eventInfos = $eventInfoQuery->fetchAll(PDO::FETCH_ASSOC);

require 'class_csv.php';
CSV::export($eventInfos,'Export');
?>
