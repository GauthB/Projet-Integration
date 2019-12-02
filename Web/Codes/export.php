<?php
header('Content-Type: text/csv');
header('Content-Disposition: attachement; filename="stats.csv"');

try{
    $PDO = new PDO("91.216.107.248", "gauth1148636_1fzru", "n7ttg6wdjq");
    $PDO->setAttribute(PDO::ATR_ERRMODE,PDO::ERRMODE_WARNING);
    $PDO->setAttribute(PDO::ATR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
}catch(PDOException $e){
    echo 'Connexion impossible';
}
$req = $PDO->prepare('SELECT stage_name, nbr_entree, nbr_sortie, heure FROM nbr_Personne ');
$req->execute();
$data = $req->fetchAll();
print_r($data); exit();
?>
