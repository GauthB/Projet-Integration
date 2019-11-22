<?php
session_start();
?>
<header class="site-navbar py-3" role="banner">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-11 col-xl-2   ">
                <h1 class="mb-0"><a href="index.php" class="text-white h2 mb-0"><img src="images/LogoSmall.png" height="100px"></span> </a></h1>
                <!-- <h1 class="mb-0"><a href="index.php" class="text-white h2 mb-0">People<span class="text-primary" style="color: #e74c3c">Flux</span> </a></h1>-->
            </div>
            <div class="col-12 col-md-10 d-none d-xl-block">
                <nav class="site-navigation position-relative text-right" role="navigation" id="header">
                    <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="lieux.php">Lieux</a></li>
                        <li><a href="info.php">A propos</a></li>
                        <li><a href="equipe.php">Groupe</a></li>
                        <li><a href="pageContact.php">Contact</a></li>
                        <!-- Déc-id en fonction de si le client est connecté ou pas -->
                        <?php if(isset($_SESSION['id'])):?>
                            <li><a href="admin.php">Evènements</a></li>
                            <a href="statistiques.php"> <i class="fas fa-chart-bar"></i></a>
                            <li class="cta"><a href="logout.php">Déconnexion</a></li>
                        <?php else:?>
                            <li class="cta"><a href="user.php">S'identifier</a></li>
                        <?php endif?>
                    </ul>
                </nav>
            </div>
            <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>
        </div>
    </div>

</header>
<!-- pour rajouter className=active, pour que la page selectionnée dans le menu soit soulignée -->
<script>
    var url = window.location.href;
    var li = document.querySelectorAll('#header li a');
    for (var i=0; i<li.length; i++) {
        if(url === li[i].href) {
            li[i].parentNode.className = 'active';
        }
    }
</script>

