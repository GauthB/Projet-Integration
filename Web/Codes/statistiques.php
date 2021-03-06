<?php
session_start();
if(!isset($_SESSION['id'])) {
    header('Location: index.php');
    exit;
}
require_once "php/db_connect.php";
require_once "esp-data.php";
?><!DOCTYPE html>
<html lang="en">
<head>
    <title>PeopleFlux - Statistiques</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/select-css.css">
    <link rel="icon" type="image/x-icon" href="LogoSmall.ico"/>
    <script src="js/Chart.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <style type="text/css">
        @media print {
            .boutonstats, .boutonstats, #yo, .boutonstats, .d-block mb-3 caption,.site-footer{
                display: none;
            }
        }
    </style>

</head>

<body>
<div class="site-wrap">
    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar py-3" role="banner">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-11 col-xl-2" data-aos="fade-up">
                    <h1 class="mb-0"><a href="index.php" class="text-white h2 mb-0">People<span class="text-primary">Flux</span> </a></h1>
                    <span class="d-block mb-3 caption">Compte: <?=$_SESSION['name']?> </span>
                    <a href="admin.php" ><button class="boutonstats">Retour</button></a>
                    <br>
                </div>
                <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>
            </div>
        </div>
    </header>

    <div class="site-section" style="padding-top: 100px">
        <div class="container" data-aos="fade-up">
            <style type="text/css">
                hr {
                    border-top: 1px solid red
                }
            </style><br>
            <?php /*
            $sth = $dbh -> prepare('SELECT *
                                            FROM Events
                                            join Clients ON Events.id_client = Clients.id_client
                                            WHERE Clients.id_client =:client_id');
            $sth->execute(array(':client_id' => $_SESSION['id']));
            $eventsInfo = $sth -> fetchAll(PDO::FETCH_ASSOC);
            $sth->closeCursor();
            //$sth2->execute(array(':event_id' => $_EVENT['id_event']));
            $sth2 = $dbh -> prepare('SELECT *
                                              FROM Stages
                                              join Events on Stages.id_event = Events.id_event
                                              join Clients on Events.id_client = Clients.id_client
                                              where Clients.id_client =:client_id');
            $sth2->execute(array(':client_id' => $_SESSION['id']));
            $difStage = $sth2 -> fetchAll(PDO::FETCH_ASSOC);
            $sth2->closeCursor();
             echo  ' <br><br><form method="get">';
            if(empty($eventsInfo)) {
                echo '<p data-aos="fade-up">Vous n\'avez aucun évènements</p>';
            }
            else {
                echo '<select>';
                foreach ($eventsInfo as $event) {
                    //$res = ($_GET['nom']==$event["event_name"]?"selected":"");
                    echo '<option id="event_'.$event["id_event"].'">' .
                          $event["event_name"] . '</option></span>';
                }
                echo '</SELECT><br>';
            }
            if(empty($difStage)) {
                echo '<option>Vous n\'avez aucune stage</option>';
            }
            else {
                echo '<br><SELECT name="nom" size="1"  id="yo" onchange="graphe();">';
                foreach ($difStage as $stage) {
                    $res = ($_GET['nom']==$stage["stage_name"]?"selected":"");
                    echo '<option id="stage_' . $stage["id_stage"] . '" '. $res .'>' .
                        $stage["stage_name"] . '</option>' ;
                }
            }
            echo '</select>';
            ?>
            <br><br><input type="submit" class="boutonstats">
            <br>
            <hr>
            */
            ?><br>
            <br>
            <br>
            <br><span style="padding-right: 0.4rem;"">Evènement :
            <?php
                $sth = $dbh -> prepare('SELECT * FROM Events join Clients ON Events.id_client = Clients.id_client');
                $sth->execute();
                $eventsInfo = $sth -> fetchAll(PDO::FETCH_ASSOC);
                $sth->closeCursor();
            ?>
            </span>
            <select id="eventt"  class="select-css" onchange="stage();number();graphe();actu();entree();sortie();">
                <?php if($_SESSION['id'] == 9){
                        foreach ($eventsInfo as $event) {
                            //$res = ($_GET['nom']==$event["event_name"]?"selected":"");
                            echo '<option id="event_'.$event["id_event"].'">' .
                                $event["event_name"] . '</option></span>';
                        }
                      }
                ?>
            </select></br>
            <br><span style="padding-right: 2.8rem;">Lieux :</span>
            <select id="stagee"  class="select-css" onchange="number();graphe();actu();entree();sortie();">
            </select></br>
            <br style="margin-top=20px">

            
            <!-- affiche les statistiques liés à un evennement -->
            <div class="d-block mb-3 caption" data-aos="fade-up"></br>
                <h2>Statistiques public</h2>
                <h2 style="font-size: 15px" id="entre"> Nombre entree : 0</h2>
                <h2 style="font-size: 15px" id="sort"> Nombre sortie : 0</h2>
                <h2 style="font-size: 15px" id="actu">Nombre actuel : 0</h2>
                <?php /*$data = new data();
                echo '<table class="tftable" border="1" data-aos="fade-up">';
                echo '<br>' . $data->afficheStat("public",$_SESSION['id'],$_GET['nom'],0) .'</table>';
                */?>
            </div>
            <hr>
            <form class="d-block mb-3 caption" data-aos="fade-up"></br>
                <h2>Statistiques privées</h2>

                Afficher derniers resultats :
                <input name="cpt" id="cpt" type="number" step="10" value="10" min="10" style="width: 3rem">
                <button name="button" type="button" id="tab" class="boutonstats" onclick="number()"> Afficher ses statistiques </button>
                <button name="button" type="button" id="tab" class="boutonstats" onclick="tbleau()"> Ne plus afficher </button>
                <button name="button" type="button" id="tab" class="boutonstats" onclick="numberr()"> Actualiser </button>

            </form>


            <table class="tftable" border="1" data-aos="fade-up" >
                <tbody id="tablee">

                </tbody>
                <?php // echo '<br>' . $data->afficheStat("prive",$_SESSION['id'],$_GET['nom'],$_GET['cpt']); ?>
            </table>
            <br>
            <hr>
            <button name="button" id="boutongraphe" class="boutonstats" onclick="afficher(),graphe();"> Observer son graphique</button>
            <button name="button" id="grapheannule" class="boutonstats" onclick="annuler();"> Annuler </button>
            <button name="button" id="grapheannule" class="boutonstats" onclick="graphe();"> Actualiser </button>

            <button name="button" id="boutonimprimer" class="boutonstats" onClick="window.print();"> Imprimer la page</button>
            <a href="export.php"><button name="button" id="excel" class="boutonstats">importer sur Excel</button></a>
        </div>
    </div>
    <canvas id="myChart" width="20%" height="5%" style="display: none"></canvas>


    <script>
        <?php

        $grapheQuery = $dbh->query(
            " SELECT * FROM `Nbr_Personne` as p join Stages as s WHERE p.id_stage = s.id_stage 
" );
        $grapheInfo = $grapheQuery->fetchAll(PDO::FETCH_ASSOC);
        $clientQuery = $dbh->query(
            " SELECT c.id_client, e.id_event, e.event_name, e.event_city, e.date_from, e.date_to, e.id_client FROM `Clients` as c join Events as e where c.id_client=e.id_client
" );
        $clientInfo = $clientQuery->fetchAll(PDO::FETCH_ASSOC);
        $stageQuery = $dbh->query(
            " SELECT * FROM `Events` as e join Stages as s where e.id_event = s.id_event
" );
        $stageInfo = $stageQuery->fetchAll(PDO::FETCH_ASSOC);


        ?>
        var idclient = <?php echo json_encode($_SESSION['id']); ?>;
        var variableRecuperee = <?php echo json_encode($grapheInfo); ?>;
        var variableClient = <?php echo json_encode($clientInfo); ?>;
        var variableStage = <?php echo json_encode($stageInfo); ?>;



        //Demarrage de la page

        window.onload = function() {
            document.getElementById("tablee").innerHTML = "";
            document.getElementById("tablee").style.display = "none";

            for (a = 0; a < variableClient.length; a++) {
                if (idclient == variableClient[a]['id_client']) {
                    document.getElementById("eventt").innerHTML += "<option " + variableClient[a]['id_event'] + ">" + variableClient[a]['event_name'] + "</option>"
                }
            }
            for (e = 0; e < variableRecuperee.length; e++) {
                if (document.getElementById('stagee').value == variableRecuperee[e]['stage_name']) {
                }
            }
            if (document.getElementById("eventt").value == "Welcome Spring Festival") {
                for (p = 0; p < variableStage.length; p++) {
                    if (variableStage[p]['id_event'] == 2) {
                        document.getElementById("stagee").innerHTML += "<option>" + variableStage[p]['stage_name'] + "</option>"
                    }
                }
            }
            for (p = 0; p < variableStage.length; p++) {
                if (document.getElementById("eventt").value == variableStage[p]['event_name']) {
                    document.getElementById("stagee").innerHTML += "<option>" + variableStage[p]['stage_name'] + "</option>"
                }
            }
            var acto = 0;
            for( x = 0; x < variableRecuperee.length; x++) {
                if(document.getElementById("stagee").value == variableRecuperee[x]["stage_name"]) {
                    if (variableRecuperee[x]["nbr_entree"] == 1) {
                        acto++;
                    }
                    if (variableRecuperee[x]["nbr_sortie"] == 1) {
                        acto--;
                    }
                }
            }
            document.getElementById("actu").innerHTML = "Nombre actuel : " + (acto<0?0:acto);



            var ent = 0;
            for( x = 0; x < variableRecuperee.length; x++) {
                if(document.getElementById("stagee").value == variableRecuperee[x]["stage_name"]) {
                    if( variableRecuperee[x]["nbr_entree"] == 1) {
                        ent++;
                    }
                }
            }
            document.getElementById("entre").innerHTML = "Nombre entree  : " + ent;

            var sor = 0;
            for( x = 0; x < variableRecuperee.length; x++) {
                if(document.getElementById("stagee").value == variableRecuperee[x]["stage_name"]) {
                    if( variableRecuperee[x]["nbr_sortie"] == 1) {
                        sor++;
                    }
                }
            }
            document.getElementById("sort").innerHTML = "Nombre sortie : " + sor;
        }

        // On recupere le nombre actuel de personne
        function actu() {
            var acto = 0;
            for( x = 0; x < variableRecuperee.length; x++) {
                if(document.getElementById("stagee").value == variableRecuperee[x]["stage_name"]) {
                    if (variableRecuperee[x]["nbr_entree"] == 1) {
                        acto++;
                    }
                    if (variableRecuperee[x]["nbr_sortie"] == 1) {
                        acto--;
                    }
                }
            }
            document.getElementById("actu").innerHTML = "Nombre actuel : " + (acto<0?0:acto);
        }

        // On recupere le nombre d'entrée
        function entree() {
            var ent = 0;
            for( x = 0; x < variableRecuperee.length; x++) {
                if(document.getElementById("stagee").value == variableRecuperee[x]["stage_name"]) {
                    if( variableRecuperee[x]["nbr_entree"] == 1) {
                        ent++;
                    }
                }
            }
            document.getElementById("entre").innerHTML = "Nombre entree  : " + ent;
        }


        // On recupere le nombre de sortie
        function sortie() {
            var sor = 0;
            for( x = 0; x < variableRecuperee.length; x++) {
                if(document.getElementById("stagee").value == variableRecuperee[x]["stage_name"]) {
                    if( variableRecuperee[x]["nbr_sortie"] == 1) {
                        sor++;
                    }
                }
            }
            document.getElementById("sort").innerHTML = "Nombre sortie : " + sor;
        }

        //Afficher graphique
        function afficher() {
            document.getElementById("myChart").style.display = "block";
        }

        //Désafficher graphique
        function annuler() {
            document.getElementById("myChart").style.display = "none";
        }


        //Créer le graphique
        function graphe() {
            var i = 0;
            var heures = [];
            var nbrAct = [];
            var myChart = null;
            var ctx = null;
            var nbrActu = 0;
            for (f = 0; f < variableRecuperee.length; f++) {
                if (document.getElementById("stagee").value == variableRecuperee[f]["stage_name"]) {
                    if ( variableRecuperee[f]['nbr_entree'] == 1) {
                        nbrActu++;
                    }
                    if ( variableRecuperee[f]['nbr_sortie'] == 1) {
                        nbrActu--;
                    }
                    if ( nbrActu < 0) {
                        nbrActu = 0;
                    }
                        heures[i] = variableRecuperee[f]["heure"].slice(11, 19);
                        nbrAct[i] = nbrActu;

                    i++;

                }
            }
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: heures,
                    datasets: [{
                        label: 'Observer ici le nombre de personne présente en fonction de la soirée !',
                        data: nbrAct,
                        backgroundColor:
                            'rgb(0,0,0,0.1)'
                        ,
                        borderColor:
                            'rgb(255, 0, 35)'
                        ,
                        borderWidth: 2
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }

        //Liste des évenements
        function stage() {
            document.getElementById("stagee").innerHTML = "";
            if (document.getElementById("eventt").value == "Welcome Spring Festival") {
                for (p = 0; p < variableStage.length; p++) {
                    if (variableStage[p]['id_event'] == 2) {
                        document.getElementById("stagee").innerHTML += "<option>" + variableStage[p]['stage_name'] + "</option>"
                    }
                }
            }
            for (p = 0; p < variableStage.length; p++) {
                if (document.getElementById("eventt").value == variableStage[p]['event_name']) {
                    document.getElementById("stagee").innerHTML += "<option>" + variableStage[p]['stage_name'] + "</option>"
                }
            }
        }

        //Tableau d'entrées
        function number() {
            document.getElementById("tablee").style.display = "";

            indica = document.getElementById("cpt").value;
            var indic = 0;
            document.getElementById("tablee").innerHTML =  "<tr><th>Nom Scene</th> <th>Entrées</th> <th>Sorties</th> <th>Heure</th> </tr>";
            document.getElementById("tablee").innerHTML += "<tr>";
            for (c = 0; c < variableRecuperee.length; c++) {
                if (document.getElementById("stagee").value == variableRecuperee[c]['stage_name']) {
                    indic++
                    if( indic <= indica) {
                        document.getElementById("tablee").innerHTML += "<td>" + variableRecuperee[c]['stage_name'] + "</td><td>" + variableRecuperee[c]['nbr_entree'] + "</td><td>" + variableRecuperee[c]['nbr_sortie'] + "</td><td>" + variableRecuperee[c]['heure'] + "</td>"
                    }
                }
            }
            document.getElementById("tablee").innerHTML += "</tr>";
        }


        //Actualiser le tableau d'entrée
        function numberr() {
            if((document.getElementById("tablee").innerHTML == "")) {alert("Afficher d'abord vos statistiques");}
            else if ( document.getElementById("tablee").style.display == "none") {alert("Afficher d'abord vos statistiques");}
                else if ( (document.getElementById("tablee").style.display == "") ) {
                indica = document.getElementById("cpt").value;
                var indic = 0;
                document.getElementById("tablee").innerHTML = "<tr><th>Nom Scene</th> <th>Entrées</th> <th>Sorties</th> <th>Heure</th> </tr>";
                document.getElementById("tablee").innerHTML += "<tr>";
                for (c = 0; c < variableRecuperee.length; c++) {
                    if (document.getElementById("stagee").value == variableRecuperee[c]['stage_name']) {
                        indic++
                        if (indic <= indica) {
                            document.getElementById("tablee").innerHTML += "<td>" + variableRecuperee[c]['stage_name'] + "</td><td>" + variableRecuperee[c]['nbr_entree'] + "</td><td>" + variableRecuperee[c]['nbr_sortie'] + "</td><td>" + variableRecuperee[c]['heure'] + "</td>"
                        }
                    }
                }
                document.getElementById("tablee").innerHTML += "</tr>";
            }

        }

        function tableau() {
            document.getElementById("tablee").innerHTML =  "<tr><th>Nom Scene</th> <th>Entrées</th> <th>Sorties</th> <th>Heure</th> </tr>";
            document.getElementById("tablee").innerHTML += "<tr>";
            for (c = 0; c < variableRecuperee.length; c++) {
                if (document.getElementById("stagee").value == variableRecuperee[c]['stage_name']) {
                    document.getElementById("tablee").innerHTML += "<td>" + variableRecuperee[c]['stage_name'] + "</td><td>" + variableRecuperee[c]['nbr_entree'] + "</td><td>" + variableRecuperee[c]['nbr_sortie'] + "</td><td>" + variableRecuperee[c]['heure'] + "</td>"
                }
            }
            document.getElementById("tablee").innerHTML += "</tr>";
        }

        function tbleau() {
            document.getElementById("tablee").style.display = "none";
        }
    </script>

    <footer class="site-footer">
        <?php include("footer.php"); ?>
    </footer>

   


    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

</body>
</html>
