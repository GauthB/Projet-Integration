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


    <header class="site-navbar py-3" role="banner">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-11 col-xl-2">
                    <h1 class="mb-0"><a href="index.php" class="text-white h2 mb-0">People<span class="text-primary">Flux</span> </a></h1>
                    <span class="d-block mb-3 caption" data-aos="fade-up">Compte: <?=$_SESSION['name']?> </span>
                </div>

                <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>
            </div>
        </div>

    </header>




    <div class="site-section">
        <div class="container" data-aos="fade-up">
            <style type="text/css">

                hr {
                    border-top: 1px solid red
                }
            </style>
<?php
            $sth = $dbh -> prepare('SELECT * FROM Events WHERE id_client=:client_id');
            $sth->execute(array(':client_id' => $_SESSION['id']));
            $eventsInfo = $sth -> fetchAll(PDO::FETCH_ASSOC);
            $sth->closeCursor();

            if(empty($eventsInfo)) {
            echo '<p data-aos="fade-up">Vous n\'avez aucun évènements</p>';
            } else {



                foreach ($eventsInfo as $event) {


                    echo '<input style="

background:    #d84e31;
border:        1px solid #000000;
border-radius: 12px;
padding:       5px 12px;
color:         #ffffff;
display:       inline-block;
font:          "Calibri", sans-serif;
text-align:    center;
text-shadow:   0px 0px #000000;

" type="button" value="' . $event["event_name"] .  $eventName['id_event']  . '"></br>';


                    echo' <SELECT name="nom" size="1">';




                    //$sth2->execute(array(':event_id' => $_EVENT['id_event']));
                    $sth2 = $dbh -> prepare('SELECT stage_name FROM Stages WHERE id_event');
                    $sth2->execute(array(':client_id' => $_SESSION['id']));
                    $difEvent = $sth2 -> fetchAll(PDO::FETCH_ASSOC);
                    $sth2->closeCursor();

                    if(empty($difEvent)) {
                        echo '<option>Vous n\'avez aucune stage</option>';
                    } else {

                        foreach ($difEvent as $event) {
                            echo ' <option>' .
                                $event["stage_name"] . '</option>' ;
                        }


                    }




            echo'</SELECT><br><br>';

echo'<hr>';







                }


            }
            ?>

<!--

-->








            <div>
                <style type="text/css">
                    .tftable {font-size:14px;color:#333333;width:100%;border-width: 1px;border-color: #c70039;border-collapse: collapse;}
                    .tftable th {font-size:14px;background-color:#c70039;border-width: 1px;padding: 8px;border-style: solid;border-color: #c70039;text-align:left;}
                    .tftable tr {background-color:#FFFFFF;}
                    .tftable td {font-size:14px;border-width: 1px;padding: 8px;border-style: solid;border-color: #c70039;}
                </style>



            </div>


                <!-- affiche les statistiques liés à un evennement -->
                <table class="tftable" border="1" data-aos="fade-up">
                    <?php $data = new data();
                    echo '<div class="d-block mb-3 caption" data-aos="fade-up"></br><h2>Statistiques public</h2>';
                    echo '<br>' . $data->afficheStat("public",$_SESSION['id']);
                    echo'<div class="d-block mb-3 caption" data-aos="fade-up"></br><h2>Statistiques privées</h2>';
                    echo '<br>' . $data->afficheStat("prive",$_SESSION['id']). '</table>';

                    ?>
            </div>

        </div></div>


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
