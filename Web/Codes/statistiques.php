<?php
session_start();

if(!isset($_SESSION['id'])) {
    header('Location: index.php');
    exit;
}

require_once "db_connect.php";
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
    <link rel="icon" type="image/x-icon" href="LogoSmall.ico"/>
    <script src="js/Chart.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
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
            <?php

            $sth = $dbh -> prepare('SELECT * FROM Events WHERE id_client=:client_id');
            $sth->execute(array(':client_id' => $_SESSION['id']));
            $eventsInfo = $sth -> fetchAll(PDO::FETCH_ASSOC);
            $sth->closeCursor();

            //$sth2->execute(array(':event_id' => $_EVENT['id_event']));
            $sth2 = $dbh -> prepare('SELECT stage_name FROM Stages WHERE id_event');
            $sth2->execute(array(':client_id' => $_SESSION['id']));
            $difEvent = $sth2 -> fetchAll(PDO::FETCH_ASSOC);
            $sth2->closeCursor();

            echo  ' <form method="get">';

            if(empty($eventsInfo)) {
                echo '<p data-aos="fade-up">Vous n\'avez aucun évènements</p>';
            }
            else {
                foreach ($eventsInfo as $event) {
                    echo '<br><br><span class="boutonstats" style="margin-bottom: 10px">' .$event["event_name"] .  $eventName['id_event'] . '</span>
                          <br><SELECT name="nom" size="1"  id="yo" onchange="graphe();" value="' . $_GET["nom"].'">';
                    if(empty($difEvent)) {
                        echo '<option>Vous n\'avez aucune stage</option>';
                    }
                    else {
                        foreach ($difEvent as $event) {
                            $res = ($_GET['nom']==$event["stage_name"]?"selected":"");
                            echo '<option id="' . $event["id_stage"] . '" '. $res .'>' .
                                $event["stage_name"] . '</option>' ;
                        }
                    }
                    echo '</SELECT>';
                }
            }
            ?>
            <br><br><input type="submit" class="boutonstats">
            <br>
            <hr>
            <!-- affiche les statistiques liés à un evennement -->
            <div class="d-block mb-3 caption" data-aos="fade-up"></br>
                <h2>Statistiques public</h2>
                <?php $data = new data();
                echo '<table class="tftable" border="1" data-aos="fade-up">';
                echo '<br>' . $data->afficheStat("public",$_SESSION['id'],$_GET['nom'],0) .'</table>';
                ?>
            </div>
            <hr>
            <form class="d-block mb-3 caption" data-aos="fade-up"></br>
                <h2>Statistiques privées</h2>

                Afficher derniers resultats :
                <input name="cpt" type="number" step="10" value="10" min="10" style="width: 3rem">
                <input type="submit" class="boutonstats" id="boutonstats">
            </form>

            <table class="tftable" border="1" data-aos="fade-up">
                <tr><th>Nom Scene</th> <th>ID</th> <th>Entrées</th> <th>Sorties</th> <th>Actuel</th> <th>Heure</th> </tr>
                <?php echo '<br>' . $data->afficheStat("prive",$_SESSION['id'],$_GET['nom'],$_GET['cpt']); ?>
            </table>
            <br>
            <hr>
            <button name="button" id="boutongraphe" class="boutonstats"> Observer son graphique</button>
            <button name="button" id="grapheannule" class="boutonstats"> Annuler </button>


            <canvas id="myChart" width="20%" height="5%" style="display: none"></canvas>
        </div>
    </div>

    <script>






        <?php
        $grapheQuery = $dbh->query(
            " SELECT * FROM `Nbr_Personne` as p join Stages as s WHERE p.id_stage = s.id_stage
" );
        $grapheInfo = $grapheQuery->fetchAll(PDO::FETCH_ASSOC);



        ?>
        function graphe() {
            var i = 0;
            var heures = [];
            var nbrAct = [];
            var myChart = null;
            var ctx = null;
            for (e = 0; e < variableRecuperee.length; e++) {

                if (document.getElementById('yo').value == variableRecuperee[e]['stage_name']) {


                    heures[i] = variableRecuperee[e]['heure']
                    nbrAct[i] = variableRecuperee[e]['nbr_actuel']
                    i++;
                } else {
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
            document.getElementById("boutongraphe").onclick = function() {
                document.getElementById("myChart").style.display = "block";
            }
            document.getElementById("grapheannule").onclick = function() {
                document.getElementById("myChart").style.display = "none";
            }
        }

        var variableRecuperee = <?php echo json_encode($grapheInfo); ?>;

            for (e = 0; e < variableRecuperee.length; e++) {
                if (document.getElementById('yo').value == variableRecuperee[e]['stage_name']) {
                    graphe();
                }
            }


    </script>

    <footer class="site-footer">
        <?php include("footer.php"); ?>
    </footer>

</div>

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
