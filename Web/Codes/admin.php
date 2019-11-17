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
    <title>PeopleFlux - Interface</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="LogoSmall.ico"/>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>

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
<!-- appel du header -->
    <?php include 'header.php'?>

    <div class="site-section site-hero inner ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <span class="d-block mb-3 caption" data-aos="fade-up">Vous êtes connecté en tant que: <?=$_SESSION['name']?> </span>
                    <h1 class="d-block mb-4" data-aos="fade-up" data-aos-delay="100">Bienvenue dans l'interface!</h1>

                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div>
                <style type="text/css">
                    .tftable {font-size:14px;color:#333333;width:100%;border-width: 1px;border-color: #c70039;border-collapse: collapse;}
                    .tftable th {font-size:14px;background-color:#c70039;border-width: 1px;padding: 8px;border-style: solid;border-color: #c70039;text-align:left;}
                    .tftable tr {background-color:#FFFFFF;}
                    .tftable td {font-size:14px;border-width: 1px;padding: 8px;border-style: solid;border-color: #c70039;}
                </style>

                <h2 class="d-block mb-3 caption" data-aos="fade-up">Evènements</h2>
<!--            Table des évènements-->
                <?php

                $sth = $dbh -> prepare('SELECT * FROM Events WHERE id_client=:client_id');
                $sth->execute(array(':client_id' => $_SESSION['id']));
                $eventsInfo = $sth -> fetchAll(PDO::FETCH_ASSOC);
                $sth->closeCursor();

                if(empty($eventsInfo)) {
                    echo '<p data-aos="fade-up">Vous n\'avez aucun évènements</p>';
                } else {
                    echo '<table class="tftable" border="1" data-aos="fade-up">';
                    echo '<tr><th>Nom</th><th>Date du début</th><th>Date de fin</th><th>Adresse</th><th></th></tr>';

                    foreach ($eventsInfo as $event) {
                        echo '<tr><td>' .
                            $event["event_name"] . '</td><td>' .
                            $event["date_from"] . '</td><td>' .
                            $event["date_to"] . '</td><td>' .
                            $event["event_address"] . '</td><td>' .
                            '<span class="close btnDelEvent" data-idEvent="' . $event["id_event"] . '">&times;</span></td></tr>';
                    }

                    echo '</table>';
                }
                ?>
                <div id="dialog"></div>
                <script>
                    $(function() {

                        // next add the onclick handler
                        $(".btnDelEvent").click(function() {
                            $("#dialog").dialog("");
                        });
                    });
                </script>
            </div>

            <!-- affiche les scenes liés au client -->
            <div>
                <h2 class="d-block mb-3 caption" data-aos="fade-up">Scènes</h2>
                <?php
                $sth = $dbh -> prepare('SELECT event_name,stage_name,stage_latitude,stage_longitude,max_people,hour_from,hour_to FROM Stages JOIN Events ON Stages.id_event = Events.id_event WHERE id_client=:client_id');
                $sth->execute(array(':client_id' => $_SESSION['id']));
                $stageInfo = $sth -> fetchAll(PDO::FETCH_ASSOC);
                $sth->closeCursor();

                if(empty($stageInfo)) {
                    echo '<p data-aos="fade-up">Vous n\'avez aucune stage</p>';
                } else {
                    echo '<table class="tftable" border="1" data-aos="fade-up">';
                    echo '<tr><th>Nom de l\'évènement</th><th>Nom de la scène</th><th>Latitude</th><th>Longitude</th><th>Max participants</th><th>Heure de début</th><th>Heure de fin</th><th></th></tr>';

                    foreach ($stageInfo as $stage) {
                        echo '<tr><td>' .
                            $stage["event_name"] . '</td><td>' .
                            $stage["stage_name"] . '</td><td>' .
                            $stage["stage_latitude"] . '</td><td>' .
                            $stage["stage_longitude"] . '</td><td>' .
                            $stage["max_people"] . '</td><td>' .
                            $stage["hour_from"] . '</td><td>' .
                            $stage["hour_to"] . '</td><td>' .
                            '<span class="close btnDelStage" data-idStage="' . $stage["id_stage"] . '">&times;</span></td></tr>';
                    }

                    echo '</table>';
                    echo'<p data-aos="fade-up">Voir ses <a href="statistiques.php">statistiques</a>.</p>';
                }

                ?>

            </div>

            <!-- forumlaire pour que le client rajoute un evenement lui même -->
            <div class="row">
                <div class="col-md-6" >
                    <form id= "formEvent" class="event-form" action="addEvent.php" method="post">
                        <h2 class="d-block mb-3 caption" data-aos="fade-up">Ajouter un évènement</h2>
                        <div class="row form-group" data-aos="fade-up">
                            <div class="col-md-12">
                                <label class="" for="nomEvenement">Nom de l'évènement*</label>
                                <input type="text"  id="nomEvenement" class="input form-control" name="nomEvenement" placeholder="Nom de lévènement" required>
                            </div>
                        </div>

                        <div class="row form-group" data-aos="fade-up">
                            <div class="col-md-12">
                                <label class="" for="dateFrom" >Dates*</label>
                                <input type="text" id="dateFrom"  class="input form-control" name="dateFrom" placeholder="Date du début de l'évènement" required>
                                <input type="text" id="dateTo"  class="input form-control" name="dateTo" placeholder="Date de la fin de l'évènement" required>

                            </div>
                        </div>
                        <div class="row form-group" data-aos="fade-up">
                            <div class="col-md-12">
                                <label class="" for="adresseEvent">Adresse*</label>
                                <input type="text" id="adresseEvent"  class="input form-control" name="adresseEvent" placeholder="L'adresse de l'évènements (Village - Ville)" required>
                            </div>
                        </div>
                        <div class="row form-group" data-aos="fade-up">
                            <div class="col-md-12">
                                <label class="" for="informationsEvent">Informations</label>
                                <textarea class="input form-control" placeholder="Informations utiles à savoir sur votre évènement" id="informationsEvent" name="informationsEvent" ></textarea>
                            </div>
                        </div>
                        <div class="row form-group" data-aos="fade-up">
                            <div class="col-md-12">
                                <input  name="subEvent" type="submit" id="submitEvenement" value="Ajouter un évènement" class="btn btn-primary py-2 px-4 text-white">
                            </div>
                        </div>
                    </form>

                    <form id= "formStage" class="stage-form" action="addStage.php" method="post">
                        <h2 class="d-block mb-3 caption" data-aos="fade-up">Ajouter une scène</h2>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="" for="nomEvent">Evènement</label>
                                <select id="nomEvent" name="nomEvent" size="1">

                                <?php

                                if(empty($eventsInfo)) {
                                    echo '<option value="-1">Aucun évenements</option>';
                                } else {
                                    foreach ($eventsInfo as $event) {
                                        echo '<option value="' . $event["id_event"] . '">' . $event["event_name"] . '</option>' ;
                                    }
                                }

                                ?>

                                </select>
                            </div>
                        </div>
                         <!-- forumlaire pour que le client rajoute une scene lui même -->
                        <div class="row form-group" data-aos="fade-up">
                            <div class="col-md-12">
                                <label class="" for="nom">Nom*</label>
                                <input type="text" id="nom"  class="input form-control" name="nameStage" placeholder="Nom de la scène à ajouter" required>
                            </div>
                        </div>
                        <div class="row form-group" data-aos="fade-up">
                            <div class="col-md-12">
                                <label class="" for="coordonnees">Coordonnées*</label>
                                <input type="text" id="coordonnees"  class="input form-control" name="lat" placeholder="Latitude" required>
                                <input type="text" id="coordonnees"  class="input form-control" name="long" placeholder="Longitude" required>
                            </div>
                        </div>
                        <div class="row form-group" data-aos="fade-up">
                            <div class="col-md-12">
                                <label class="" for="nbrParticipants">Nombre max de participants*</label>
                                <input type="text" id="nbrParticipants"  class="input form-control" name="nbPart" placeholder="Estimation" required>
                            </div>
                        </div>
                        <div class="row form-group" data-aos="fade-up">
                            <div class="col-md-12">
                                <label class="" for="horaires">Horaires</label>
                                <input type="text" id="horaires"  class="input form-control" name="heureDebut" placeholder="Heure de début">
                                <input type="text" id="horaires"  class="input form-control" name="heurefin" placeholder="Heure de fin">
                            </div>
                        </div>
                        <div class="row form-group" data-aos="fade-up">
                            <div class="col-md-12">
                                <input  name="envoi" type="submit" id="submitContact" value="Ajouter une scène" class="btn btn-primary py-2 px-4 text-white">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="site-footer">
        <?php include("footer.php"); ?>
    </footer>

</div>

<!--<script src="js/jquery-migrate-3.0.1.min.js"></script>-->
<!--<script src="js/popper.min.js"></script>-->
<!--<script src="js/bootstrap.min.js"></script>-->
<!--<script src="js/owl.carousel.min.js"></script>-->
<!--<script src="js/jquery.stellar.min.js"></script>-->
<!--<script src="js/jquery.countdown.min.js"></script>-->
<!--<script src="js/jquery.magnific-popup.min.js"></script>-->
<script src="js/aos.js"></script>
<!---->
<script src="js/main.js"></script>

</body>
</html>
