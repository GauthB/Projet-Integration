<?php
session_start();

if(!isset($_SESSION['id'])) {
    header('Location: index.php');
    exit;
}

require_once "php/db_connect.php";
require_once "esp-data.php";

?>
<!DOCTYPE html>
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

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
                    <h1 class="d-block mb-4" data-aos="fade-up" data-aos-delay="100">Bienvenue dans l'interface!</h1>



                </div>
            </div>
        </div>
    </div>

    <div style="margin-bottom: 200px;">
        <div class="container">
            <div>
                <div id="dialogEvent"><p>Êtes-vous sûr de vouloir supprimer l'évènement "<span id="spnEventName"></span>"?</p>Vous pourrez faire cette action si vous avez supprimé auparavant toutes les scènes liées à cette évènement!</div>
                <h2 class="d-block mb-3 caption" data-aos="fade-up">Evènements</h2>
                <!-- Table des évènements-->
                <?php

                $sth = $dbh -> prepare('SELECT * FROM Events WHERE id_client=:client_id');
                $sth->execute(array(':client_id' => $_SESSION['id']));
                $eventsInfo = $sth -> fetchAll(PDO::FETCH_ASSOC);
                $sth->closeCursor();

                if(empty($eventsInfo)) {
                    echo '<p data-aos="fade-up">Vous n\'avez aucun évènements</p>';
                } else {
                    echo '<table class="tftable" border="1" data-aos="fade-up">';
                    echo '<tr><th>Nom</th><th>Date du début</th><th>Date de fin</th><th>Ville</th><th>Adresse</th><th></th></tr>';

                    foreach ($eventsInfo as $event) {
                        echo '<tr><td>' .
                            $event["event_name"] . '</td><td>' .
                            $event["date_from"] . '</td><td>' .
                            $event["date_to"] . '</td><td>' .
                            $event["event_city"] . '</td><td>' .
                            $event["event_address"] . '</td><td>' .
                            '<span class="close btnDelEvent" data-idEvent="' . $event["id_event"] . '"><i class="fas fa-backspace"></i></span></td></tr>';
                    }

                    echo '</table>';
                }
                ?>

            </div>

            <!-- affiche les scenes liés au client -->
            <div>
                <div id="dialogStage"><p>Êtes-vous sûr de vouloir supprimer la scène "<span id="spnStageName"></span>"?</p></div>
                <br><h2 class="d-block mb-3 caption" data-aos="fade-up">Scènes</h2>
                <?php
                $sth = $dbh -> prepare('SELECT * FROM Stages JOIN Events ON Stages.id_event = Events.id_event WHERE id_client=:client_id');
                $sth->execute(array(':client_id' => $_SESSION['id']));
                $stageInfo = $sth -> fetchAll(PDO::FETCH_ASSOC);
                $sth->closeCursor();

                if(empty($stageInfo)) {
                    echo '<p data-aos="fade-up">Vous n\'avez aucune stage</p>';
                } else {
                    echo '<table class="tftable" id="tablee" border="1" data-aos="fade-up">';
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
                            '<span class="close btnDelStage" data-idStage="' . $stage["id_stage"] . '"><i class="fas fa-backspace"></i></span></td></tr>';
                    }

                    echo '</table>';
                }

                ?>

            </div>

            <style type="text/css">
                hr {
                    border-top: 1px solid red
                }
            </style>








            <!-- forumlaire pour que le client rajoute un evenement lui même -->
            <div class="row">
                <div class="col-md-6" data-aos="fade-up">
                    <form id= "formEvent" class="event-form" action="stageEvent/addEvent.php" method="post">
                        <br><hr data-aos="fade-up">
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
                                <input type="text" id="dateFrom"  class="input form-control" name="dateFrom" placeholder="Début (0000-00-00 24:00:00)" required>
                                <input type="text" id="dateTo"  class="input form-control" name="dateTo" placeholder="Fin (0000-00-00 24:00:00)" required>







   <!--                             <iframe name="InlineFrame1" id="InlineFrame1" style="width:180px;height:220px;" src="https://www.mathieuweb.fr/calendrier/calendrier-des-semaines.php?nb_mois=1&nb_mois_ligne=4&mois=&an=&langue=fr&texte_color=B9CBDD&week_color=DAE9F8&week_end_color=C7DAED&police_color=453413&sel=true" scrolling="no" frameborder="0" allowtransparency="true"></iframe>
-->







                            </div>
                        </div>
                        <div class="row form-group" data-aos="fade-up">
                            <div class="col-md-12">
                                <label class="" for="villeEvent">Ville*</label>
                                <input type="text" id="villeEvent"  class="input form-control" name="villeEvent" placeholder="La ville de l'évènements" required>
                            </div>
                        </div>
                        <div class="row form-group" data-aos="fade-up">
                            <div class="col-md-12">
                                <label class="" for="adresseEvent">Adresse*</label>
                                <input type="text" id="adresseEvent"  class="input form-control" name="adresseEvent" placeholder="La rue et numéro de l'évènement" required>
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

                    <!-- forumlaire pour que le client rajoute une scene lui même -->
                    <form id= "formStage" class="stage-form" action="stageEvent/addStage.php" method="post">
                        <br><hr data-aos="fade-up">
                        <h2 class="d-block mb-3 caption" data-aos="fade-up">Ajouter une scène</h2>
                        <div class="row form-group" data-aos="fade-up">
                            <div class="col-md-12">
                                <label class="" for="nomEvent">Evènement</label>
                                <select id="idEvent" name="idEvent" size="1">

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
                        <div class="row form-group" data-aos="fade-up">
                            <div class="col-md-12">
                                <label class="" for="nom">Nom*</label>
                                <input type="text" id="stageName"  class="input form-control" name="stageName" placeholder="Nom de la scène à ajouter" required>
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
<script>
    $(function() {
        // Dialog confirmation supression évènements
        $( "#dialogEvent" ).dialog({
            title: "Êtes-vous sûr?",
            autoOpen: false,
            modal: true,
            resizable: false,
            draggable: false,
            closeOnEscape: false,
            buttons: [
                {
                    text: "Oui",
                    click: function() {
                        $.post('stageEvent/delEvent.php', {id: $("#dialogEvent").data('idEvent')}, function (data) {
                            location.reload();
                        });
                        $( this ).dialog( "close" );
                    }
                },
                {
                    text: "Non",
                    click: function() {
                        $( this ).dialog( "close" );
                    }
                }
            ],
            open: function() { $(".ui-dialog-titlebar-close").hide(); }
        });

        $(".btnDelEvent").click(function() {
            $('#spnEventName').html($(this).closest('tr').children().first().html());
            $("#dialogEvent").data('idEvent', $(this).attr('data-idEvent')).dialog("open");
            return false;
        });

        // Dialog confirmation supression scène
        $( "#dialogStage" ).dialog({
            title: "Êtes-vous sûr?",
            autoOpen: false,
            modal: true,
            resizable: false,
            draggable: false,
            closeOnEscape: false,
            buttons: [
                {
                    text: "Oui",
                    click: function() {
                        $.post('stageEvent/delStage.php', {id: $("#dialogStage").data('idStage')}, function (data) {
                            location.reload();
                        });
                        $( this ).dialog( "close" );
                    }
                },
                {
                    text: "Non",
                    click: function() {
                        $( this ).dialog( "close" );
                    }
                }
            ],
            open: function() { $(".ui-dialog-titlebar-close").hide(); }
        });

        $(".btnDelStage").click(function() {
            $('#spnStageName').html($(this).closest('tr').children().first().next().html());
            $("#dialogStage").data('idStage', $(this).attr('data-idStage')).dialog("open");
            return false;
        });
    });
</script>

<script src="js/jquery-migrate-3.0.1.min.js"></script>
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
