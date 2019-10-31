<?php require_once("esp-data.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>PeopleFlux - Lieux</title>
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
      <link rel="stylesheet" href="css/add.css">
      <link rel="icon" type="image/x-icon" href="LogoSmall.ico"/>
    <link rel="stylesheet" href="css/style.css">




    <!------------->

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
          integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
          crossorigin=""/>

      <!-- Make sure you put this AFTER Leaflet's CSS -->
      <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
              integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
              crossorigin=""></script>




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





    <div class="site-section site-hero inner">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-10">
            <span class="d-block mb-3 caption" data-aos="fade-up">Y a-t-il du monde?...</span>
            <h1 class="d-block mb-4" data-aos="fade-up" data-aos-delay="100">Lieux</h1>
          </div>
        </div>
      </div>
    </div>



    <div class="site-section">
<!-- appel du fichier qui affichera les boutons, la maps avec ses boutons, informations sur l'evenement, etc ... -->
      <?php include("map.php"); ?>

    </div>



    <footer class="site-footer">
      <!-- appel du footer -->
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
