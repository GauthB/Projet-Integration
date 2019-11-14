<?php


require_once "db_connect.php";
$eventInfoQuery = $dbh->query('SELECT * FROM Events ORDER BY event_name ');
$eventInfos = $eventInfoQuery->fetchAll(PDO::FETCH_ASSOC);

?>


<div class="container">

    <link rel="stylesheet" href="css/add.css">
    <ul>
<!-- ################################    Boutton Event  ####################################-->
        <?php
        foreach ($eventInfos as $eventName) {
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

" type="button" value="' . $eventName['event_name'] . '" id="btn' . $eventName['id_event'] . '"></br></br>';
        }
        ?>
   </ul>

<!--  ####################################  Titre Event   ################################################-->
    <?php for ($i=0; $i<count($eventInfos); $i++): ?>
        <div id="title<?=$eventInfos[$i]['id_event']?>" class="eventInfo" <?php if($i != 0) echo 'style="display:none"'?>>
            <span class="d-block mb-3 caption" data-aos="fade-up" style="text-align: center;text-decoration: underline;"><i><?=$eventInfos[$i]['event_name']?></i></span>
        </div>
    <?php endfor;?>

    <div data-aos="fade-up" id="mapid" style=" height: 480px "></div>

<!--  ####################################  Info sur les évènements   ################################################-->
    <h2 data-aos="fade-up">Info</h2>

    <?php for ($i=0; $i<count($eventInfos); $i++): ?>
        <p data-aos="fade-up" id="description<?=$eventInfos[$i]['id_event']?>" class="eventInfo" <?php if($i != 0) echo 'style="display:none"'?>>
            <?=nl2br($eventInfos[$i]['event_description'])?>
        </p>
    <?php endfor;?>

    <script>

        <?php
        // Layer
        foreach ($eventInfos as $eventName) {
            echo "\n\t\t" . 'var layer' . $eventName['id_event'] . ' = L.layerGroup();';
        }
        echo 'var actifLayer = layer' . $eventInfos[0]['id_event'] . ';';

        // récupère les information sur les stages
        $stageQuery = $dbh->query("
        SELECT id_stage, stage_name, stage_latitude, stage_longitude, max_people, id_event
        FROM `Stages`");
        /* SELECT *
        FROM Stages JOIN Nbr_Personne ON Stages.id_stage = Nbr_Personne.id_stage
        WHERE Nbr_Personne.id_stage = 1
        */
        $stageInfo = $stageQuery->fetchAll(PDO::FETCH_ASSOC);

        // Créer les points sur la carte
        foreach ($stageInfo as $stage) {
            echo "\n\t\t" . 'L.marker([ ' . $stage['stage_latitude'] . ', ' . $stage['stage_longitude'] . ']).bindPopup("<b>' . $stage['stage_name'] . '</b><br>Il y a 0 participant(s)!<br> Le nombre maximum de participant est estimé à ' . $stage['max_people'] . '").addTo(layer' . $stage['id_event'] . ');';
        }
        ?>

        var mymap = L.map('mapid', {
            center: [50.668686, 4.612479],
            zoom: 16,
            layers: [actifLayer]
        });

        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox.satellite',
            accessToken: 'pk.eyJ1IjoiZ2F1dGhpZXJiIiwiYSI6ImNrMTQzODZuZDBlcDkzb29henlhMndvMnEifQ.nrVFAyoW00lvhk94CeCz0Q'
        }).addTo(mymap);

        //############################################################################################################
        // ############ Affiche de nouveau points lorsque l'on clique sur un boutton  ################################
        //############################################################################################################

        <?foreach ($eventInfos as $eventName) :?>
            document.getElementById('btn<?=$eventName['id_event']?>').onclick = function () {
                if (!mymap.hasLayer(layer<?=$eventName['id_event']?>)) {
                    mymap.removeLayer(actifLayer);
                    mymap.addLayer(layer<?=$eventName['id_event']?>);
                    actifLayer = layer<?=$eventName['id_event']?>;

                    var eventInfo = document.getElementsByClassName('eventInfo');
                    for (var i = 0; i < eventInfo.length; i++) {
                        eventInfo[i].style.display = 'none';
                    }
                    document.getElementById("title<?=$eventName['id_event']?>").style.display = 'block';
                    document.getElementById("description<?=$eventName['id_event']?>").style.display = 'block';

                }
            };
        <? endforeach;?>

    </script>
</div>