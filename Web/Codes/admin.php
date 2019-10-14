<!DOCTYPE html>
<html lang="en">
<head>
    <title>PeopleFlux Contact</title>
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
                            <li><a href="pageContact.php">Contacts</a></li>
                            <li class="cta"><a href="user.php">S'identifier</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>
            </div>
        </div>

    </header>

    <div class="site-section site-hero inner ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <span class="d-block mb-3 caption" data-aos="fade-up">Nom du client...</span>
                    <h1 class="d-block mb-4" data-aos="fade-up" data-aos-delay="100">Bienvenue dans l'interface!</h1>

                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6" data-aos="fade-up">
                    <br id= "formContact" class="contact-form" action="" method="post">

                        <form>
                            <h2 class="d-block mb-3 caption" data-aos="fade-up">Ajouter un évènement</h2>
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
