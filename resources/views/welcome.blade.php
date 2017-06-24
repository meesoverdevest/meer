<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dordrecht Waterdashboard</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Cabin+Condensed:700' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}">
        
        <link rel="stylesheet" href="{{ asset('/css/main.css') }}"/>
    </head>
    <body>
        
        <main>

            <div id="map"></div>

            <h1 id="title">Waterdashboard</h1>

            <div id="location-form">
                <input id="location-input" type="text" placeholder="3315 JC"/>
                <input id="location-input-number" type="text" placeholder="137"/>

                <select id="subject">
                  <option value="1">Verbouwingen</option>
                  <option value="2">Verkoop/koop</option>
                  <option value="3">Fundering</option>
                  <option value="4">Overig</option>
                </select>

                <select id="question">
                  <option data-subject="1" value="1">Wat is de kans dat ik grondwater tegenkomen bij het verdiepen van de kruipruimte?</option>
                  <option data-subject="1" value="2">Wat is de kans dat ik grondwater tegenkomen bij het maken van een kelder?</option>
                  <option data-subject="1" value="3">Wie is verantwoordelijk om maatregelen te nemen tegen grondwateroverlast?</option>
                  <option data-subject="1" value="4">Kan ik de gemeente Dordrecht aansprakelijk maken voor de extra kosten na problemen door het grondwater?</option>
                  <option data-subject="1" value="5">Kan ik zelf het grondwaterpeil laten zakken?</option>

                  <option data-subject="2" value="6">Heeft grondwateroverlast invloed op de taxatie van mijn woning?</option>
                  <option data-subject="2" value="7">Wanneer ik mijn huis wil verkopen, moet ik dan eerst het grondwater aanpakken als dit te hoog staat?</option>
                  <option data-subject="2" value="8">Kan ik zelf het grondwaterpeil laten zakken onder mijn woning?</option>
                  <option data-subject="2" value="9">Wat is de kans op overstroming?</option>

                  <option data-subject="3" value="10">Kan het grondwater de fundering van mijn huis aantasten?</option>
                  <option data-subject="3" value="11">Wat kan ik doen tegen optrekkend vocht in mijn muren?</option>
                  <option data-subject="3" value="12">Wat is de kwaliteit van de grond?</option>
                  <option data-subject="3" value="13">Wat voor palen moeten er gebruikt worden?</option>
                  
                  <option data-subject="4" value="14">Kan ik de gemeente inschakelen wanneer ik op openbaar terrein een grondwaterprobleem zie?</option>
                  <option data-subject="4" value="15">Ik heb door grondwater last van ongedierte. Wat kan ik daar aan doen?</option>
                  <option data-subject="4" value="16">Zijn er regels of wetten voor grondwater?</option>
                  <option data-subject="4" value="17">Wat kan ik zelf doen om grondwateroverlast tegen te gaan?</option>
                </select>

                <input id="location-submit" type="submit" value="Zoek"/>
            </div>

            <div id="dashboard">
                <div class="row row-subject">
                    <div class="row-inner">
                        <h2>
                            Informatie en advies over:<br/>
                            Het verbouwen van een kelder
                        </h2>

                        <div class="location-zoom">
                            <h3>Bakema-erf 137, 3315JC, Dordrecht</h3>
                            <div id="map-small"></div>
                        </div>
                    </div>
                </div>

                <div class="row row-waterhoogte">
                    <div class="row-inner">
                        <div class="icon"></div>
                        <div class="info">
                            <h3>Advies</h3>
                            <p>Het waterspiegel is op normaal niveau en zal geen problemen geven bij het aanleggen van een kelder.</p>
                        </div>
                        <div class="info">
                            <h3>Informatie</h3>
                            <p>Het waterspiegel is in de maand mei met 12cm gestegen ten opzichte van de maand april.</p>
                            <p>Vergeleken met de maand mei van vorig jaar, ligt het waterspiegel 0.1cm hoger.</p>
                        </div>
                        <div class="data">
                            <h3>&nbsp;</h3>
                            <ul>
                                <li><strong>NAP:</strong> 2.8m</li>
                                <li><strong>Dordrecht:</strong> 3.0m</li>
                                <li><strong>Status:</strong> normaal</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row row-grondkwaliteit">
                    <div class="row-inner">
                        <div class="icon"></div>
                        <div class="info">
                            <h3>Advies</h3>
                            <p>Het waterspiegel is op normaal niveau en zal geen problemen geven bij het aanleggen van een kelder.</p>
                        </div>
                        <div class="info">
                            <h3>Informatie</h3>
                            <p>Het waterspiegel is in de maand mei met 12cm gestegen ten opzichte van de maand april.</p>
                            <p>Vergeleken met de maand mei van vorig jaar, ligt het waterspiegel 0.1cm hoger.</p>
                        </div>
                        <div class="data">
                            <h3>&nbsp;</h3>
                            <div class="vinkje"></div>
                        </div>
                    </div>
                </div>

                <div class="row row-drainage">
                    <div class="row-inner">
                        <div class="icon"></div>
                        <div class="info">
                            <h3>Advies</h3>
                            <p>Het waterspiegel is op normaal niveau en zal geen problemen geven bij het aanleggen van een kelder.</p>
                        </div>
                        <div class="info">
                            <h3>Informatie</h3>
                            <p>Het waterspiegel is in de maand mei met 12cm gestegen ten opzichte van de maand april.</p>
                            <p>Vergeleken met de maand mei van vorig jaar, ligt het waterspiegel 0.1cm hoger.</p>
                        </div>
                        <div class="data">
                            <h3>&nbsp;</h3>
                            <div class="vinkje"></div>
                        </div>
                    </div>
                </div>

                <div class="row row-contact">
                    <div class="row-inner">

                        <div class="box">
                            <p class="fa fa-download"></p>
                            <h3>Resultaat downloaden</h3>
                        </div>
                        <div class="box">
                            <p class="fa fa-envelope"></p>
                            <h3>Per post ontvangen</h3>
                        </div>
                        <div class="box">
                            <p class="fa fa-phone"></p>
                            <h3>Nog vragen? bel ons op 078 770 46 90</h3>
                        </div>
                    </div>
                </div>
            </div>

        </main>

        <script src="{{ asset('/js/app.js') }}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3yuySq1G8DhTT7UKRkH6ik35CLQpPprk&callback=initMap"
    async defer></script>
        <script src="{{ asset('/js/map.js') }}"></script>
        <script src="{{ asset('/js/questions.js') }}"></script>
        <script>
        (function() {

        // EVENTS -----------------------------------------------------------------------
        
        $("#location-submit").on("click", scrollToDashboard);
        $("#dashboard .fa-angle-up").on("click", scrollToMap);

        // FUNCTIONS -----------------------------------------------------------------------
        
        function scrollToDashboard() {
            $('html, body').animate({
                scrollTop: $("#dashboard").offset().top
            }, 500);
        }

        function scrollToMap() {
            $('html, body').animate({
                scrollTop: 0
            }, 500);
        }

        })();
        </script>
    </body>
</html>
