
<?php

require_once "db_connect.php";
$eventNameQuery = $dbh->query('SELECT id_event, event_name FROM Events ORDER BY event_name');
$eventNames = $eventNameQuery->fetchAll(PDO::FETCH_ASSOC);

?>


<div class="container">

    <link rel="stylesheet" href="css/add.css">
    <ul>
<!--        Boutton Event-->
        <?php
        foreach ($eventNames as $eventName) {
            echo '<li><input classe="btnMap" type="button" value="' . $eventName['event_name'] . '" id="btn' . $eventName['id_event'] . '"></li>';
        }
        ?>
   </ul>

<!--    Titre Event-->
    <?php for ($i=0; $i<count($eventNames); $i++): ?>
        <div id="title<?=$eventNames[$i]['id_event']?>" class="titleEvent" <?php if($i != 0) echo 'style="display:none"'?>>
            <span class="d-block mb-3 caption" data-aos="fade-up" style="text-align: center;text-decoration: underline;"><i><?=$eventNames[$i]['event_name']?></i></span>
        </div>
    <?php endfor;?>

    <div id="mapid" style=" height: 480px "></div>
    <script>

        <?php
        // Layer
        foreach ($eventNames as $eventName) {
            echo "\n\t\t" . 'var layer' . $eventName['id_event'] . ' = L.layerGroup();';
        }
        echo 'var actifLayer = layer' . $eventNames[0]['id_event'] . ';';

        // récupère les information sur les stages
        $stageQuery = $dbh->query("
        SELECT id_stage, stage_name, stage_latitude, stage_longitude, max_people, id_event
        FROM `Stages`");

        $stageInfo = $stageQuery->fetchAll(PDO::FETCH_ASSOC);

        // créé les points sur la carte
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

        // Affiche de nouveau points lorsque l'on clique sur un boutton
        <?foreach ($eventNames as $eventName) :?>
            document.getElementById('btn<?=$eventName['id_event']?>').onclick = function () {
                if (!mymap.hasLayer(layer<?=$eventName['id_event']?>)) {
                    mymap.removeLayer(actifLayer);
                    mymap.addLayer(layer<?=$eventName['id_event']?>);
                    actifLayer = layer<?=$eventName['id_event']?>;

                    var titleEvent = document.getElementsByClassName('titleEvent');
                    for (var i = 0; i < titleEvent.length; i++) {
                        titleEvent[i].style.display = 'none';
                    }
                    document.getElementById("title<?=$eventName['id_event']?>").style.display = 'block';
                }
            };
        <? endforeach;?>

    </script>
    <!-- https://www.youtube.com/watch?v=g8bV6559bIo Pour la map-->
    <!-- weather widget start -->
    <!--https://hotelmix.fr/?page=weather_widget_customize&type=3&cityID=30446&cmetric=1-->
    <!-- taille: 259px-->
    <br>
    <!-- weather widget start -->

<!--    <div id="meteoA" style='display:none;' >-->
<!--        <div id="m-booked-weather-bl250-46193"> <div class="booked-wzs-250-175 weather-customize" style="background-color:#137AE9;width:259px;" id="width1"> <div class="booked-wzs-250-175_in"> <div class="booked-wzs-250-175-data"> <div class="booked-wzs-250-175-left-img wrz-18"> <a target="_blank" href="https://www.booked.net/"> <img src="//s.bookcdn.com/images/letter/logo.gif" alt="Booked" /> </a> </div> <div class="booked-wzs-250-175-right"> <div class="booked-wzs-day-deck"> <div class="booked-wzs-day-val"> <div class="booked-wzs-day-number"><span class="plus">+</span>18</div> <div class="booked-wzs-day-dergee"> <div class="booked-wzs-day-dergee-val">&deg;</div> <div class="booked-wzs-day-dergee-name">C</div> </div> </div> <div class="booked-wzs-day"> <div class="booked-wzs-day-d">H: <span class="plus">+</span>18&deg;</div> <div class="booked-wzs-day-n">L: <span class="plus">+</span>13&deg;</div> </div> </div> <div class="booked-wzs-250-175-info"> <div class="booked-wzs-250-175-city smolest">Louvain-la-Neuve </div> <div class="booked-wzs-250-175-date">Mardi, 01 Octobre</div> <div class="booked-wzs-left"> <span class="booked-wzs-bottom-l">Prévisions sur 7 jours</span> </div> </div> </div> </div> <a target="_blank" href="https://hotelmix.fr/weather/louvain-la-neuve-30446"> <table cellpadding="0" cellspacing="0" class="booked-wzs-table-250"> <tr> <td>Mer.</td> <td>Jeu.</td> <td>Ven.</td> <td>Sam.</td> <td>Dim.</td> <td>Lun.</td> </tr> <tr> <td class="week-day-ico"><div class="wrz-sml wrzs-18"></div></td> <td class="week-day-ico"><div class="wrz-sml wrzs-03"></div></td> <td class="week-day-ico"><div class="wrz-sml wrzs-18"></div></td> <td class="week-day-ico"><div class="wrz-sml wrzs-03"></div></td> <td class="week-day-ico"><div class="wrz-sml wrzs-18"></div></td> <td class="week-day-ico"><div class="wrz-sml wrzs-03"></div></td> </tr> <tr> <td class="week-day-val"><span class="plus">+</span>14&deg;</td> <td class="week-day-val"><span class="plus">+</span>14&deg;</td> <td class="week-day-val"><span class="plus">+</span>16&deg;</td> <td class="week-day-val"><span class="plus">+</span>18&deg;</td> <td class="week-day-val"><span class="plus">+</span>18&deg;</td> <td class="week-day-val"><span class="plus">+</span>16&deg;</td> </tr> <tr> <td class="week-day-val"><span class="plus">+</span>9&deg;</td> <td class="week-day-val"><span class="plus">+</span>7&deg;</td> <td class="week-day-val"><span class="plus">+</span>11&deg;</td> <td class="week-day-val"><span class="plus">+</span>13&deg;</td> <td class="week-day-val"><span class="plus">+</span>10&deg;</td> <td class="week-day-val"><span class="plus">+</span>9&deg;</td> </tr> </table> </a> </div></div> </div><script type="text/javascript"> var css_file=document.createElement("link"); css_file.setAttribute("rel","stylesheet"); css_file.setAttribute("type","text/css"); css_file.setAttribute("href",'https://s.bookcdn.com/css/w/booked-wzs-widget-275.css?v=0.0.1'); document.getElementsByTagName("head")[0].appendChild(css_file); function setWidgetData(data) { if(typeof(data) != 'undefined' && data.results.length > 0) { for(var i = 0; i < data.results.length; ++i) { var objMainBlock = document.getElementById('m-booked-weather-bl250-46193'); if(objMainBlock !== null) { var copyBlock = document.getElementById('m-bookew-weather-copy-'+data.results[i].widget_type); objMainBlock.innerHTML = data.results[i].html_code; if(copyBlock !== null) objMainBlock.appendChild(copyBlock); } } } else { alert('data=undefined||data.results is empty'); } } </script> <script type="text/javascript" charset="UTF-8" src="https://widgets.booked.net/weather/info?action=get_weather_info&ver=6&cityID=30446&type=3&scode=124&ltid=3457&domid=581&anc_id=37852&cmetric=1&wlangID=3&color=137AE9&wwidth=259&header_color=ffffff&text_color=333333&link_color=08488D&border_form=1&footer_color=ffffff&footer_text_color=333333&transparent=0"></script> -->
<!--    </div>-->
<!--    <div id="meteoB" style='display:none;' >-->
<!--        <div id="m-booked-weather-bl250-71420"> <div class="booked-wzs-250-175 weather-customize" style="background-color:#137AE9;width:259px;" id="width1"> <div class="booked-wzs-250-175_in"> <div class="booked-wzs-250-175-data"> <div class="booked-wzs-250-175-left-img wrz-18"> <a target="_blank" href="https://www.booked.net/"> <img src="//s.bookcdn.com/images/letter/logo.gif" alt="booked.net" /> </a> </div> <div class="booked-wzs-250-175-right"> <div class="booked-wzs-day-deck"> <div class="booked-wzs-day-val"> <div class="booked-wzs-day-number"><span class="plus">+</span>18</div> <div class="booked-wzs-day-dergee"> <div class="booked-wzs-day-dergee-val">&deg;</div> <div class="booked-wzs-day-dergee-name">C</div> </div> </div> <div class="booked-wzs-day"> <div class="booked-wzs-day-d">H: <span class="plus">+</span>18&deg;</div> <div class="booked-wzs-day-n">L: <span class="plus">+</span>13&deg;</div> </div> </div> <div class="booked-wzs-250-175-info"> <div class="booked-wzs-250-175-city smolest">Louvain-la-Neuve </div> <div class="booked-wzs-250-175-date">Mardi, 01 Octobre</div> <div class="booked-wzs-left"> <span class="booked-wzs-bottom-l">Prévisions sur 7 jours</span> </div> </div> </div> </div> <a target="_blank" href="https://hotelmix.fr/weather/louvain-la-neuve-30446"> <table cellpadding="0" cellspacing="0" class="booked-wzs-table-250"> <tr> <td>Mer.</td> <td>Jeu.</td> <td>Ven.</td> <td>Sam.</td> <td>Dim.</td> <td>Lun.</td> </tr> <tr> <td class="week-day-ico"><div class="wrz-sml wrzs-18"></div></td> <td class="week-day-ico"><div class="wrz-sml wrzs-03"></div></td> <td class="week-day-ico"><div class="wrz-sml wrzs-18"></div></td> <td class="week-day-ico"><div class="wrz-sml wrzs-03"></div></td> <td class="week-day-ico"><div class="wrz-sml wrzs-18"></div></td> <td class="week-day-ico"><div class="wrz-sml wrzs-03"></div></td> </tr> <tr> <td class="week-day-val"><span class="plus">+</span>14&deg;</td> <td class="week-day-val"><span class="plus">+</span>14&deg;</td> <td class="week-day-val"><span class="plus">+</span>16&deg;</td> <td class="week-day-val"><span class="plus">+</span>18&deg;</td> <td class="week-day-val"><span class="plus">+</span>18&deg;</td> <td class="week-day-val"><span class="plus">+</span>16&deg;</td> </tr> <tr> <td class="week-day-val"><span class="plus">+</span>9&deg;</td> <td class="week-day-val"><span class="plus">+</span>7&deg;</td> <td class="week-day-val"><span class="plus">+</span>11&deg;</td> <td class="week-day-val"><span class="plus">+</span>13&deg;</td> <td class="week-day-val"><span class="plus">+</span>10&deg;</td> <td class="week-day-val"><span class="plus">+</span>9&deg;</td> </tr> </table> </a> </div></div> </div><script type="text/javascript"> var css_file=document.createElement("link"); css_file.setAttribute("rel","stylesheet"); css_file.setAttribute("type","text/css"); css_file.setAttribute("href",'https://s.bookcdn.com/css/w/booked-wzs-widget-275.css?v=0.0.1'); document.getElementsByTagName("head")[0].appendChild(css_file); function setWidgetData(data) { if(typeof(data) != 'undefined' && data.results.length > 0) { for(var i = 0; i < data.results.length; ++i) { var objMainBlock = document.getElementById('m-booked-weather-bl250-71420'); if(objMainBlock !== null) { var copyBlock = document.getElementById('m-bookew-weather-copy-'+data.results[i].widget_type); objMainBlock.innerHTML = data.results[i].html_code; if(copyBlock !== null) objMainBlock.appendChild(copyBlock); } } } else { alert('data=undefined||data.results is empty'); } } </script> <script type="text/javascript" charset="UTF-8" src="https://widgets.booked.net/weather/info?action=get_weather_info&ver=6&cityID=30446&type=3&scode=124&ltid=3458&domid=581&anc_id=22882&cmetric=1&wlangID=3&color=137AE9&wwidth=259&header_color=ffffff&text_color=333333&link_color=08488D&border_form=1&footer_color=ffffff&footer_text_color=333333&transparent=0"></script>-->
<!--    </div>-->

</div>