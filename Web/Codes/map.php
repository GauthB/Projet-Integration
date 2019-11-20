<?php
require_once "db_connect.php";
$eventInfoQuery = $dbh->query('SELECT * FROM Events ORDER BY event_name ');
$eventInfos = $eventInfoQuery->fetchAll(PDO::FETCH_ASSOC);

// récupère les informations sur les scènes
$stageQuery = $dbh->query("SELECT * 
                  FROM Stages LEFT JOIN Nbr_Personne 
                  ON Stages.id_stage = Nbr_Personne.id_stage 
                  GROUP BY Stages.id_stage" );
$stageInfo = $stageQuery->fetchAll(PDO::FETCH_ASSOC);

require_once "esp-data.php";
$data = new data();
?>

<div class="container">

    <link rel="stylesheet" href="css/add.css">
    <ul>
<!-- ################################    Boutton Event  ####################################-->
        <?php
        foreach ($eventInfos as $eventName) {
            echo '<span class="boutonstats" value="' . $eventName['event_name'] . '" id="btn' . $eventName['id_event'] . '">'. $eventName['event_name'] .'</span></br></br>';
        }
        ?>
   </ul>

<!--  ####################################  Titre Event   ################################################-->
    <?php for ($i=0; $i<count($eventInfos); $i++): ?>
        <div id="title<?=$eventInfos[$i]['id_event']?>" class="eventInfo" <?php if($i != 0) echo 'style="display:none"'?>>
            <span class="d-block mb-3 caption" data-aos="fade-up" style="text-align: center;text-decoration: underline;"><i><?=$eventInfos[$i]['event_name']?></i></span>
        </div>
    <?php endfor;?>

    <!--  ####################################  Date   ################################################-->
    <?php for ($i=0; $i<count($eventInfos); $i++): ?>
        <div id="dates<?=$eventInfos[$i]['id_event']?>" class="eventInfo" <?php if($i != 0) echo 'style="display:none"'?>>
            <span class="d-block mb-3 caption" data-aos="fade-up" style="text-align: center;"><i><?=$eventInfos[$i]['date_from']?><br><?=$eventInfos[$i]['date_to']?></i></span>

        </div>
    <?php endfor;?>

    <!--  ####################################  Carte   ################################################-->

    <div data-aos="fade-up" id="mapid" style=" height: 480px "></div>
    <div><img src="images/Ephec2.png" alt="" id="ephec" , style="display: none", width="1110px" /></div>

    <div class="mt-3">
        <div id="openweathermap-widget-14"></div>
        <script>
            window.myWidgetParam ? window.myWidgetParam : window.myWidgetParam = [];
            window.myWidgetParam.push({id: 14,cityid: '2792073',appid: '7c1c7cea880e80eec79983b920138a3f',units: 'metric',containerid: 'openweathermap-widget-14',  });
            (function() {
                var script = document.createElement('script');
                script.async = true;
                script.charset = "utf-8";
                script.src = "//openweathermap.org/themes/openweathermap/assets/vendor/owm/js/weather-widget-generator.js";
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(script, s);
            })();
        </script>
    </div>

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

        // Créer les points sur la carte
        foreach ($stageInfo as $stage) {

            echo "\n\t\t" . 'L.marker([ ' .
                $stage['stage_latitude'] . ', ' .
                $stage['stage_longitude'] . ']).bindPopup("<b>' .
                $stage['stage_name'] . '</b><br>Il y a ' .
                '0' . ' participant(s)!<br>'.
                'Le nombre maximum de participant est estimé à ' .
                $stage['max_people'] . '").addTo(layer' . $stage['id_event'] . ');';
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
        if ( 'btn<?=$eventName['id_event']?>' == 'btn3') {
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
                    document.getElementById("dates<?=$eventName['id_event']?>").style.display = 'block';
                }
                document.getElementById("mapid").style.display = "block";
                document.getElementById("ephec").style.display = "block";
            }
        }
        else {
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
                    document.getElementById("dates<?=$eventName['id_event']?>").style.display = 'block';
                }
                document.getElementById("mapid").style.display = "block";
                document.getElementById("ephec").style.display = "none";
            }
        }
        <? endforeach;?>

    </script>
</div>
