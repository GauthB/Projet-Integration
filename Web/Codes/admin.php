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
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/contact.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="LogoSmall.ico"/>
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

                    <?php

                    $sth = $dbh -> prepare('SELECT * FROM Events WHERE id_client=:client_id');
                    $sth->execute(array(':client_id' => $_SESSION['id']));
                    $eventsInfo = $sth -> fetchAll(PDO::FETCH_ASSOC);
                    $sth->closeCursor();

                    if(empty($eventsInfo)) {
                        echo '<p data-aos="fade-up">Vous n\'avez aucun évènements</p>';
                    } else {
                        echo '<table class="tftable" border="1" data-aos="fade-up">';
                        echo '<tr><th>Nom</th><th>Date du début</th><th>Date de fin</th><th>Adresse</th></tr>';

                        foreach ($eventsInfo as $event) {
                            echo '<tr><td>' . $event["event_name"] . '</td><td>' . $event["date_from"] . '</td><td>' . $event["date_to"] . '</td><td>' . $event["event_address"] . '</td></tr>';
                        }

                        echo '</table>';
                    }
                    ?>

            </div>

<!-- affiche les scenes liés au client -->

<?php
$sql3 = <<< EOT
            SELECT *  
            FROM Stages
            WHERE id_stage=5;
EOT;
?>

            <div>
                <table class="tftable" border="1" data-aos="fade-up">
                </br><h2 class="d-block mb-3 caption" data-aos="fade-up">Scènes</h2>
                    <tr><th>Nom de l'évènement</th><th>Nom de la scène</th><th>Latitude</th><th>Longitude</th><th>Max participants</th><th>Heure de début</th><th>Heure de fin</th></tr>
                    <tr>
                        <td>
                            NOM DE L'EVENEMENT
                        </td>
                        <td>
                            <?php try {
                                $sth3 = $dbh -> prepare($sql3);
                                $sth3 -> execute();
                                $infos3 = $sth3 -> fetchAll(PDO::FETCH_ASSOC);
                                print_r($infos3[0]["stage_name"].
                                    "</td> <td>".
                                    $infos3[0]["stage_latitude"].
                                    "</td> <td>".
                                    $infos3[0]["stage_longitude"].
                                    "</td> <td>".
                                    $infos3[0]["max_people"].
                                    "</td> <td>".
                                    $infos3[0]["hour_from"].
                                    "</td> <td>".
                                    $infos3[0]["hour_to"]);

                            } catch (Exception $e) {
                                print "Erreur !:" .$e -> getMessage()."<br/>";
                                die();

                            }?>
                    </tr>
                    <tr><td>Row:2 Cell:1</td><td>Row:2 Cell:2</td><td>Row:2 Cell:3</td><td>Row:2 Cell:4</td><td>Row:2 Cell:5</td><td>Row:2 Cell:6</td><td>Row:2 Cell:6</td></tr>
                </table>
            </div>
            <div class="d-block mb-3 caption" data-aos="fade-up"></br><h2>Statistique privé</h2>
        
        <!-- affiche les statistiques liés à un evennement -->
                <table class="tftable" border="1" data-aos="fade-up">
                    <?php $data = new data();
                    echo '<br>' . $data->afficheStat("prive"). '</table>';
                    echo '<br>' . $data->afficheStat("public");
                    ?>
            </div>
            <div class="row">
                <div class="col-md-6" data-aos="fade-up">
                    <br id= "formContact" class="contact-form" action="" method="post">
                        
                    <!-- forumlaire pour que le client rajoute un evenement lui même -->
                        <form>
                        </br> <h2 class="d-block mb-3 caption" data-aos="fade-up">Ajouter un évènement</h2>
                                <div class="border-top pt-5" data-aos="fade-up">
                                </div>
                                <h4>
                                    <div class="row form-group" data-aos="fade-up">

                                        <div class="col-md-12">
                                                <label class="" for="email">Nom de l'évènement</label>
                                                <input type="email"  id="email" class="input form-control" name="votremail" placeholder="Nom de lévènement">
                                        </div>
                                    </div>

                                    <div class="row form-group" data-aos="fade-up">
                                        <div class="col-md-12">
                                            <label class="" >Dates</label>
                                            <input type="text" id="objet"  class="input form-control" name="objet" placeholder="Date du début de l'évènement">
                                            <input type="text" id="objet"  class="input form-control" name="objet" placeholder="Date de la fin de l'évènement">
                                        </div>
                                    </div>
                                    <div class="row form-group" data-aos="fade-up">
                                        <div class="col-md-12">
                                            <label class="" >Adresse</label>
                                            <input type="text" id="objet"  class="input form-control" name="objet" placeholder="L'adresse">
                                        </div>
                                    </div>
                                    <div class="row form-group" data-aos="fade-up">
                                        <div class="col-md-12">
                                            <label class="" for="message">Informations</label>
                                            <textarea class="input form-control" placeholder="Informations utiles à savoir sur votre évènement" id="message" name="message" ></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group" data-aos="fade-up">
                                        <div class="col-md-12">
                                            <input  name="envoi" type="submit" id="submitContact" value="Ajouter un évènement" class="btn btn-primary py-2 px-4 text-white">
                                        </div>
                                    </div>
                                </h4>

                            </br> <h2 class="d-block mb-3 caption" data-aos="fade-up">Ajouter une scène</h2>
                                <div class="border-top pt-5" data-aos="fade-up">

                                </div>


                                <h4>
                                    <div class="row form-group" data-aos="fade-up">
                                        <div class="col-md-12">
                                            <label class="" for="message">Evènement</label>
                                                <form>
                                                    <SELECT name="nom" size="1">



                                                    </SELECT>
                                                </form>
                                         </div>
                                    </div>
                                     <!-- forumlaire pour que le client rajoute une scene lui même -->
                                    <div class="row form-group" data-aos="fade-up">
                                        <div class="col-md-12">
                                            <label class="" for="message">Nom</label>
                                            <input type="text" id="objet"  class="input form-control" name="objet" placeholder="Nom de la scène à ajouter">
                                        </div>
                                    </div>
                                    <div class="row form-group" data-aos="fade-up">
                                        <div class="col-md-12">
                                            <label class="" for="message">Coordonnées</label>
                                            <input type="text" id="objet"  class="input form-control" name="objet" placeholder="Latitude">
                                            <input type="text" id="objet"  class="input form-control" name="objet" placeholder="Longitude">
                                        </div>
                                    </div>
                                    <div class="row form-group" data-aos="fade-up">
                                        <div class="col-md-12">
                                            <label class="" for="message">Nombre max de participants</label>
                                            <input type="text" id="objet"  class="input form-control" name="objet" placeholder="Estimation">
                                        </div>
                                    </div>
                                    <div class="row form-group" data-aos="fade-up">
                                        <div class="col-md-12">
                                            <label class="" for="message">Horaires</label>
                                            <input type="text" id="objet"  class="input form-control" name="objet" placeholder="Heure de début">
                                            <input type="text" id="objet"  class="input form-control" name="objet" placeholder="Heure de fin">
                                        </div>
                                    </div>
                                    <div class="row form-group" data-aos="fade-up">
                                        <div class="col-md-12">
                                            <input  name="envoi" type="submit" id="submitContact" value="Ajouter une scène" class="btn btn-primary py-2 px-4 text-white">
                                        </div>
                                    </div>
                                </h4>
                        </form>
                    <div id="errorContact"></div>
                </div>
            </div>
        </div>
    </div>




    <footer class="site-footer">
        <?php include("footer.php"); ?>
    </footer>

</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/aos.js"></script>

<script src="js/main.js"></script>

</body>
</html>
