<!DOCTYPE html>
<html lang="en">
<head>
    <title>PeopleFlux - Ajout client</title>
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
                </div>
                <div class="col-12 col-md-10 d-none d-xl-block">
                    <nav class="site-navigation position-relative text-right" role="navigation">
                        <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                            <li><a href="index.php">Accueil</a></li>
                            <li><a href="info.php">A propos</a></li>
                            <li><a href="equipe.php">Groupe</a></li>
                            <li><a href="lieux.php">Lieux</a></li>
                            <li><a href="pageContact.php">Contact</a></li>
                            <li class="cta"><a href="user.php">S'identifier</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>
            </div>
        </div>

    </header>



    <?php
    if (isset($_POST['mot_de_passe']) AND $_POST['mot_de_passe'] ==  "FluxPeopleEphec1") // Si le mot de passe est bon
    {?>

    <div class="site-section site-hero inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <h1 class="d-block mb-4" data-aos="fade-up" data-aos-delay="100">Ajout d'un client</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6" data-aos="fade-up">
                    <form style="margin: 0 auto; width: 300px;" id= "formContact" class="contact-form" action="" method="post">

                        <div class="row form-group">

                            <div " class="col-md-12">
                            <label class="" for="email">Nom du client*</label>
                            <input type="email"  id="email" class="input form-control" name="votremail" placeholder="Client">
                        </div>
                </div>

                <div class="row form-group">

                    <div class="col-md-12">
                        <label class="" >Mot de passe*</label>
                        <input type="text" id="objet"  class="input form-control" name="objet" placeholder="Mdp">
                    </div>
                </div>

                <div class="row form-group">

                    <div class="col-md-12">
                        <label class="" >Adresse mail*</label>
                        <input type="text" id="objet"  class="input form-control" name="objet" placeholder="Mail">
                    </div>
                </div>

                <div class="row form-group">

                    <div class="col-md-12">
                        <label class="" >Numéro de tél.</label>
                        <input type="text" id="objet"  class="input form-control" name="objet" placeholder="Tél.">
                    </div>
                </div>




                <div class="row form-group">
                    <div class="col-md-12">

                        <input  name="envoi" type="submit" id="submitContact" value="Ajouter" class="btn btn-primary py-2 px-4 text-white">

                    </div>
                </div>


                </form>
                <div id="errorContact"></div>
            </div>
        </div>
    </div>
</div>


<?php
}
else // Sinon, on affiche un message d'erreur
{?>
    <div class="site-section site-hero inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-10">

                    <h1 class="d-block mb-4" data-aos="fade-up" data-aos-delay="100">Mot de passe incorrect</h1>
                    <span class="d-block mb-3 caption" data-aos="fade-up">Bien essayé petit filou!</span>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>

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
