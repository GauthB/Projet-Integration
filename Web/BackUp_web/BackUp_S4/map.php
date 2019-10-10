<?php
$servername = "91.216.107.248";
$username = "wecod1168786_2jauzk";
$password = "guyjptvc2p";
$dbname = "wecod1168786_2jauzk";


try {
    $conn = new PDO('mysql:host='.$servername.';dbname='.$dbname, $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}
?>

<div class="container">

    <link rel="stylesheet" href="css/add.css">
    <ul>
        <li>
            <input classe="btnMap" type="button" value="24h Vélo" id="24hvelo" > <!--onclick="javascript:afficher_cacher('meteovelo');"-->
        </li>
        <li>
            <input classe="btnMap" type="button" value="Welcome Spring Festival" id="wsp" >
        </li>
       <li>
            <input classe="btnMap" type="button" value="Ephec de Louvain-la-Neuve" id="ephec" >
        </li>
        <!--
        <li>
            <input type="button" value="Ephec" id="ephec" >
        </li>
        <li>
            <input type="button" value="Clear" id="clear">
        </li>-->
    </ul>

    <div id="titleVelo" class="" style='display:none;'>
        <span class="d-block mb-3 caption" data-aos="fade-up" style="text-align: center;text-decoration: underline;"><i>24H VELO</i></span>
    </div>
    <div id="titleWsp" class="" style='display:none;'>
        <span class="d-block mb-3 caption" data-aos="fade-up" style="text-align: center;text-decoration: underline;"><i>WELCOME SPRING FESTIVAL</i></span>
    </div>
    <div id="titleEphec" class="" style='display:none;'>
        <span class="d-block mb-3 caption" data-aos="fade-up" style="text-align: center;text-decoration: underline;"><i>EPHEC LLN</i></span>
    </div>
    <div id="mapid" style=" height: 180px; height: 480px; "></div>
    <script>


        var mymap = L.map('mapid').setView([50.668686, 4.612479], 16);

        var tileStreet =L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox.satellite',
            accessToken: 'pk.eyJ1IjoiZ2F1dGhpZXJiIiwiYSI6ImNrMTQzODZuZDBlcDkzb29henlhMndvMnEifQ.nrVFAyoW00lvhk94CeCz0Q'
        });
        tileStreet.addTo(mymap);


        //#################################################################################################################################################################
        //#################################  Evenement A - 24h vélo  ######################################################################################################
        //#################################################################################################################################################################

        //Variables nécessaires et modifiable de la reception de la base de données
        //--------------------------------------------------------------------------
        var coordonneeA1 = [50.666873, 4.612963];
        var coordonneeA2 = [50.668217, 4.608974];

        var streetA1Participant = 0;
        var streetA1ParticipantMax = 10;

        var streetA2Participant = 10;
        var streetA2ParticipantMax = 20;

        //Variables nécessaire | A pour le premier client |  1-2 pour les coordonnées soumises
        //-------------------------------------------------------------------------------------
        var streetA1;
        var streetA2;
        var coordonnesA11;
        var coordonnesA12;
        var polygonA1;

        //BOUTON
        //------------------------------------------------------------------------

        var hvelo = document.getElementById('24hvelo');
        hvelo.onclick = function() {

            if (coordonnesA11==coordonneeA1[0]){
                streetA1 = streetA1.remove();
                streetA2 = streetA2.remove();
                polygonA1 = polygonA1.remove();
                coordonnesA11=0;
                document.getElementById('meteoA').style.display = 'none';
                document.getElementById('titleVelo').style.display = 'none';
            }
            else{

                coordonnesA11=coordonneeA1[0];
                coordonnesA12 =coordonneeA1[1];
                streetA1 = L.marker([coordonneeA1[0],coordonneeA1[1]]).addTo(mymap);
                streetA1.bindPopup("<b>Parking Leclercq</b><br>Il y a "+streetA1Participant+" participant(s)!<br> Le nombre maximum de participant est estimé à " + streetA1ParticipantMax);




                streetA2 = L.marker([coordonneeA2[0],coordonneeA2[1]]).addTo(mymap);
                streetA2.bindPopup("<b>Parking Leclercq</b><br>Il y a "+streetA2Participant+" participant(s)!<br> Le nombre maximum de participant est estimé à " + streetA2ParticipantMax);



                polygonA1 = L.polygon([
                    [50.666451, 4.613230],
                    [50.666424, 4.611899],
                    [50.667952, 4.608345],
                    [50.669284, 4.609119],
                    [50.670202, 4.610583],
                    [50.670771, 4.615275],
                    [50.670092, 4.616825],
                    [50.668549, 4.620430],
                    [50.667639, 4.620373],
                    [50.668939, 4.614658],
                    [50.668793, 4.614581]
                ]).addTo(mymap);

                document.getElementById('meteoA').style.display = 'block';
                document.getElementById('titleVelo').style.display = 'block';

            }

            document.getElementById('titleWsp').style.display = 'none';
            document.getElementById('meteoB').style.display = 'none';
            streetB1.remove();
            polygonB1.remove();
            coordonnesB11=0;



        };
        //#################################################################################################################################################################
        //#################################  Evenement B - Welcome Spring Festival  #######################################################################################
        //#################################################################################################################################################################

        //Variables nécessaires et modifiable de la reception de la base de données
        //--------------------------------------------------------------------------
        var coordonneeB1 = [50.670004, 4.615172];
        //var coordonneeB2 = [50.668217, 4.608974];

        var streetB1Participant = 3;
        var streetB1ParticipantMax = 30;

        //Variables nécessaire | A pour le premier client |  1-2 pour les coordonnées soumises
        //-------------------------------------------------------------------------------------
        var streetB1;
        var streetB2;
        var coordonnesB11;
        var coordonnesB12;
        var polygonB1;

        //BOUTON
        //------------------------------------------------------------------------

        var hvelo = document.getElementById('wsp');
        hvelo.onclick = function() {

            if (coordonnesB11==coordonneeB1[0]){
                streetB1 = streetB1.remove();
                polygonB1 = polygonB1.remove();
                coordonnesB11=0;
                document.getElementById('meteoB').style.display = 'none';
                document.getElementById('titleWsp').style.display = 'none';

            }
            else{

                coordonnesB11=coordonneeB1[0];
                coordonnesB12 =coordonneeB1[1];
                streetB1 = L.marker([coordonneeB1[0],coordonneeB1[1]]).addTo(mymap);
                streetB1.bindPopup("<b>Parking Leclercq</b><br>Il y a "+streetB1Participant+" participant(s)!<br> Le nombre maximum de participant est estimé à " + streetB1ParticipantMax);



                polygonB1 = L.polygon([
                    [50.666451, 4.613230],
                    [50.666424, 4.611899],
                    [50.667952, 4.608345],
                    [50.669284, 4.609119],
                    [50.670202, 4.610583],
                    [50.670771, 4.615275],
                    [50.670092, 4.616825],
                    [50.668793, 4.614581]
                ]).addTo(mymap);

                document.getElementById('meteoB').style.display = 'block';
                document.getElementById('titleWsp').style.display = 'block';




            }



            document.getElementById('meteoA').style.display = 'none';
            document.getElementById('titleVelo').style.display = 'none';
            coordonnesA11=0;
            streetA1.remove();
            streetA2.remove();
            polygonA1.remove();




        };

        //#################################################################################################################################################################
        //#################################  Evenement C - Ephec de LLN  ##################################################################################################
        //#################################################################################################################################################################



        var coordonneeC1 = [50.665702, 4.612218];

        var streetC1Participant = 3;

        var streetC1;
        var coordonnesC11;


        var hvelo = document.getElementById('ephec');               //bug dans le bouton. Fonctionne bien mais pas parfaitement pour retirer
        hvelo.onclick = function() {




            if (coordonnesC11==coordonneeC1[0]){

                streetC1 = streetC1.remove();
                coordonnesC11=0;
                document.getElementById('titleEphec').style.display = 'none';


            }
            else{


                coordonnesC11=coordonneeC1[0];
                streetC1 = L.marker([coordonneeC1[0],coordonneeC1[1]]).addTo(mymap);
                streetC1.bindPopup("<b>Parking Leclercq</b><br>Il y a "+streetC1Participant+" participant(s)!<br> Le nombre maximum de participant est estimé à " + streetC1ParticipantMax);



                document.getElementById('titleEphec').style.display = 'block';




            }

            document.getElementById('meteoA').style.display = 'none';
            document.getElementById('titleVelo').style.display = 'none';
            coordonnesA11=0;
            streetA1.remove();
            streetA2.remove();
            polygonA1.remove();

            document.getElementById('titleWsp').style.display = 'none';
            document.getElementById('meteoB').style.display = 'none';
            streetB1.remove();
            polygonB1.remove();
            coordonnesB11=0;



        };



        //50.665660, 4.612205




    </script>
    <!-- https://www.youtube.com/watch?v=g8bV6559bIo Pour la map-->
    <!-- weather widget start -->
    <!--https://hotelmix.fr/?page=weather_widget_customize&type=3&cityID=30446&cmetric=1-->
    <!-- taille: 259px-->
    <br>
    <!-- weather widget start -->

    <div id="meteoA" style='display:none;' >
        <div id="m-booked-weather-bl250-46193"> <div class="booked-wzs-250-175 weather-customize" style="background-color:#137AE9;width:259px;" id="width1"> <div class="booked-wzs-250-175_in"> <div class="booked-wzs-250-175-data"> <div class="booked-wzs-250-175-left-img wrz-18"> <a target="_blank" href="https://www.booked.net/"> <img src="//s.bookcdn.com/images/letter/logo.gif" alt="Booked" /> </a> </div> <div class="booked-wzs-250-175-right"> <div class="booked-wzs-day-deck"> <div class="booked-wzs-day-val"> <div class="booked-wzs-day-number"><span class="plus">+</span>18</div> <div class="booked-wzs-day-dergee"> <div class="booked-wzs-day-dergee-val">&deg;</div> <div class="booked-wzs-day-dergee-name">C</div> </div> </div> <div class="booked-wzs-day"> <div class="booked-wzs-day-d">H: <span class="plus">+</span>18&deg;</div> <div class="booked-wzs-day-n">L: <span class="plus">+</span>13&deg;</div> </div> </div> <div class="booked-wzs-250-175-info"> <div class="booked-wzs-250-175-city smolest">Louvain-la-Neuve </div> <div class="booked-wzs-250-175-date">Mardi, 01 Octobre</div> <div class="booked-wzs-left"> <span class="booked-wzs-bottom-l">Prévisions sur 7 jours</span> </div> </div> </div> </div> <a target="_blank" href="https://hotelmix.fr/weather/louvain-la-neuve-30446"> <table cellpadding="0" cellspacing="0" class="booked-wzs-table-250"> <tr> <td>Mer.</td> <td>Jeu.</td> <td>Ven.</td> <td>Sam.</td> <td>Dim.</td> <td>Lun.</td> </tr> <tr> <td class="week-day-ico"><div class="wrz-sml wrzs-18"></div></td> <td class="week-day-ico"><div class="wrz-sml wrzs-03"></div></td> <td class="week-day-ico"><div class="wrz-sml wrzs-18"></div></td> <td class="week-day-ico"><div class="wrz-sml wrzs-03"></div></td> <td class="week-day-ico"><div class="wrz-sml wrzs-18"></div></td> <td class="week-day-ico"><div class="wrz-sml wrzs-03"></div></td> </tr> <tr> <td class="week-day-val"><span class="plus">+</span>14&deg;</td> <td class="week-day-val"><span class="plus">+</span>14&deg;</td> <td class="week-day-val"><span class="plus">+</span>16&deg;</td> <td class="week-day-val"><span class="plus">+</span>18&deg;</td> <td class="week-day-val"><span class="plus">+</span>18&deg;</td> <td class="week-day-val"><span class="plus">+</span>16&deg;</td> </tr> <tr> <td class="week-day-val"><span class="plus">+</span>9&deg;</td> <td class="week-day-val"><span class="plus">+</span>7&deg;</td> <td class="week-day-val"><span class="plus">+</span>11&deg;</td> <td class="week-day-val"><span class="plus">+</span>13&deg;</td> <td class="week-day-val"><span class="plus">+</span>10&deg;</td> <td class="week-day-val"><span class="plus">+</span>9&deg;</td> </tr> </table> </a> </div></div> </div><script type="text/javascript"> var css_file=document.createElement("link"); css_file.setAttribute("rel","stylesheet"); css_file.setAttribute("type","text/css"); css_file.setAttribute("href",'https://s.bookcdn.com/css/w/booked-wzs-widget-275.css?v=0.0.1'); document.getElementsByTagName("head")[0].appendChild(css_file); function setWidgetData(data) { if(typeof(data) != 'undefined' && data.results.length > 0) { for(var i = 0; i < data.results.length; ++i) { var objMainBlock = document.getElementById('m-booked-weather-bl250-46193'); if(objMainBlock !== null) { var copyBlock = document.getElementById('m-bookew-weather-copy-'+data.results[i].widget_type); objMainBlock.innerHTML = data.results[i].html_code; if(copyBlock !== null) objMainBlock.appendChild(copyBlock); } } } else { alert('data=undefined||data.results is empty'); } } </script> <script type="text/javascript" charset="UTF-8" src="https://widgets.booked.net/weather/info?action=get_weather_info&ver=6&cityID=30446&type=3&scode=124&ltid=3457&domid=581&anc_id=37852&cmetric=1&wlangID=3&color=137AE9&wwidth=259&header_color=ffffff&text_color=333333&link_color=08488D&border_form=1&footer_color=ffffff&footer_text_color=333333&transparent=0"></script><!-- weather widget end -->
    </div>
    <div id="meteoB" style='display:none;' >
        <div id="m-booked-weather-bl250-71420"> <div class="booked-wzs-250-175 weather-customize" style="background-color:#137AE9;width:259px;" id="width1"> <div class="booked-wzs-250-175_in"> <div class="booked-wzs-250-175-data"> <div class="booked-wzs-250-175-left-img wrz-18"> <a target="_blank" href="https://www.booked.net/"> <img src="//s.bookcdn.com/images/letter/logo.gif" alt="booked.net" /> </a> </div> <div class="booked-wzs-250-175-right"> <div class="booked-wzs-day-deck"> <div class="booked-wzs-day-val"> <div class="booked-wzs-day-number"><span class="plus">+</span>18</div> <div class="booked-wzs-day-dergee"> <div class="booked-wzs-day-dergee-val">&deg;</div> <div class="booked-wzs-day-dergee-name">C</div> </div> </div> <div class="booked-wzs-day"> <div class="booked-wzs-day-d">H: <span class="plus">+</span>18&deg;</div> <div class="booked-wzs-day-n">L: <span class="plus">+</span>13&deg;</div> </div> </div> <div class="booked-wzs-250-175-info"> <div class="booked-wzs-250-175-city smolest">Louvain-la-Neuve </div> <div class="booked-wzs-250-175-date">Mardi, 01 Octobre</div> <div class="booked-wzs-left"> <span class="booked-wzs-bottom-l">Prévisions sur 7 jours</span> </div> </div> </div> </div> <a target="_blank" href="https://hotelmix.fr/weather/louvain-la-neuve-30446"> <table cellpadding="0" cellspacing="0" class="booked-wzs-table-250"> <tr> <td>Mer.</td> <td>Jeu.</td> <td>Ven.</td> <td>Sam.</td> <td>Dim.</td> <td>Lun.</td> </tr> <tr> <td class="week-day-ico"><div class="wrz-sml wrzs-18"></div></td> <td class="week-day-ico"><div class="wrz-sml wrzs-03"></div></td> <td class="week-day-ico"><div class="wrz-sml wrzs-18"></div></td> <td class="week-day-ico"><div class="wrz-sml wrzs-03"></div></td> <td class="week-day-ico"><div class="wrz-sml wrzs-18"></div></td> <td class="week-day-ico"><div class="wrz-sml wrzs-03"></div></td> </tr> <tr> <td class="week-day-val"><span class="plus">+</span>14&deg;</td> <td class="week-day-val"><span class="plus">+</span>14&deg;</td> <td class="week-day-val"><span class="plus">+</span>16&deg;</td> <td class="week-day-val"><span class="plus">+</span>18&deg;</td> <td class="week-day-val"><span class="plus">+</span>18&deg;</td> <td class="week-day-val"><span class="plus">+</span>16&deg;</td> </tr> <tr> <td class="week-day-val"><span class="plus">+</span>9&deg;</td> <td class="week-day-val"><span class="plus">+</span>7&deg;</td> <td class="week-day-val"><span class="plus">+</span>11&deg;</td> <td class="week-day-val"><span class="plus">+</span>13&deg;</td> <td class="week-day-val"><span class="plus">+</span>10&deg;</td> <td class="week-day-val"><span class="plus">+</span>9&deg;</td> </tr> </table> </a> </div></div> </div><script type="text/javascript"> var css_file=document.createElement("link"); css_file.setAttribute("rel","stylesheet"); css_file.setAttribute("type","text/css"); css_file.setAttribute("href",'https://s.bookcdn.com/css/w/booked-wzs-widget-275.css?v=0.0.1'); document.getElementsByTagName("head")[0].appendChild(css_file); function setWidgetData(data) { if(typeof(data) != 'undefined' && data.results.length > 0) { for(var i = 0; i < data.results.length; ++i) { var objMainBlock = document.getElementById('m-booked-weather-bl250-71420'); if(objMainBlock !== null) { var copyBlock = document.getElementById('m-bookew-weather-copy-'+data.results[i].widget_type); objMainBlock.innerHTML = data.results[i].html_code; if(copyBlock !== null) objMainBlock.appendChild(copyBlock); } } } else { alert('data=undefined||data.results is empty'); } } </script> <script type="text/javascript" charset="UTF-8" src="https://widgets.booked.net/weather/info?action=get_weather_info&ver=6&cityID=30446&type=3&scode=124&ltid=3458&domid=581&anc_id=22882&cmetric=1&wlangID=3&color=137AE9&wwidth=259&header_color=ffffff&text_color=333333&link_color=08488D&border_form=1&footer_color=ffffff&footer_text_color=333333&transparent=0"></script><!-- weather widget end -->
    </div>










    <script>



    </script>

</div>