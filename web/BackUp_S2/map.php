<div class="container">


<ul>
<li>
        <input type="button" value="24h Vélo" id="24hvelo" > <!--onclick="javascript:afficher_cacher('meteovelo');"-->
</li>
    <li>
        <input type="button" value="Welcome Spring Festival" id="wsp" >
    </li>

</ul>

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





        var ClickParkingLeclercq = document.getElementById('24hvelo');
        ClickParkingLeclercq.onclick = function() {
            var street1Participant = 0;
            var street1ParticipantMax = 10;

            var street1 = L.marker([50.666873, 4.612963]).addTo(mymap);
            street1.bindPopup("<b>Parking Leclercq</b><br>Il y a "+street1Participant+" participant(s)!<br> Le nombre maximum de participant est estimé à " + street1ParticipantMax);

            var street2Participant = 0;
            var street2ParticipantMax = 20;
            var street2 = L.marker([50.668217, 4.608974]).addTo(mymap);
            street2.bindPopup("<b>Parking Leclercq</b><br>Il y a "+street2Participant+" participant(s)!<br> Le nombre maximum de participant est estimé à " + street2ParticipantMax);




            var polygon = L.polygon([
                [50.666451, 4.613230],
                [50.666424, 4.611899],
                [50.667952, 4.608345],
                [50.669284, 4.609119],
                [50.670202, 4.610583],
                [50.670771, 4.615275],
                [50.670092, 4.616825],
                [50.668793, 4.614581]
            ]).addTo(mymap);


        };





        var afficher_cacher = document.getElementById('wsp');   // quand je click sur ce bouton, faudrait que ce que j'ai créé dans ClickParkingLeclercq se supprime
        afficher_cacher.onclick = function() {

            //document.getElementById(street1).style.visibility=="hidden"

            /*$(function() {
                $("#refresh").click(function() {
                    $("#mydiv").load("index.html")
                })
            })*/
            var street1 = L.marker([50.669430, 4.611473]).addTo(mymap);
            street1.bindPopup("<b>Parking Leclercq</b><br>Il y a "+street1Participant+" participant(s)!<br> Le nombre maximum de participant est estimé à " + street1ParticipantMax);


        }





    </script>

    <!-- weather widget start -->
    <!--https://hotelmix.fr/widgets/weather?cityid=30446-->
    <br>
    <!-- weather widget start -->

    <div id="meteovelo">
         <div id="m-booked-weather-bl250-66060"> <div class="booked-wzs-250-175 weather-customize" style="background-color:#137AE9;width:257px;" id="width1"> <div class="booked-wzs-250-175_in"> <div class="booked-wzs-250-175-data"> <div class="booked-wzs-250-175-left-img wrz-18"> <a target="_blank" href="https://www.booked.net/"> <img src="//s.bookcdn.com/images/letter/logo.gif" alt="booked.net" /> </a> </div> <div class="booked-wzs-250-175-right"> <div class="booked-wzs-day-deck"> <div class="booked-wzs-day-val"> <div class="booked-wzs-day-number"><span class="plus">+</span>16</div> <div class="booked-wzs-day-dergee"> <div class="booked-wzs-day-dergee-val">&deg;</div> <div class="booked-wzs-day-dergee-name">C</div> </div> </div> <div class="booked-wzs-day"> <div class="booked-wzs-day-d">H: <span class="plus">+</span>17&deg;</div> <div class="booked-wzs-day-n">L: <span class="plus">+</span>14&deg;</div> </div> </div> <div class="booked-wzs-250-175-info"> <div class="booked-wzs-250-175-city smolest">Louvain-la-Neuve </div> <div class="booked-wzs-250-175-date">Dimanche, 29 Septembre</div> <div class="booked-wzs-left"> <span class="booked-wzs-bottom-l">Prévisions sur 7 jours</span> </div> </div> </div> </div> <a target="_blank" href="https://hotelmix.fr/weather/louvain-la-neuve-30446"> <table cellpadding="0" cellspacing="0" class="booked-wzs-table-250"> <tr> <td>Lun.</td> <td>Mar.</td> <td>Mer.</td> <td>Jeu.</td> <td>Ven.</td> <td>Sam.</td> </tr> <tr> <td class="week-day-ico"><div class="wrz-sml wrzs-18"></div></td> <td class="week-day-ico"><div class="wrz-sml wrzs-18"></div></td> <td class="week-day-ico"><div class="wrz-sml wrzs-18"></div></td> <td class="week-day-ico"><div class="wrz-sml wrzs-18"></div></td> <td class="week-day-ico"><div class="wrz-sml wrzs-18"></div></td> <td class="week-day-ico"><div class="wrz-sml wrzs-18"></div></td> </tr> <tr> <td class="week-day-val"><span class="plus">+</span>18&deg;</td> <td class="week-day-val"><span class="plus">+</span>19&deg;</td> <td class="week-day-val"><span class="plus">+</span>14&deg;</td> <td class="week-day-val"><span class="plus">+</span>14&deg;</td> <td class="week-day-val"><span class="plus">+</span>17&deg;</td> <td class="week-day-val"><span class="plus">+</span>19&deg;</td> </tr> <tr> <td class="week-day-val"><span class="plus">+</span>13&deg;</td> <td class="week-day-val"><span class="plus">+</span>13&deg;</td> <td class="week-day-val"><span class="plus">+</span>8&deg;</td> <td class="week-day-val"><span class="plus">+</span>8&deg;</td> <td class="week-day-val"><span class="plus">+</span>10&deg;</td> <td class="week-day-val"><span class="plus">+</span>12&deg;</td> </tr> </table> </a> </div></div> </div><script type="text/javascript"> var css_file=document.createElement("link"); css_file.setAttribute("rel","stylesheet"); css_file.setAttribute("type","text/css"); css_file.setAttribute("href",'https://s.bookcdn.com/css/w/booked-wzs-widget-275.css?v=0.0.1'); document.getElementsByTagName("head")[0].appendChild(css_file); function setWidgetData(data) { if(typeof(data) != 'undefined' && data.results.length > 0) { for(var i = 0; i < data.results.length; ++i) { var objMainBlock = document.getElementById('m-booked-weather-bl250-66060'); if(objMainBlock !== null) { var copyBlock = document.getElementById('m-bookew-weather-copy-'+data.results[i].widget_type); objMainBlock.innerHTML = data.results[i].html_code; if(copyBlock !== null) objMainBlock.appendChild(copyBlock); } } } else { alert('data=undefined||data.results is empty'); } } </script> <script type="text/javascript" charset="UTF-8" src="https://widgets.booked.net/weather/info?action=get_weather_info&ver=6&cityID=30446&type=3&scode=124&ltid=3458&domid=581&anc_id=44146&cmetric=1&wlangID=3&color=137AE9&wwidth=257&header_color=ffffff&text_color=333333&link_color=08488D&border_form=1&footer_color=ffffff&footer_text_color=333333&transparent=0"></script><!-- weather widget end -->

    </div>









    <script>



    </script>

</div>