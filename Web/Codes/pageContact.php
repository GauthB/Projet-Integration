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
                <li class="active"><a href="pageContact.php">Contacts</a></li>
                <li class="cta"><a href="user.php">S'identifier</a></li>
              </ul>
            </nav>
          </div>
          <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>
        </div>
      </div>

    </header>

    <div class="site-section site-hero inner">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-10">
            <span class="d-block mb-3 caption" data-aos="fade-up">N'hésitez pas!</span>
            <h1 class="d-block mb-4" data-aos="fade-up" data-aos-delay="100">Contactez-nous</h1>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6" data-aos="fade-up">
            <form id= "formContact" class="contact-form" action="" method="post">

<!--
              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="" for="fname">First Name</label>
                  <input type="text" id="fname" class="form-control">
                </div>
                <div class="col-md-6">
                  <label class="" for="lname">Last Name</label>
                  <input type="text" id="lname" class="form-control">
                </div>
              </div>
-->
                         <div class="row form-group">

                            <div class="col-md-12">
                              <label class="" for="email">Email</label>
                              <input type="email"  id="email" class="input form-control" name="votremail" placeholder="Votre email">
                            </div>
                          </div>

                          <div class="row form-group">

                            <div class="col-md-12">
                              <label class="" >sujet</label>
                              <input type="text" id="objet"  class="input form-control" name="objet" placeholder="Sujet">
                            </div>
                          </div>

                          <div class="row form-group">
                            <div class="col-md-12">
                              <label class="" for="message">Message</label>
                              <textarea class="input form-control" placeholder="Message" id="message" name="message" ></textarea>
                            </div>
                          </div>

                          <div class="row form-group">
                            <div class="col-md-12">
                              <input  name="envoi" type="submit" id="submitContact" value="Envoyer" class="btn btn-primary py-2 px-4 text-white">
                            </div>
                          </div>



           <!--   <div class="col-md-8 col-md-offset-2">
                <form id= "formContact" class="contact-form" action="" method="post">
                   //<input type="text"  id="nom" class="input" name="nom" placeholder="Votre Nom">

                  <input type="email"  id="email" class="input" name="votremail" placeholder="Votre email">

                  <input type="text" id="objet"  class="input" name="objet" placeholder="Sujet">
                  <textarea class="input" placeholder="Message" id="message" name="message" ></textarea>
                  <input class="main-btn" name="envoi" type="submit" id="submitContact" value="Envoyer" >

                </form>

                <div id="errorContact"></div>

              </div>-->




            </form>
            <div id="errorContact"></div>
          </div>
          <div class="col-md-5 ml-auto" data-aos="fade-up" data-aos-delay="100">
            <div class="p-4 mb-3">
              <p class="mb-0 font-weight-bold text-secondary text-uppercase mb-3">Addresse</p>
              <p class="mb-4"><a href="#">Louvain-la-Neuve</a></p>

              <p class="mb-0 font-weight-bold text-secondary text-uppercase mb-3">Tél.</p>
              <p class="mb-4"><a href="#">+32 472/30.76.70</a></p>

              <p class="mb-0 font-weight-bold text-secondary text-uppercase mb-3">Email</p>
              <p class="mb-0"><a href="#">peopleflux@gmail.com</a></p>

            </div>
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
