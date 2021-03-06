<?php
require_once "php/db_connect.php";




session_start();

if (!isset($_SESSION['id']) && $_SESSION['ifAdmin'] != true) {
    header('Location: index.php');
    exit;
}

if(isset($_POST['id'])){
    $sth = $dbh -> prepare('DELETE FROM Clients WHERE id_client = ?');
    $sth->execute([$_POST['id']]);
    exit();
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>PeopleFlux - Supression du client</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="LogoSmall.ico"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

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

    <?php include 'header.php' ?>

    <div class="site-section site-hero inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <h1 class="d-block mb-4" data-aos="fade-up" data-aos-delay="100">Suppression d'un client</h1>
                </div>
            </div>
        </div>
    </div>

    <div style="margin-bottom: 200px;">
        <div class="container">
            <div>

                <div id="dialogClient"><p>Êtes-vous sûr de vouloir supprimer "<span id="spnClientName"></span>"?</p></div>

                <h2 class="d-block mb-3 caption" data-aos="fade-up">Clients</h2>
                <!-- Table des clients-->
                <?php

                $clientInfoQuery = $dbh->query('SELECT * FROM Clients ');
                $clientInfos = $clientInfoQuery->fetchAll(PDO::FETCH_ASSOC);
                $clientInfoQuery->closeCursor();






                echo '<table class="tftable" id="tablee" border="1" data-aos="fade-up">';
                echo '<tr><th>Nom</th><th>Mail</th><th>Tél.</th><th>Suppression</th></tr>';

        foreach ($clientInfos as $client) {
            echo '<tr><td>' .
                $client["client_name"] . '</td><td>' .
                $client["client_mail"] . '</td><td>' .
                $client["client_phone"] . '</td><td style="text-align: right;">';

            if($client['client_mail']=='peopleflux@gmail.com'){
                echo'<i  class="fas fa-user-lock"></i>';

            }
            else{
                echo'<span  class="close btnDuClient" data-idClient="' . $client["id_client"].'" ><i class="fas fa-backspace"></i></span>';

            }

                echo'</td></tr>';
        }
                echo'</table>';
        ?>



            </div>
        </div>
    </div>
</div>


<footer class="site-footer">

    <?php
    include("footer.php");
    ?>
</footer>

</div>
<script>

    $( "#dialogClient" ).dialog({
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
                    $.post('delClient.php', {id: $("#dialogClient").data('idClient')}, function (data) {
                        location.reload();
                        console.log(data);
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

    $(".btnDuClient").click(function() {
        $('#spnClientName').html($(this).closest('tr').children().first().html());
        $("#dialogClient").data('idClient', $(this).attr('data-idClient')).dialog("open");
        return false;
    });


</script>

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
