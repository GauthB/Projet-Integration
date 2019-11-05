<!-- Connexion à la base de données-->
<?php
if(isset($_POST['envoi'])) {
    require_once "db_connect.php";
    
    $sql = 'SELECT id_client, client_name, client_mail, client_password
    FROM Clients
  WHERE client_mail = :client_mail';
    $sth = $dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array(':client_mail' => $_POST['votremail']));
    $user = $sth->fetch(PDO::FETCH_ASSOC);
    $sth->closeCursor();

    $isPasswordCorrect = password_verify($_POST['password'], $user['client_password']);
    if(!isset($user)) {
        echo "connection refusé";
    } else {
        if($isPasswordCorrect) {
            session_start();
            $_SESSION['id'] = $user['id_client'];
            $_SESSION['name'] = $user['client_name'];
            echo 'Vous êtes connecté !';
            header('Location: admin.php');
        }
        else {
            echo 'Mauvais identifiant ou mot de passe !';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>PeopleFlux - Identification</title>
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
    <link rel="icon" type="image/x-icon" href="LogoSmall.ico"/>
    <link rel="stylesheet" href="css/style.css">
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

    <?php include 'header.php'?>
    
    <!-- titre de la page-->
    <div class="site-section site-hero inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <span class="d-block mb-3 caption" data-aos="fade-up">Vous êtes gérant d'un évènement?</span>
                    <h1 class="d-block mb-4" data-aos="fade-up" data-aos-delay="100">Identifiez-vous!</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6" data-aos="fade-up">
                    <form style="margin: 0 auto;
     width: 300px;" id= "formContact" class="contact-form" action="" method="post">

                        <!-- formulaire-->
                        <div class="row form-group">
                            <div " class="col-md-12">
                            <label class="" for="email">Votre adresse mail</label>
                            <input type="email"  id="email" class="input form-control" name="votremail" placeholder="Mail">
                        </div>
                </div>
                                                                                                                          
                <div class="row form-group">
                    <div class="col-md-12">
                        <label class="" >Mot de passe</label>
                        <input type="password" id="password"  class="input form-control" name="password" placeholder="Mdp">
                    </div>
                </div>

                <!-- bouton-->
                <div class="row form-group">
                    <div class="col-md-12">

                        <input   name="envoi" type="submit" id="submitContact" value="S'identifier" class="btn btn-primary py-2 px-4 text-white">
                    </div>
                </div>


            </div>

            </form>
            <div id="errorContact"></div>
        </div>
    </div>
</div>
</div>


<!-- pied de page -->
<footer class="site-footer">
    <div class="container">
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
