<?php
require_once "db_connect.php";
require_once "php/function.php";
$errors = array();
$messages = array();

session_start();


if(!isset($_SESSION['id'])) {
    header('Location: index.php');
    exit;
}

if(!empty($_POST)) {
// Change nom
    if(isset($_POST['nom'])) {
        $sth = $dbh->prepare('UPDATE Clients SET client_name = :client_name WHERE id_client = :id_client');
        $sth->execute([':client_name' => $_POST['nom'], ':id_client' => $_SESSION['id']]);
        $_SESSION['name'] = $_POST['nom'];
        array_push($messages, 'Votre nom à bien été mit à jour');
    }
// Change mail
    elseif (isset($_POST['mail']) && filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        $sth = $dbh->prepare('UPDATE Clients SET client_mail = :client_mail WHERE id_client = :id_client');
        $sth->execute([':client_mail' => $_POST['mail'], ':id_client' => $_SESSION['id']]);
        $_SESSION['name'] = $_POST['mail'];
        array_push($messages, 'Votre email à bien été mit à jour');

    }
// Change mot de passe
    elseif (isset($_POST['password']) && isset($_POST['password_confirm'])) {
        if(strcmp($_POST['password'], $_POST['password_confirm']) == 0) {
            $sth = $dbh->prepare('UPDATE Clients SET client_password = :client_password WHERE id_client = :id_client');
            $sth->execute([':client_password' => password_hash($_POST['password'], PASSWORD_DEFAULT), ':id_client' => $_SESSION['id']]);
            array_push($messages, 'Votre mot de passe à bien été mit à jour');
        } else {
            array_push($errors, 'Vos mots de passe ne coresponde pas.');
        }
    }
// Change Téléphone
    elseif (isset($_POST['tel'])) {
        $phone =  validate_phone_number($_POST['tel']);
        if($phone) {
            $sth = $dbh->prepare('UPDATE Clients SET client_phone = :client_phone WHERE id_client = :id_client');
            $sth->execute([':client_phone' => $phone, ':id_client' => $_SESSION['id']]);
            array_push($messages, 'Votre téléphone à bien été mit à jour');
            $_SESSION['phone'] = $phone;
        } else {
            array_push($errors, 'Le numéro de téléphone que vous avez introduit n\'est pas correct');
        }
    } else {
        array_push($errors, 'Une erreur lors de l\'enregistrement s\'est produite');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>PeopleFlux - Reglages</title>
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

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

<?php include 'header.php' ?>

<div class="site-section site-hero inner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-10">
                <h1 class="d-block mb-4" data-aos="fade-up" data-aos-delay="100">En construction</h1>
                <h1 class="d-block mb-4" data-aos="fade-up" data-aos-delay="100">Info compte <?=$_SESSION['name']?></h1>
            </div>
        </div>
    </div>
</div>

<div style="margin-bottom: 200px;">
    <div class="container">
        <div class="row ">
            <div class="col-md-6" data-aos="fade-up">

                <?php
                if(count($errors) > 0) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                    foreach ($errors as $error) {
                        echo $error . '<br>';
                    }
                    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                    echo '</div>';
                }

                if(count($messages) > 0) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                    foreach ($messages as $message) {
                        echo $message . '<br>';
                    }
                    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                    echo '</div>';
                }

                ?>
                <div class="row form-group">
                    <div class="col-md-12">
                        <form method="post" action="userReglages.php">
                            <label for="nom"><i class="fas fa-redo-alt"></i> Votre nom: <?=$_SESSION['name']?></label>
                            <input id='nom' type="text" name="nom" placeholder="<?php echo$_SESSION['name'];  ?> "   class="input form-control"required >
                            <input type="submit" class="boutonstats" value="Changer">
                        </form>
                    </div>
                </div>


                <div class="row form-group">
                    <div class="col-md-12">
                        <form method="post" action="userReglages.php">
                            <label for="email">Adresse mail</label>
                            <input id='email' type="email" name="mail" placeholder="<?php echo $_SESSION['mail'];  ?>"  class="input form-control" required>
                            <input type="submit" class="boutonstats" value="Changer">
                        </form>
                    </div>
                </div>

                <div class="row form-group">

                    <div class="col-md-12">
                        <form method="post" action="userReglages.php">
                            <label for="password">Mot de passe</label>
                            <input id="password" type="password" name="password" placeholder="******" required class="input form-control" >
                            <label for="password_confirm">Confirmer mot de passe</label>
                            <input id="password_confirm" type="password" name="password_confirm" placeholder="******" required class="input form-control" >
                            <input type="submit" class="boutonstats" value="Changer">
                        </form>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <form method="post" action="userReglages.php">
                            <label for="tel" >Numéro de tél.</label>
                            <input id="tel" type="text" class="input form-control" name="tel" placeholder="<?php echo $_SESSION['phone'];  ?>" required>
                            <input type="submit" class="boutonstats" value="Changer">
                        </form>
                    </div>
                </div>



                <div class="row form-group">
                    <div class="col-md-12">

                       <!-- <input type="submit" name="sub" value="mise à jour" class="btn btn-primary py-2 px-4 text-white">-->

                    </div>
                </div>

                <div id="errorContact"></div>
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
