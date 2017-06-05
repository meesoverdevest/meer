<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dordrecht Waterdashboard</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="{{ asset('/css/main.css') }}"/>
    </head>
    <body>
        
        <main>

        <div id="map"></div>

        <div id="location-form">
            <input id="location-input" type="text" placeholder="Voer uw postcode in..."/>
            <input id="location-submit" type="submit" value="Zoek"/>

            <select id="question">
              <option data-subject="1" value="1">Ik wil mijn kelder verbouwen</option>
              <option data-subject="1" value="2">Ik wil ook mijn kelder verbouwen</option>
              <option data-subject="2" value="3">Ik wil verhuizen</option>
              <option data-subject="2" value="4">Ik wil ook verhuizen</option>
            </select>

            <select id="subject">
              <option value="1">Verbouwingen</option>
              <option value="2">Verhuizen</option>
            </select>
        </div>

        </main>

        <script src="{{ asset('/js/app.js') }}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3yuySq1G8DhTT7UKRkH6ik35CLQpPprk&callback=initMap"
    async defer></script>
        <script src="{{ asset('/js/map.js') }}"></script>
        <script src="{{ asset('/js/questions.js') }}"></script>
    </body>
</html>
