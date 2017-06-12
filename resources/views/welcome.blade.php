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
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}">
        
        <link rel="stylesheet" href="{{ asset('/css/main.css') }}"/>
    </head>
    <body>
        
        <main>

            <div id="map"></div>

            <h1 id="title">Waterdashboard</h1>

            <div id="location-form">
                <input id="location-input" type="text" placeholder="Voer uw postcode in..."/>

                <select id="subject">
                  <option value="1">Verbouwingen</option>
                  <option value="2">Verhuizen</option>
                </select>

                <select id="question">
                  <option data-subject="1" value="1">Ik wil mijn kelder verbouwen</option>
                  <option data-subject="2" value="3">Ik wil verhuizen</option>
                </select>

                <input id="location-submit" type="submit" value="Zoek"/>
            </div>

            <div id="dashboard">
                <p class="fa fa-angle-up"></p>
                <h1>Waterdashboard</h1>

                <div class="flex vertical">    
                  <div class="flex">
                    <div class="box waterhoogte-box">
                        <!-- <div class="waterhoogte-image">
                            <img src="{{ asset('/img/waterhoogte.png') }}"/>
                        </div> -->
                        <div class="waterhoogte-info">
                            <h2>In de maand mei is er:</h2>
                            <p>40-45 mm neerslag gevallen.</p>
                            <p>Wateren in uw buurt staan 10cm hoger dan normaal.</p>
                        </div>
                    </div>    
                    <div id="map-small" class="box"></div>
                  </div>

                  <div class="flex">
                    <div class="box advise-box">
                        <h2>Gepersonaliseerd advies op basis van vraag.</h2>
                        <p>Het aanleggen van een kelder brengt veel gevaarlijke aspecten met zich mee wanneer u in een risicogebied woont.<br>Het is daarom van belang om met bouwbedrijven uit uw regio te overleggen over de meest veilige mogelijkheden voor de aanleg van een kelder onder uw woning.</p>
                    </div>    
                    <div class="box temperature-box">
                        <h2>18&deg;C</h2>
                    </div>
                  </div>

                  <div class="flex">
                    <div class="box download-box">
                        <div class="fa fa-cloud-download"></div>
                        <p>Download</p>
                    </div>    
                    <div class="box mail-box">
                        <div class="fa fa-envelope"></div>
                        <p>Ontvang per post</p>
                    </div>
                    <div class="box call-box">
                        <div class="fa fa-phone"></div>
                        <p>Bel ons op 0800-9944</p>
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
