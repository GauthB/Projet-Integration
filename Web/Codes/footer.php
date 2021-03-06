<?php
session_start();
?>
<div class="container">
    <div class="row mb-5">
        <div class="col-md-4">
            <h2 class="footer-heading text-uppercase mb-4">A propos</h2>
            <p>Ceci est une invention due à notre projet d'intégration.</p>
            <?php if(isset($_SESSION['id'])):?>
            <hr style=" border-top: 1px solid red">
                <p>Lire le <a href="images/RGPD-PeopleFlux.pdf">"Règlement général sur la protection des données"</a></p>
            <?php endif?>
        </div>
        <div class="col-md-3 ml-auto">
            <h2 class="footer-heading text-uppercase mb-4">Liens</h2>
            <ul class="list-unstyled">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="info.php">A propos</a></li>
                <li><a href="equipe.php">Groupe</a></li>
                <li><a href="lieux.php">Lieux</a></li>
                <li><a href="pageContact.php">Contacts</a></li>
            </ul>
        </div>
        <div class="col-md-4">
            <h2 class="footer-heading text-uppercase mb-4">Contactez-nous</h2>
            <p>
                <a href="pageContact.php" class="p-2 pl-0"><span> People Flux </span></a>

            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">

            <div class="border-top pt-5">
                <p>
                    &copy; <script>document.write(new Date().getFullYear());</script> Team People Flux</a>
                </p>
            </div>
        </div>
    </div>
</div>
